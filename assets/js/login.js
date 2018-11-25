$("button.btn-login").click(function(){
		var data = $("#formLogin").serialize();		
		$.ajax({
			type : 'POST',
			url  : 'ajax/usuario/login.php',
			data : data,
			dataType: 'script',
			beforeSend: function()
			{
				$("#btn-login").html('Validando ...');
			},
			error: function(response) {
				alert("Error!");
			}
			,
			success :  function(response){
				console.log(response);
				alert('sucesso');
				if(response){	
					$("button.btn-login").html('Entrar');
					$("#login-alert").css('display', 'none')
					window.location.href = "home.php";
				}else{
					$("button.btn-login").html('Entrar');
					$("#login-alert").css('display', 'block')
					$("#mensagem").html('<strong>Erro! </strong>' + response.mensagem);
				}
		    }
		});
	});
 