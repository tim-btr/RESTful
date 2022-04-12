window.onload = function() {
	$('#tbtn').click(function() {
		$.ajax({
			url: '/api/user/1',
			type: 'PUT',
			cache: false,
			contentType: "application/json",

			data: {
				"title": "My title",
				"text": "Lorem ipsum dolor sit.",
				"token": "c7edf36d75a350bdbb2c528746e1d3c0",
			},
			
			success:function (msg) {
				var resp = JSON.parse(msg);
				for(var k in msg) {
					$("#result").append(msg[k]);
				}
			},
			error: function() {
				alert('error');
			}
		});
	});
	/*$('#tbtn').click(function() {
		$.ajax({
			url: 'http://creative/api',
			type: 'DELETE',
			cache: false,

			data: {
				'token': 'c7edf36d75a350bdbb2c528746e1d3c0',
				'social':'Twitter'
			},
			data: {
				'token': '1a53d93cce05ef018ac879c02e28b695',
				'get':'socials',
			},
			success:function (msg) {
				var resp = JSON.parse(msg);
				//alert(resp);
				for(var k in msg) {
					$("#result").append(msg[k]);
				}
			},
			error: function() {
				alert('error');
			}
		});
	});*/
}