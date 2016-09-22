<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model
{
	private $ERC_OK							= Ecode::OK;
	private $ERC_NO_RESULT					= Ecode::NO_RESULT; //查询错误或无结果
	private $ERC_UPLOAD_FAIL				= Ecode::UPLOAD_FAIL;
	private $ERC_UPDATE_FAIL				= Ecode::UPDATE_FAIL;
	private $ERC_MODULE_NOT_ALLOWED_UPLOAD	= Ecode::MODULE_NOT_ALLOWED_UPLOAD;

	public function __construct()
	{
		parent::__construct();
	}

	public function set_module(&$row_arr, $user_id, $module, $module_id)
	{
		$this->load->helper('dir');
		$dir_erc = h_get_user_dir($user_dir, $user_id);
		if (0 !== $dir_erc)
		{
			return $dir_erc;
		}
		$time = time();
		$config['upload_path'] = $user_dir;
		$config['file_name'] = $module.'_'.$module_id.'_'.$time.'.png';
		$config['allowed_types'] = '*';
		$config['overwrite'] = TRUE;
		$config['max_size'] = '2048'; //2048k == 2M
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('img'))
		{
			Ecode::logs($this->ERC_UPLOAD_FAIL, __METHOD__, 'user_id='.$user_id, 'module='.$module.'&module_id='.$module_id);
			return $this->ERC_UPLOAD_FAIL;
		}
		$row_arr['img'] = $img = URL_IMG_USER.$user_id.DIRECTORY_SEPARATOR.$config['file_name'];
		if ('topic_comment_img' == $module) //高频,覆盖,仅1张
		{
			$this->load->model('atomic/topic_comment_atomic_model', 'topic_comment_atomic');
			$topic_comment_row_arr = $this->topic_comment_atomic->slt_row_arr(array('topic_comment_id'=>$module_id), 'img');
			if (!isset($topic_comment_row_arr['img']))
			{
				return $this->ERC_NO_RESULT;
			}
			$topic_comment_upd_ret = $this->topic_comment_atomic->upd(array('img'=>$img), array('topic_comment_id'=>$module_id));
			if (!isset($topic_comment_upd_ret['affected_rows']) || (1 != $topic_comment_upd_ret['affected_rows']))
			{
				Ecode::logs($this->ERC_UPDATE_FAIL, __METHOD__, 'user_id='.$user_id, 'topic_comment_id='.$module_id.'&img='.$img);
				return $this->ERC_UPDATE_FAIL;
			}
		}
		elseif ('topic_img' == $module) //高频,追加,最多9张
		{
			$this->load->model('atomic/topic_atomic_model', 'topic_atomic');
			$topic_row_arr = $this->topic_atomic->slt_row_arr(array('topic_id'=>$module_id, 'user_id'=>$user_id), 'img');
			if (!isset($topic_row_arr['img']))
			{
				return $this->ERC_NO_RESULT;
			}
			$img = empty($topic_row_arr['img']) ? $img : $topic_row_arr['img'].','.$img;
			$topic_upd_ret = $this->topic_atomic->upd(array('img'=>$img), array('topic_id'=>$module_id));
			if (!isset($topic_upd_ret['affected_rows']) || (1 != $topic_upd_ret['affected_rows']))
			{
				Ecode::logs($this->ERC_UPDATE_FAIL, __METHOD__, 'user_id='.$user_id, 'topic_id='.$module_id.'&img='.$img);
				return $this->ERC_UPDATE_FAIL;
			}
		}
		elseif ('timeline_comment_img' == $module) //高频,覆盖,仅1张
		{
			$this->load->model('atomic/timeline_comment_atomic_model', 'timeline_comment_atomic');
			$timeline_comment_row_arr = $this->timeline_comment_atomic->slt_row_arr(array('timeline_comment_id'=>$module_id), 'img');
			if (!isset($timeline_comment_row_arr['img']))
			{
				return $this->ERC_NO_RESULT;
			}
			$timeline_comment_upd_ret = $this->timeline_comment_atomic->upd(array('img'=>$img), array('timeline_comment_id'=>$module_id));
			if (!isset($timeline_comment_upd_ret['affected_rows']) || (1 != $timeline_comment_upd_ret['affected_rows']))
			{
				Ecode::logs($this->ERC_UPDATE_FAIL, __METHOD__, 'user_id='.$user_id, 'timeline_comment_id='.$module_id.'&img='.$img);
				return $this->ERC_UPDATE_FAIL;
			}
		}
		elseif ('timeline_img' == $module) //高频,追加,最多9张
		{
			$this->load->model('atomic/timeline_atomic_model', 'timeline_atomic');
			$timeline_row_arr = $this->timeline_atomic->slt_row_arr(array('timeline_id'=>$module_id, 'user_id'=>$user_id), 'img');
			if (!isset($timeline_row_arr['img']))
			{
				return $this->ERC_NO_RESULT;
			}
			$img = empty($timeline_row_arr['img']) ? $img : $timeline_row_arr['img'].','.$img;
			$timeline_upd_ret = $this->timeline_atomic->upd(array('img'=>$img), array('timeline_id'=>$module_id));
			if (!isset($timeline_upd_ret['affected_rows']) || (1 != $timeline_upd_ret['affected_rows']))
			{
				Ecode::logs($this->ERC_UPDATE_FAIL, __METHOD__, 'user_id='.$user_id, 'timeline_id='.$module_id.'&img='.$img);
				return $this->ERC_UPDATE_FAIL;
			}
		}
		elseif ('user_avatar' == $module) //低频,覆盖,仅1张
		{
			$this->load->model('atomic/user_atomic_model', 'user_atomic');
			$user_row_arr = $this->user_atomic->slt_row_arr(array('user_id'=>$user_id), 'avatar');
			if (!isset($user_row_arr['avatar']))
			{
				return $this->ERC_NO_RESULT;
			}
			$user_upd_ret = $this->user_atomic->upd(array('avatar'=>$img), array('user_id'=>$user_id));
			if (!isset($user_upd_ret['affected_rows']) || (1 != $user_upd_ret['affected_rows']))
			{
				Ecode::logs($this->ERC_UPDATE_FAIL, __METHOD__, 'user_id='.$user_id, 'img='.$img);
				return $this->ERC_UPDATE_FAIL;
			}
		}
		elseif ('user_cover' == $module) //低频,覆盖,仅1张
		{
			$this->load->model('atomic/user_atomic_model', 'user_atomic');
			$user_row_arr = $this->user_atomic->slt_row_arr(array('user_id'=>$user_id), 'cover');
			if (!isset($user_row_arr['cover']))
			{
				return $this->ERC_NO_RESULT;
			}
			$user_upd_ret = $this->user_atomic->upd(array('cover'=>$img), array('user_id'=>$user_id));
			if (!isset($user_upd_ret['affected_rows']) || (1 != $user_upd_ret['affected_rows']))
			{
				Ecode::logs($this->ERC_UPDATE_FAIL, __METHOD__, 'user_id='.$user_id, '&img='.$img);
				return $this->ERC_UPDATE_FAIL;
			}
		}
		else
		{
			return $this->ERC_MODULE_NOT_ALLOWED_UPLOAD;
	 	}
		return $this->ERC_OK;
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
