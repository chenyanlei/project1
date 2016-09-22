<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
	// 注册方式
	const REG_TYPE_EMAIL        = 1;    //邮箱方式注册
	const REG_TYPE_MOBILE       = 2;    //手机方式注册
	const REG_TYPE_WX       	= 3;    //微信绑定

	// mail_notify的方式
	const MAIL_NOTIFY_AUTO      = 0 ;       //自动通知
	const MAIL_NOTIFY_CUSTOM    = 1 ;       //自定义通知


	public function __construct()
	{
		parent::__construct();
		$this->load->model('atomic/user_atomic_model', 'user_atomic');
		$this->load->model('token_model');
	}

	/**
	 * 使用手机号和短消息验证码登录
	 * 	   1. 如果手机号已经存在，直接返回用户信息
	 * 	   2. 如果手机号不存在，则先注册，然后返回用户信息
	 *
	 * @param $phone
	 *
	 * @return mixed
	 */
	public function login_by_sms($phone, $user_type, $name, $from) {

		// 根据手机号获取用户信息
		$rst = $this->get_user_infor_by_login_name($phone, User_model::REG_TYPE_MOBILE) ;

		// 如果获取用户信息错误，则先注册
		if(!$rst) {
			if($from != 'h5') {
				return null ;
			} else {
				$loginsult = '' ;
				$time = ''.time() ;
				$pwd = substr($time, strlen($time) - 6 ) ;
				$pwd = $this->generate_login_password_register($loginsult , $pwd)  ;
				$user_type = 4;

				$user =  array('user_type' => $user_type,
					'name' => $name,
					'passwd' => $pwd,
					'email' => '',
					'mobile' => $phone,
					'reg_from' => $from,
					'loginsult' => $loginsult,
					'uid' => $time ,
					'register_time' => $time,
					'level' => Ptype::ROLE_USER,
					'begin_use' => 1,
					'is_confirm' => 1,
				) ;
				$ins = $this->user_atomic->ins($user) ;

				if(empty($ins)) {
					//return -2 ;
				}

				// 设置用户详情
				$this->register_set_user_id($ins['insert_id'], $this->register_generate_user_id($ins['insert_id'])) ;
				$this->_register_set_user_name($ins['insert_id'], $this->register_generate_user_id($ins['insert_id'])) ;
			}

			$uid = $ins['insert_id'] ;
		} else {
			$uid = $rst['id'];
		}

		$rst = $this->get_user_infor_by_id($uid) ;
		$token = '' ;
		$this->token_model->set_token($token, $rst['id']) ;
		$rst['token'] = $token;

		return $rst ;
	}

	//检查用户是否存在
	public function login($username , $password, $captcha, $tag_id) {

		$row_array = $this->get_user_infor_by_login_name($username, User_model::REG_TYPE_MOBILE);

		if( !$row_array ) {
			$row_array = $this->get_user_infor_by_login_name($username, User_model::REG_TYPE_EMAIL);
			if( !$row_array ) {
				return Ecode::LOGIN_USER_NOT_EXIST ;  //用户不存在
			}
			$tag_id = $username ;//如果是手机号登录， tag_id 切换成手机号
		}

		// check captcha
		$this->load->model('captcha_model') ;

//		if(!$this->captcha_model->check_captcha_is_success($tag_id, $captcha) ) {
//			return Ecode::USER_CHECK_CAPTCHA_ERR;
//		}

		$pwd = $this->generate_login_password_login($row_array['loginsult'] , $password) ;

//		var_dump($pwd) ;
//		var_dump($row_array) ;


		if($pwd !== $row_array['passwd']) {
			return Ecode::LOGIN_PWD_IS_ERROR ;//输入密码错误
		}

		if($row_array['is_confirm'] == '0') {
			return Ecode::LOGIN_USER_IS_NOT_CONFIRM; //用户未校验
		}

		if($row_array['begin_use'] == 0) {
			// 获取最后状态
			$this->load->model('user_admin_his_model') ;
			$row_array['status_msg'] = $this->user_admin_his_model->get_user_last_status_msg($row_array['id']) ;
		}

		$token = '' ;
		$this->token_model->set_token($token, $row_array['id']) ;
		$row_array['token'] = $token;
		unset($row_array['passwd']) ;
		unset($row_array['loginsult']) ;
		unset($row_array['uid']) ;
		return $row_array; 
	}

	public function register($user_type ,$reg_type, $pwd, $email, $mobile, $name, $from,$qsc,$wx=null ) {
		if(User_model::REG_TYPE_WX != $reg_type && $this->get_user_infor_by_login_name($reg_type == User_model::REG_TYPE_EMAIL? $email:$mobile,$reg_type)) {
			return -1;  // 用户已经存在
		}

		$loginsult = '' ;
		$pwd = $this->generate_login_password_register($loginsult , $pwd)  ;
		if(!isset($mobile)) {
			$mobile = "000-".time() ;
		}

		$user =  array('user_type' => $user_type,
			'passwd' => $pwd,
			'mobile' => $mobile,
			'reg_from' => $from,
			'loginsult' => $loginsult,
			'uid' => ''.time() ,
			'register_time' => time() ) ;
		if(isset($name)) {
			$user['name'] = $name ;
		}
		if(isset($email)) {
			$user['email'] = $email ;
		}
		if(isset($wx)) {
			$where = array("wx_openid" => $wx) ;
			$cnt = $this->user_atomic->cnt($where) ;
			if($cnt > 0) {
				$select = "id";
				$rst = $this->user_atomic->slt_res_arr($where, $select) ;
				return array("insert_id" =>$rst['id']);
			}
			$user['wx_openid'] = $wx ;
		}
		$ins = $this->user_atomic->ins($user) ;

		if(empty($ins)) {
			return -2 ;
		}

		// 设置用户详情
//		$this->set_user_detail($ins['insert_id'], $qsc);
		$this->register_set_user_id($ins['insert_id'], $this->register_generate_user_id($ins['insert_id'])) ;
		$this->_register_set_user_name($ins['insert_id'], $this->register_generate_user_id($ins['insert_id'])) ;

		return $ins ;
	}

	private function register_set_user_id($id, $user_id) {
		$where = array('id'=>$id) ;
		$arr = array('uid'=>$user_id) ;
		$this->user_atomic->upd($arr, $where) ;
	}

	private function _register_set_user_name($id, $user_id) {
		$where = array('id'=>$id) ;
		$arr = array('name'=>$user_id) ;
		$this->user_atomic->upd($arr, $where) ;
	}

	public function register_generate_user_id($id) {
		return 'qsc'. (100000 + $id) ;
	}

	/**
	 * 重置密码
	 *
	 * @param $id
	 * @param $pwd
	 * @return bool
	 */
	public function reset_pwd($id, $pwd) {
		$loginsult = '' ;
		$pwd = $this->generate_login_password_register($loginsult , $pwd)  ;

		$where = array('id' => $id) ;
		$arr = array('passwd' => $pwd ,
			'loginsult' => $loginsult) ;

		$rst = $this->user_atomic->upd($arr, $where) ;
		return isset($rst['affected_rows']) ;
	}

	/**
	 *
	 * @param $login_sult
	 * @param $login_pwd
	 * @param $generate_sult  是否生成login_sult, 如果为
	 * @return string
	 */
	private function generate_login_password_register(&$login_sult, $login_pwd) {
		$login_sult = $this->rand_string(8) ;
		return md5(MD5_SALT.$login_pwd.$login_sult) ;
	}

	public function generate_login_password_login($login_sult, $login_pwd) {
		return md5(MD5_SALT.$login_pwd.$login_sult) ;
	}

	/**
	 * 设置confirm_code
	 * @param $confirm_code
	 * @param $id
	 * @param $is_confirm
	 * @return mixed
	 */
	public function set_confirm_code(&$register_code, &$confirm_code,$id,$is_confirm='0') {

		//uid + time()
		//md5
		//+uid
		//+time
		$str_uid = "$id"  ;
		$current_time = time();
		$current_time = "$current_time" ;
		$md5 = md5($str_uid.MD5_SALT.$current_time) ;
		$confirm_code = $md5.$current_time.$str_uid ;

		$register_code = rand(100000, 999999) ;

		$arr = array('confirm_code'=>$confirm_code, 'is_confirm'=>$is_confirm, 'register_code' => $register_code) ;
		$where = array('id' => $id) ;
		return $this->user_atomic->upd($arr, $where) ;
	}

	/**
	 * 设置确认
	 *
	 * @param $confirm_code
	 *
	 * @return mixed
	 */
	public function set_is_confirm($confirm_code, &$email) {
		$where=array('confirm_code' => $confirm_code );
		$select='id, confirm_code, register_time , is_confirm, email, user_type' ;

		$row = $this->user_atomic->slt_row_arr($where, $select) ;
		if($row) {
			if($row['is_confirm']) {
				return Ecode::USER_REG_MAIL_VIRYFYED ;  //邮箱已验证，请直接登录
			}

			$email = $row['email'] ;
			$register_time = $row['register_time'] ;
			$time_span = time() - $register_time ;
			if($time_span > 24*60*60) {
				return Ecode::REGISTER_MAIL_VERIFY_TIME_OUT ;  //已过期，请重新注册
			}

			// add user operate his
			// 添加状态日志
			$this->load->model("user_admin_his_model") ;
			$this->user_admin_his_model->add_user_status_msg('注册校验成功', $row['id']) ;

			$affected_rows =  $this->user_atomic->upd(array('is_confirm' => true) , $where) ;
			if($affected_rows) {
				return $affected_rows['affected_rows']  == 1 ? Ecode::OK : Ecode::UPDATE_FAIL; // 0 or 1
			} else {
				return Ecode::UPDATE_FAIL ;
			}
		} else {
			return Ecode::S2S_ARG_ERR ;
		}
	}

	public function register_get_user_detail(&$token , $mobile) {
		$where=array('mobile' => $mobile );
		$select='id, register_code, register_time , is_confirm, email' ;
		$row = $this->user_atomic->slt_row_arr($where, $select) ;

		if($row) {
			$this->token_model->set_token($token, $row['id']) ;
			$this->load->model("user_admin_his_model") ;
			$this->user_admin_his_model->add_user_status_msg('注册校验成功', $row['id']) ;
			return Ecode::OK ;

//			$affected_rows =  $this->user_atomic->upd(array('is_confirm' => true) , $where) ;
//			if($affected_rows) {
//				$this->token_model->set_token($token, $row['id']) ;
//				$this->load->model("user_admin_his_model") ;
//				$this->user_admin_his_model->add_user_status_msg('注册校验成功', $row['id']) ;
//
//				return $affected_rows['affected_rows']  == 1 ? Ecode::OK : Ecode::UPDATE_FAIL; // 0 or 1
//			} else {
//				return Ecode::UPDATE_FAIL ;
//			}
		} else {
			return Ecode::S2S_ARG_ERR ;
		}
	}

	public function set_is_confirmed_by_register_code(&$token, $register_code , $email) {
		$where=array('email' => $email );
		$select='id, register_code, register_time , is_confirm, email' ;
		$row = $this->user_atomic->slt_row_arr($where, $select) ;

		if($row) {
			if($register_code != $row['register_code']) {
				return Ecode::USER_REG_MAIL_VIRYFY_CODE_ERR ;  //验证码错误
			}

			if($row['is_confirm']) {
				return Ecode::USER_REG_MAIL_VIRYFYED ;  //邮箱已验证，请直接登录
			}

			$register_time = $row['register_time'] ;
			$time_span = time() - $register_time ;
			if($time_span > 24*60*60) {
				return Ecode::REGISTER_MAIL_VERIFY_TIME_OUT ;  //已过期，请重新注册
			}

			$affected_rows =  $this->user_atomic->upd(array('is_confirm' => true) , $where) ;
			if($affected_rows) {
				$this->token_model->set_token($token, $row['id']) ;

				$this->load->model("user_admin_his_model") ;
				$this->user_admin_his_model->add_user_status_msg('注册校验成功', $row['id']) ;

				return $affected_rows['affected_rows']  == 1 ? Ecode::OK : Ecode::UPDATE_FAIL; // 0 or 1
			} else {
				return Ecode::UPDATE_FAIL ;
			}
		} else {
			return Ecode::S2S_ARG_ERR ;
		}
	}

	// 根据uid查找用户信息
	public function get_user_infor_by_uid($uid) {
		$select = 'id, uid, privilige, email, mobile, name, register_time, status,user_type, begin_use, level';
		$row_array =  $this->user_atomic->slt_row_arr(array('id'=> $uid), $select) ;
		$this->_unset_modbile($row_array) ;
		return $row_array;
	}



	// 根据uid查找用户信息
	public function get_user_privilige_by_uid($uid) {
		$select = 'privilige';
		$rst = $this->user_atomic->slt_row_arr(array('id'=> $uid), $select) ;
		if(empty($rst)) {
			return -1;
		}
		return $rst['privilige'];
	}

	/**
	 * 根据id或者用户的类型
	 *
	 * @param $id
	 * @return mixed
	 */
	public function get_user_type_by_id($id) {
		$select = 'user_type';
		return $this->user_atomic->slt_row_arr(array('id'=> $id), $select)['user_type'] ;
	}

	/**
	 * 根据uid获取用户详情
	 * @param $uid
	 * @return mixed
	 */
	public function get_user_detai_info_by_uid($uid) {
		$this->load->model("/atomic/user_detail_atomic_model", "user_detail_automic") ;
		$select = 'qsc_id, tel, detail_addr, country, city';
		return $this->user_detail_automic->slt_row_arr(array('uid'=> $uid), $select) ;
	}

	// 根据id查找用户信息
	public function get_user_infor_by_id($id) {
		$select = 'id, uid, passwd, name, mobile, email, is_confirm, loginsult, register_time, status, user_type, privilige, begin_use, level';
		$row_array = $this->user_atomic->slt_row_arr(array('id'=> $id), $select) ;
		if(empty($row_array)) {
			return FALSE ;
		}

		$this->_unset_modbile($row_array) ;

		return $row_array;
	}

	private function _unset_modbile(&$arr) {
		if(isset($arr['mobile'])) {
			$substr = substr($arr['mobile'], 0,4) ;
			if($substr == "000-") {
				$arr['mobile'] = null;
			}
		}
	}


	// 根据login_name查找用户信息
	public function get_user_infor_by_login_name($login_name,$utype) {
		$select = 'id, uid, passwd, name, is_confirm, loginsult, register_time, status, user_type, user_s_type, privilige, begin_use, level';
		if($utype == User_model::REG_TYPE_EMAIL) {
			$login_type = "email" ;
		} else {
			$login_type = "mobile" ;
		}
		$row_array = $this->user_atomic->slt_row_arr(array($login_type=> $login_name), $select) ;

		if(empty($row_array)) {
			return FALSE ;
		}

		$this->_unset_modbile($row_array) ;

		return $row_array;
	}

	// 根据confirm_code查找用户信息
	public function get_user_infor_by_confirm_code($confirm_code) {
		$select = 'id, uid, name,passwd,is_confirm,confirm_code';
		$row_array = $this->user_atomic->slt_row_arr(array('confirm_code'=> $confirm_code), $select) ;
		if(empty($row_array)) {
			return FALSE ;
		}

		$this->_unset_modbile($row_array) ;
		return $row_array;
	}

	// 根据登录名判断用户是否存在
	public function user_is_exist($login_name, $utype) {
		if($this->get_user_infor_by_login_name($login_name,$utype)) {
			return true ;
		} else {
			return false ;
		}
	}

	/**
	 * qsc 证书编号是否存在
	 *
	 * @param qsc
	 * @return bool
	 * 		qsc证书编号存在返回true， 不存在返回false
	 */
	public function qsc_certificate_is_exist($qsc) {
		$this->load->model('atomic/user_detail_atomic_model', 'user_detail_atomic') ;
		$result = $this->user_detail_atomic->slt_res_arr(array('qsc_id' => $qsc),"qsc_id,") ;

		if(!empty($result)) {
			return true ;
		}

		return false ;
	}

	/**
	 * 设置用户详情
	 *
	 * @param $id
	 * @param $qsc_id
	 * @param string $tel
	 * @param string $detail_addr
	 * @param string $country
	 * @param string $city
	 *
	 * @return bool
	 */
	public function set_user_detail($id, $qsc_id=NULL, $tel=NULL, $detail_addr=NULL,$country=NULL,$city=NULL,$status=NULL) {
		$this->load->model('atomic/user_detail_atomic_model', 'user_detail_atomic') ;

		$where = array("uid"=>$id) ;
		$select = "qsc_id, tel, detail_addr, country, city" ;
		$result = $this->user_detail_atomic->slt_row_arr($where, $select) ;

		$update = false ;
		if( isset($result) ) {
			$update = true ;
		} else {
			$result['uid'] = $id ;
		}

		if(isset($qsc_id)) {
			$result['qsc_id']=$qsc_id ;
		}

		if(isset($tel)) {
			$result['tel'] = $tel;
		}

		if(isset($detail_addr)) {
			$result['detail_addr']=$detail_addr ;
		}

		if(isset($country)) {
			$result['country']=$country ;
		}

		if(isset($city)) {
			$result['city']=$city ;
		}

		if(isset($status)) {
			$result['status']=$status ;
		}

		//如果存在，则更新；如果不存在，则插入
		if($update) {
			return isset($this->user_detail_atomic->upd($result, $where)['affected_rows']) ;
		} else {
			return isset($this->user_detail_atomic->ins($result)['insert_id']) ;
		}
	}

	/**
	+----------------------------------------------------------
	 * 产生随机字串，可用来自动生成密码 默认长度6位 字母和数字混合
	+----------------------------------------------------------
	 * @param string $len 长度
	 * @param string $type 字串类型
	 * 0 字母 1 数字 其它 混合
	 * @param string $addChars 额外字符
	+----------------------------------------------------------
	 * @return string
	+----------------------------------------------------------
	 */
	private function rand_string($len=6,$type='',$addChars='') {
		$str ='';
		switch($type) {
			case 0:
				$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.$addChars;
				break;
			case 1:
				$chars= str_repeat('0123456789',3);
				break;
			case 2:
				$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZ'.$addChars;
				break;
			case 3:
				$chars='abcdefghijklmnopqrstuvwxyz'.$addChars;
				break;
			case 4:
				$chars = "们以我到他会作时要动国产的一是工就年阶义发成部民可出能方进在了不和有大这主中人上为来分生对于学下级地个用同行面说种过命度革而多子后自社加小机也经力线本电高量长党得实家定深法表着水理化争现所二起政三好十战无农使性前等反体合斗路图把结第里正新开论之物从当两些还天资事队批点育重其思与间内去因件日利相由压员气业代全组数果期导平各基或月毛然如应形想制心样干都向变关问比展那它最及外没看治提五解系林者米群头意只明四道马认次文通但条较克又公孔领军流入接席位情运器并飞原油放立题质指建区验活众很教决特此常石强极土少已根共直团统式转别造切九你取西持总料连任志观调七么山程百报更见必真保热委手改管处己将修支识病象几先老光专什六型具示复安带每东增则完风回南广劳轮科北打积车计给节做务被整联步类集号列温装即毫知轴研单色坚据速防史拉世设达尔场织历花受求传口断况采精金界品判参层止边清至万确究书术状厂须离再目海交权且儿青才证低越际八试规斯近注办布门铁需走议县兵固除般引齿千胜细影济白格效置推空配刀叶率述今选养德话查差半敌始片施响收华觉备名红续均药标记难存测士身紧液派准斤角降维板许破述技消底床田势端感往神便贺村构照容非搞亚磨族火段算适讲按值美态黄易彪服早班麦削信排台声该击素张密害侯草何树肥继右属市严径螺检左页抗苏显苦英快称坏移约巴材省黑武培著河帝仅针怎植京助升王眼她抓含苗副杂普谈围食射源例致酸旧却充足短划剂宣环落首尺波承粉践府鱼随考刻靠够满夫失包住促枝局菌杆周护岩师举曲春元超负砂封换太模贫减阳扬江析亩木言球朝医校古呢稻宋听唯输滑站另卫字鼓刚写刘微略范供阿块某功套友限项余倒卷创律雨让骨远帮初皮播优占死毒圈伟季训控激找叫云互跟裂粮粒母练塞钢顶策双留误础吸阻故寸盾晚丝女散焊功株亲院冷彻弹错散商视艺灭版烈零室轻血倍缺厘泵察绝富城冲喷壤简否柱李望盘磁雄似困巩益洲脱投送奴侧润盖挥距触星松送获兴独官混纪依未突架宽冬章湿偏纹吃执阀矿寨责熟稳夺硬价努翻奇甲预职评读背协损棉侵灰虽矛厚罗泥辟告卵箱掌氧恩爱停曾溶营终纲孟钱待尽俄缩沙退陈讨奋械载胞幼哪剥迫旋征槽倒握担仍呀鲜吧卡粗介钻逐弱脚怕盐末阴丰雾冠丙街莱贝辐肠付吉渗瑞惊顿挤秒悬姆烂森糖圣凹陶词迟蚕亿矩康遵牧遭幅园腔订香肉弟屋敏恢忘编印蜂急拿扩伤飞露核缘游振操央伍域甚迅辉异序免纸夜乡久隶缸夹念兰映沟乙吗儒杀汽磷艰晶插埃燃欢铁补咱芽永瓦倾阵碳演威附牙芽永瓦斜灌欧献顺猪洋腐请透司危括脉宜笑若尾束壮暴企菜穗楚汉愈绿拖牛份染既秋遍锻玉夏疗尖殖井费州访吹荣铜沿替滚客召旱悟刺脑措贯藏敢令隙炉壳硫煤迎铸粘探临薄旬善福纵择礼愿伏残雷延烟句纯渐耕跑泽慢栽鲁赤繁境潮横掉锥希池败船假亮谓托伙哲怀割摆贡呈劲财仪沉炼麻罪祖息车穿货销齐鼠抽画饲龙库守筑房歌寒喜哥洗蚀废纳腹乎录镜妇恶脂庄擦险赞钟摇典柄辩竹谷卖乱虚桥奥伯赶垂途额壁网截野遗静谋弄挂课镇妄盛耐援扎虑键归符庆聚绕摩忙舞遇索顾胶羊湖钉仁音迹碎伸灯避泛亡答勇频皇柳哈揭甘诺概宪浓岛袭谁洪谢炮浇斑讯懂灵蛋闭孩释乳巨徒私银伊景坦累匀霉杜乐勒隔弯绩招绍胡呼痛峰零柴簧午跳居尚丁秦稍追梁折耗碱殊岗挖氏刃剧堆赫荷胸衡勤膜篇登驻案刊秧缓凸役剪川雪链渔啦脸户洛孢勃盟买杨宗焦赛旗滤硅炭股坐蒸凝竟陷枪黎救冒暗洞犯筒您宋弧爆谬涂味津臂障褐陆啊健尊豆拔莫抵桑坡缝警挑污冰柬嘴啥饭塑寄赵喊垫丹渡耳刨虎笔稀昆浪萨茶滴浅拥穴覆伦娘吨浸袖珠雌妈紫戏塔锤震岁貌洁剖牢锋疑霸闪埔猛诉刷狠忽灾闹乔唐漏闻沈熔氯荒茎男凡抢像浆旁玻亦忠唱蒙予纷捕锁尤乘乌智淡允叛畜俘摸锈扫毕璃宝芯爷鉴秘净蒋钙肩腾枯抛轨堂拌爸循诱祝励肯酒绳穷塘燥泡袋朗喂铝软渠颗惯贸粪综墙趋彼届墨碍启逆卸航衣孙龄岭骗休借".$addChars;
				break;
			default :
				// 默认去掉了容易混淆的字符oOLl和数字01，要添加请使用addChars参数
				$chars='ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789'.$addChars;
				break;
		}
		if($len>10 ) {//位数过长重复字符串一定次数
			$chars= $type==1? str_repeat($chars,$len) : str_repeat($chars,5);
		}
		if($type!=4) {
			$chars   =   str_shuffle($chars);
			$str     =   substr($chars,0,$len);
		}else{
			// 中文随机字
			for($i=0;$i<$len;$i++){
				$str.= msubstr($chars, floor(mt_rand(0,mb_strlen($chars,'utf-8')-1)),1);
			}
		}
		return $str;
	}

	public function re_verify_email($email) {
		$rst = $this->get_user_infor_by_login_name($email, User_model::REG_TYPE_EMAIL) ;
		if($rst === FALSE) {
			return Ecode::FIND_PASSWORD_USER_IS_NOT_EXIST ;
		}

		$arr = array('register_time' =>time());
		$where = array('id' => $rst['id']);
		$upd = $this->user_atomic->upd($arr, $where) ;
		if(!isset($upd)) {
			return Ecode::UPDATE_FAIL ;
		}

//		$rst['register_time'] = $arr['register_time'];
//
//		$this->set_confirm_code($confirm_code,$rst['id']) ;
//		$rst['confirm_code'] = $confirm_code;

		return $rst ;
	}

	/**
	 * 更新user_id的状态
	 *
	 * @param $user_id
	 * @param $status
	 *
	 * @return bool
	 */
	public function update_user_status($user_id, $status) {
		if($status < -1 || $status > 4) {
//			return false;
		}
		$arr = array('status' =>$status);
		$where = array('id' => $user_id);
		$upd = $this->user_atomic->upd($arr, $where) ;

		return isset($upd['affected_rows']) ;
	}

	public function get_list($status = -1, $rn = 10, $pn =0 ) {

		if($status != -1) {
			$where = array('status' => $status) ;
		} else {
			$where = null ;
		}

		$total = $this->user_atomic->cnt($where) ;

		$select = 'id, uid, user_type, privilige, email, mobile, name, register_time, status, begin_use' ;

		$data = $this->user_atomic->slt_res_arr($where, $select) ;

		$rst = array('total' => $total, 'page_num' => (intval($total + $rn -1 )/$rn), 'cur_page' => $pn, 'data' => $data   ) ;

		return $rst ;
	}


	public function set_bank_info($uid, $account, $name) {
		$this->load->model('atomic/user_detail_atomic_model', 'user_detail_atomic') ;
		$rst = $this->user_detail_atomic->set_bank_info($uid , $account, $name) ;
		if(empty($rst)) {
			return false ;
		} else {
			return true ;
		}
	}

	public function get_bank_info($uid) {
		$this->load->model('atomic/user_detail_atomic_model', 'user_detail_atomic') ;
		return $this->user_detail_atomic->get_bank_info($uid) ;
	}

	public function set_currency($uid, $currency) {
		$this->load->model('atomic/user_detail_atomic_model', 'user_detail_atomic') ;
		$rst = $this->user_detail_atomic->set_currency($uid , $currency) ;
		if(empty($rst)) {
			return false ;
		} else {
			return true ;
		}
	}

	public function get_currency($uid) {
		$this->load->model('atomic/user_detail_atomic_model', 'user_detail_atomic') ;
		return $this->user_detail_atomic->get_currency($uid) ;
	}

	//检查用户密码是否正确
	public function check_user_pwd($uid,$password){
		$row_array=$this->get_user_infor_by_id($uid);
		$pwd = $this->generate_login_password_login($row_array['loginsult'] , $password) ;
		if($pwd !== $row_array['passwd']) {
			return false;
		}else{
			return true;
		}
	}

	public function begin_use_platfrom($uid) {
		$this->load->model('atomic/user_atomic_model', 'user_atomic');
//		$uid = $GLOBALS['user_id'] ;
		$where = array('id' => $uid) ;
		$data = array('begin_use' => 1) ;
		return $this->user_atomic->upd($data, $where) ;
	}

	/**
	 * 设置用户的mobile登录
	 * @param $uid
	 * @param $mobile
	 * @return bool
	 */
	public function set_user_mobile($uid, $mobile) {
		$where = array('id' => $uid) ;
		$data = array('mobile' => $mobile) ;
		$this->load->model('atomic/user_atomic_model', 'user_atomic');
		$rst = $this->user_atomic->upd($data, $where) ;
		if(!empty($rst)) {
			return true ;
		}
		return false ;
	}

	public function find_mobile_is_exist($mobile) {
		$this->load->model('atomic/user_atomic_model', 'user_atomic');
		$where = array('mobile' => $mobile) ;
		$select="id";
		$rst = $this->user_atomic->slt_row_arr($where, $select) ;
//		var_dump($rst) ;
		return !empty($rst) ;
	}

	// 设置用户等级
	public function set_user_level($uid, $level) {
		if($level > Ptype::LEVEL_AGENT_COM_LEVEL_3 || $level < Ptype::LEVEL_USER_GENERAL) {
			return false ;
		}


		$arr = array("level" => $level, "id" => $uid) ;
		$where = array("id" => $uid) ;
		$this->load->model("atomic/user_atomic_model", "user_atomic_model") ;
		$rst = $this->user_atomic->ins_or_upd($arr, $where) ;
		if($rst > 0) {
			return true ;
		}
		return false ;
	}

}

/* vim: set ts=4 sw=4 sts=4 noet: */
