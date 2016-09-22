<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Image
{
	var $CI;
	public $width = 160; //Width of the image
	public $height = 60; //Height of the image
//	public $minWordLength = 2; //Min&Max word length (for non-dictionary random text generation)
//	public $maxWordLength = 4;
	public $fixedWordLength = 4;

	//public $session_var = 'captcha'; //Sessionname to store the original text
	public $backgroundColor = array(247, 247, 247); //Background color in RGB-array,已为App改写@2012-02-27
	public $colors = array(
		array(27,78,181), //blue
		array(22,163,35), //green
		array(214,36,7), //red
	); //Foreground colors in RGB-array
	public $shadowColor = null; //Shadow color in RGB-array like array(0, 0, 0) or null

	/**
	 * Font configuration
	 *
	 * - font: TTF file
	 * - spacing: relative pixel space between character
	 * - minSize: min font size
	 * - maxSize: max font size
	 */
	public $fonts = array(
		'Antykwa' => array('spacing' => -3, 'minSize' => 27, 'maxSize' => 30, 'font' => 'AntykwaBold.ttf'),
		'Duality' => array('spacing' => -2, 'minSize' => 30, 'maxSize' => 38, 'font' => 'Duality.ttf'),
		'Jura' => array('spacing' => -2, 'minSize' => 28, 'maxSize' => 32, 'font' => 'Jura.ttf'),
		'Times'	=> array('spacing' => -2, 'minSize' => 28, 'maxSize' => 34, 'font' => 'TimesNewRomanBold.ttf'),
		'VeraSans' => array('spacing' => -1, 'minSize' => 20, 'maxSize' => 28, 'font' => 'VeraSansBold.ttf')
	);

	//Wave configuracion in X and Y axes
	public $Yperiod	= 12;
	public $Yamplitude = 14;
	public $Xperiod	= 11;
	public $Xamplitude = 5;

	public $maxRotation = 8; //letter rotation clockwise
	public $scale = 2; //Internal image size factor (for better image quality): 1-low; 2-medium; 3-high;
	public $blur = false; //Blur effect for better image quality (but slower image processing). Better image results with scale=3
	public $debug = false;//false;
	public $im; //GD image

	public $captcha_word ;

	public function __construct($config = array())
	{
		//$this->CI =& get_instance(); //Set the super object to a local variable for use later
		//$this->CI->load->library('session', $config); //Load the Sessions class
		$this->fontsPath = APPPATH.'third_party/captcha/fonts/'; //Fonts file path
	}

	public function GetCaptchaWord() {
		return $this->captcha_word;
	}

	public function CreateImage()
	{
		$ini = microtime(true);
		$this->ImageAllocate(); //Initialization
		$this->captcha_word = $this->GetDictionaryCaptchaText(); //Text insertion
		$fontcfg = $this->fonts[array_rand($this->fonts)];
		$this->WriteText($this->captcha_word, $fontcfg);
		//$this->CI->session->set_userdata($this->session_var, $text);

		$this->WaveImage(); //Transformations
		if ($this->blur && function_exists('imagefilter'))
		{
			imagefilter($this->im, IMG_FILTER_GAUSSIAN_BLUR);
		}
		$this->ReduceImage();
		if ($this->debug)
		{
			imagestring($this->im, 1, 1, $this->height-8, $this->captcha_word.' '.$fontcfg['font'].' '.round((microtime(true)-$ini)*1000).'ms', $this->GdFgColor);
		}
		header('Content-type: image/jpeg'); //also can use header('Content-type: image/png');
		imagejpeg($this->im, null, 80); //imagepng($this->im);
		imagedestroy($this->im); //Cleanup
	}

	//Creates the image resources
	protected function ImageAllocate()
	{
		if (null !== $this->im) imagedestroy($this->im); //Cleanup
		$this->im = imagecreatetruecolor($this->width*$this->scale, $this->height*$this->scale);
		$this->GdBgColor = imagecolorallocate($this->im, $this->backgroundColor[0], $this->backgroundColor[1], $this->backgroundColor[2]); //Background color
		imagefilledrectangle($this->im, 0, 0, $this->width*$this->scale, $this->height*$this->scale, $this->GdBgColor);
		$color = $this->colors[mt_rand(0, sizeof($this->colors)-1)]; //Foreground color
		$this->GdFgColor = imagecolorallocate($this->im, $color[0], $color[1], $color[2]);
		if (null !== $this->shadowColor && is_array($this->shadowColor) && sizeof($this->shadowColor) >= 3)
		{
			$this->GdShadowColor = imagecolorallocate($this->im, $this->shadowColor[0], $this->shadowColor[1], $this->shadowColor[2]); //Shadow color
		}
	}

	//Random dictionary word generation
	function GetDictionaryCaptchaText()
	{
		$str = 'AaBbCc2DdEeFf3GgHhJj4KkMmNn5PpQqRr6SsTtUu7VvWwXx8YyZz9';
//		$word_length = mt_rand($this->minWordLength, $this->maxWordLength);
		$word_length = $this->fixedWordLength ;
		$text = '';
		for ($i=0; $i<$word_length; $i++)
		{
			$text .= $str[mt_rand(0, 53)];
		}
		return $text;
	}

	//Text insertion
	protected function WriteText($text, $fontcfg = array())
	{
		if (empty($fontcfg))
		{
			$fontcfg = $this->fonts[array_rand($this->fonts)]; //Select the font configuration
		}
		$fontfile = $this->fontsPath.$fontcfg['font']; //Full path of font file

		/** Increase font-size for shortest words: 9% for each glyp missing */
//		$lettersMissing = $this->maxWordLength-strlen($text);
		$lettersMissing = $this->fixedWordLength-strlen($text);
		$fontSizefactor = 1+($lettersMissing*0.09);

		// Text generation (char by char)
		$x = 20*$this->scale;
		$y = round(($this->height*27/40)*$this->scale);
		$length = strlen($text);
		for ($i=0; $i<$length; $i++)
		{
			$degree = mt_rand($this->maxRotation*-1, $this->maxRotation);
			$fontsize = mt_rand($fontcfg['minSize'], $fontcfg['maxSize'])*$this->scale*$fontSizefactor;
			$letter = substr($text, $i, 1);
			if ($this->shadowColor)
			{
				$coords = imagettftext($this->im, $fontsize, $degree, $x+$this->scale, $y+$this->scale, $this->GdShadowColor, $fontfile, $letter);
			}
			$coords = imagettftext($this->im, $fontsize, $degree, $x, $y, $this->GdFgColor, $fontfile, $letter);
			$x += ($coords[2]-$x) + ($fontcfg['spacing']*$this->scale);
		}
	}

	protected function WaveImage()
	{
		$xp = $this->scale*$this->Xperiod*mt_rand(1, 3); //X-axis wave generation
		$k = mt_rand(0, 100);
		for ($i = 0; $i < ($this->width*$this->scale); $i++)
		{
			imagecopy($this->im, $this->im, $i-1, sin($k+$i/$xp) * ($this->scale*$this->Xamplitude), $i, 0, 1, $this->height*$this->scale);
		}

		$k = mt_rand(0, 100); //Y-axis wave generation
		$yp = $this->scale*$this->Yperiod*mt_rand(1, 2);
		for ($i = 0; $i < ($this->height*$this->scale); $i++)
		{
			imagecopy($this->im, $this->im, sin($k+$i/$yp) * ($this->scale*$this->Yamplitude), $i-1, 0, $i, $this->width*$this->scale, 1);
		}
	}

	//Reduce the image to the final size
	protected function ReduceImage()
	{
		$imResampled = imagecreatetruecolor($this->width, $this->height);
		imagecopyresampled($imResampled, $this->im, 0, 0, 0, 0, $this->width, $this->height, $this->width*$this->scale, $this->height*$this->scale);
		imagedestroy($this->im);
		$this->im = $imResampled;
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
