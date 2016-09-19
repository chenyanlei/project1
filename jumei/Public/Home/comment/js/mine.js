$(function(){
	$.ajax({
		url: "{:U('Home/Comment/house')}",
		type: 'GET',
		dataType: 'json',
		data: {},
		success:function(data){
			alert('data');
		},
	})
	
	
	
})

	