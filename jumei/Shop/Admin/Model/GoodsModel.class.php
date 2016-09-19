<?php 
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model{
	//自动验证的数组
	protected $_validate = array(
 		array('price','is_numeric','价格必须为数字',0 ,'function',3,),
 		array('cprice','is_numeric','价格必须为数字',0 ,'function',3,),
 		array('discount','checkDisc','折扣必须为0-10的之间数字',0 ,'function',3,),
 		array('store','is_numeric','库存必须为数字',0 ,'function',3,),
 		array('cate','checkCate','必须选择分类',0 ,'function',3,),
	);

	protected $_auto  = array(
		array('shelf','1'),
		array('spic','dealPic' ,3,'function')
		);


}

 ?>