   function cadastrarUsuario() {
        var confirma = confirm("Deseja cadastrar?");
        if (confirma == true){
            var data = $("#cadastroUser").serialize(); 
            pageurl = 'ajax/usuario/cadastro.php';
            $.ajax({
                url: pageurl,
                data: data,
                dataType: 'script',
                type: 'POST',
                cache: false,
                async : true,
                error: function(result){
                    alert("Erro!");
                },
                success: function(result){
                    console.log(result);
                    if(result){
                        alert("Cadastro com sucesso!");
                    }else{
                        alert("Cadastro com erro!");
                    }
                }
            });
        }
    }