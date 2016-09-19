<?php

namespace Home\Controller;
use Think\Controller;
class AddressController extends Controller{

    //点击修改按钮 将id传过来查询数据库 将结果返回
    public function add_ajax(){

        $id = I('post.id');

        $res = M('address');

        $info = $res->where('id='.$id)->find();

        echo json_encode($info);


    }

    //点击修改按钮 将id传过来删除该id的数据
    public function del_ajax(){

        $id = I('post.id');

        $del = M('address');

        $del->where('id='.$id)->delete();

        $del->create();
        
        if($del){
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(0);
        }
    }

    public function address(){

        session_start();

        //获取SESSION接过来的用户id
        $uid = $_SESSION['id'];

        //创建模型
        $info = M('address');

        //查询当前用户的地址信息
        $res = $info->where('uid='.$uid)->select();

        // var_dump($res);
        //分配变量
        $this->assign('res',$res);

        //解析模板
        $this->display();

    }

    public function insert(){

        session_start();

        //获取SESSION接过来的用户id
        $uid = $_SESSION['id'];

        $_POST['uid'] = $uid;

        $aid = $_POST['id'];

        // var_dump($_POST);die;
        //创建模型
        $info = M('address');

        //查询数据
        $res = $info->where('uid='.$uid)->select();

        foreach ($res as $key => $value) {
            $count = count($res);

            $id = $value['id'];

            $userid = $value['uid'];

            //过滤数据
            $info->create();

            if($id == $aid && $userid == $uid){
                $info->where('id='.$aid)->save();
                echo '<script>alert("收货地址更新成功!");window.location.href="address.html";</script>';
            }else{

                //过滤数据
                $info->create();
                $info->add();

                echo '<script>alert("收货地址创建成功!");window.location.href="address.html";</script>';
            }
        }

        
        

        


    }

}


?>