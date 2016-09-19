<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       //创建对象
        $info = M('activity');
        $infos = M('brand');
       $_SESSION['url']=$_SERVER['REQUEST_URI'];
       
    	$cate=M('cate');
        $web=M('webconfig');
        $god=M('goods');
        foreach($_SESSION['cart'] as $k=>$v){
            $goodsinfo=$god->find($v['gid']);
            $goodsinfo['num']=$v['num'];
            $cartgood[]=$goodsinfo;
        }
        $webinfo=$web->where('enable=1')->find();

    	$cates=$cate->where('layer=1')->select();
    	for ($i=0;$i<count($cates);$i++){
    		$cates[$i]['son']=$cate->where('pid='.$cates[$i]['id'])->select();
    		for($j=0;$j<count($cates[$i]['son']);$j++){
    			$cates[$i]['son'][$j]['grandson']=$cate->where('pid='.$cates[$i]['son'][$j]['id'])->select();
    		}
    	}
        
        //前台遍历三级分类查询数据
        $bind1=$infos->where('type=60')->select();

        //将查询的数据赋给当前二级分类中的数组son
        foreach($bind1 as $k=>$v){

            $bind1[$k]['son']=$infos->where("path='".$v['path'].','.$v['id']."'")->select();
            
        }

        // 查询数据库
        // $res = $info->query('select c1.*,c2.bname as names from sdc_brand c1 left join sdc_brand c2 on c1.type=c2.id where c1.type = c2.id order by id');
        // $res = $info->where('power=1')->select();
        $res = $info->query('select b.*,a.*, concat(a.edate_submit,",",a.etime) as path from sdc_brand b left join sdc_activity a on a.pid=b.id where a.pid=b.id order by path desc');

        $infor = $infos->select();

        //查询最顶级的分类 == 推荐品牌
        $fir = $infos->where('type=0')->find();

        //查询参加BANNER左侧分类导航品牌显示的数据 power=2的数据
        $sort = $infos->where('power=2')->select();
        // $res = $info->where('sdc_brand.type = sdc_brand.id')->select();
        // //分配变量

        $this->assign('infor',$infor);
        $this->assign('res',$res);
        $this->assign('bind1',$bind1);
        $this->assign('fir',$fir);
        $this->assign('sort',$sort);
        $this->assign('webinfo',$webinfo);
        $this->assign('cates',$cates);
    	$this->assign('cartgood',$cartgood);
     	$this->display();
    }

    //接收模板首页ajax传递过来的id 并将到期的品牌的expired字段修改为0
    public function test(){
        $id = I('get.id');

        //创建模型
        $time = M('activity');

        $expired['expired'] = 0;

        $info = $time->where('id='.$id)->save($expired);

    }
   
}