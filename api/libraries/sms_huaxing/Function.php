<?php

$param	= empty($_REQUEST['param']) ? '' : $_REQUEST['param'];

function strToArray ($param)
{
	$arr = explode('&',$str);
	for($i=0;$i<count($arr);$i++)
	{
		$arrs[] = explode('=',$arr[$i]);
	}

	foreach($arrs as $k=>$v)
	{
		foreach($v as $ks=>$vs)
		{
			$arrvs[] = $vs;
		}
	}

	for($i=0;$i<count($arrvs);$i++)
	{
		if($i%2 == 0)
		{
			$kss[] = $arrvs[$i];
			$vss[] = $arrvs[$i+1];
		}
	}
	return $kv = array_combine($kss,$vss);
}
