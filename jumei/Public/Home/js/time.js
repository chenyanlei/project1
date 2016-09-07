$(function(){


	var ServerTime = new Date();

	var T = ServerTime.getTime();


	$('.count_time').each(function(){
		// console.log($(this).attr('diff')*1000);

		if($(this).attr('diff')*1000 - T <= 0){

			//来了 就去获取先辈级元素的连接 id
			var id = $(this).parents('a').attr('href');

			//正则匹配

			var reg = /^.+\/(\d+)\.\w+$/;

			var res = reg.exec(id);
			alert(222);
			for(i=0;i<res.length;i++){
				var aid = res[1];
				$.ajax({
					url:"{:U('Admin/Activity/ajax1')}",
					type:"get",
					data:{id:aid},
					async:true,
					dataType:"json",
					success:function(data){

					}

				})

			}
			console.log(aid);
			
		}

	});

})
