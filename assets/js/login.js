$("button.btn-login").click(function(){
		var data = $("#formLogin").serialize();		
		$.ajax({
			type : 'POST',
			url  : 'ajax/usuario/login.php',
			data : data,
			dataType: 'Json',
			beforeSend: function()
			{
				$("#btn-login").html('Validando ...');
			},
			error: function(ret) {
				swal("ERROU!","ERRRRRROOOOOOUUUUUU!","error");
			},
			success :  function(ret){
				alert(ret.idUser);
				if(ret.retorno) {
					$("button.btn-login").html('Entrar');
					$("#login-alert").css('display', 'none')
					window.location.href = "home.php";
				}else {
					//$("button.btn-login").html('Entrar');
					//$("#login-alert").css('display', 'block')
					//$("#mensagem").html('<strong>Erro! </strong>' + ret.mensagem);
					swal("ERROU!",ret.mensagem,"error");
				}
		    }
		});
	});
 