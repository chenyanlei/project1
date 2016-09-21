<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('h_get_user_dir'))
{
	function h_get_user_dir(&$user_dir, $user_id)
	{
		$user_dir = PATH_IMG_USER.$user_id.DIRECTORY_SEPARATOR;
		if (!is_dir($user_dir))
		{
			if (!mkdir($user_dir, DIR_READ_MODE))
			{
				$err = Ecode::USER_IMG_MKDIR_FAIL;
				Ecode::logs($err, __METHOD__, 'user_id='.$user_id);
				return $err;
			}
		}
		return Ecode::OK;
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
