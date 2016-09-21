<?php
require_once APPPATH."libraries/Commen.php" ;
$agent = $user_detail['agent'] ;


?>
<style>
		body{
			font-family: "Microsoft Yahei"
		}
		.table>tbody>tr>td{
			text-align: center;
			vertical-align: middle;
		}
		.mine_info_main{
			float: right;
			width: 1000px;
			margin-top: 30px;
		}
</style>
		<?php
		if($agent['agent_type'] === "0") {
			?>
			<div class="mine_info_main">
				<div style="margin-bottom:50px;"
				">
				<table class="table table-bordered">
					<tr style="height:35px;color:#777;font-size:14px;">
						<td>用户身份</td>
						<td>联系人</td>
						<td>手机号</td>
						<td>联系人手机号</td>
					</tr>
					<tr style="height:40px;color:#333;font-size:14px;">
						<td><?= get_role_name($user_detail['level']) ?></td>
						<td><?= $agent['info']['name'] ?></td>
						<td><?= format_mobile($user_detail['mobile']) ?></td>
						<td><?= $agent['info']['contact'] ?></td>
					</tr>
				</table>
			</div>
			<div>
				<table class="table table-bordered">
					<tr style="height:35px;color:#777;font-size:14px;">
						<td>代理商名称</td>
						<td>联系地址</td>
						<td>注册邮箱</td>
						<td>身份证号</td>
					</tr>
					<tr style="height:65px;color:#333;font-size:14px;">
						<td><?= $user_detail['name'] ?></td>
						<td><?= $agent['info']['address'] ?></td>
						<td><?= $user_detail['email'] ?></td>
						<td>26512198808151640</td>
					</tr>
				</table>
			</div>
			</div>
			<?php
		}else {
			?>
			<div class="mine_info_main">
				<div style="margin-bottom:50px;"
				">
				<table class="table table-bordered">
					<tr style="height:35px;color:#777;font-size:14px;">
						<td>用户身份</td>
						<td>联系人</td>
						<td>手机号</td>
						<td>联系人手机号</td>
					</tr>
					<tr style="height:40px;color:#333;font-size:14px;">
						<td><?= get_role_name($user_detail['level']) ?></td>
						<td><?= $agent['info']['contact'] ?></td>
						<td><?= format_mobile($user_detail['mobile']) ?></td>
						<td><?= $agent['info']['contact_phone'] ?></td>
					</tr>
				</table>
			</div>
			<div>
				<table class="table table-bordered">
					<tr style="height:35px;color:#777;font-size:14px;">
						<td>代理商名称</td>
						<td>联系地址</td>
						<td>注册邮箱</td>
						<td>身份证号</td>
					</tr>
					<tr style="height:65px;color:#333;font-size:14px;">
						<td><?= $agent['info']['name'] ?></td>
						<td><?= $agent['info']['address'] ?></td>
						<td><?= $user_detail['email'] ?></td>
						<td>26512198808151640</td>
					</tr>
				</table>
			</div>
			</div>
			<?php

		}
	function format_mobile($mobile) {
		if(!isset($mobile) || strlen($mobile) <= 0) {
			return "未设置" ;
		}
		return $mobile ;
	}

	function get_role_name($role) {
		$role_txt = "" ;
		switch($role) {
			case Ptype::LEVEL_USER_GENERAL:
				$role_txt = "普通用户" ;
				break ;
			case Ptype::LEVEL_AGENT_PERSON_LEVEL_1:
				$role_txt = "个人代理1级" ;
				break ;
			case Ptype::LEVEL_AGENT_PERSON_LEVEL_2:
				$role_txt = "个人代理2级" ;
				break ;
			case Ptype::LEVEL_AGENT_PERSON_LEVEL_3:
				$role_txt = "个人代理3级" ;
				break ;
			case Ptype::LEVEL_AGENT_COM_LEVEL_1:
				$role_txt = "公司代理1级" ;
				break ;
			case Ptype::LEVEL_AGENT_COM_LEVEL_2:
				$role_txt = "公司代理2级" ;
				break ;
			case Ptype::LEVEL_AGENT_COM_LEVEL_3:
				$role_txt = "公司代理3级" ;
				break ;
			default:
				break ;
		}

		return $role_txt ;
	}

?>