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

$(document).ready(function() {
    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
    }

    $("#cep").blur(function() {
            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');
            //Verifica se campo cep possui valor informado.
                if (cep != "") {
                 //Expressão regular para validar o CEP.
                 
                    var validacep = /^[0-9]{8}$/;
                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {
                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        $("#rua").prop("disabled", false);
                        $("#bairro").prop("disabled", false);
                        $("#cidade").prop("disabled", false);
                        $("#uf").prop("disabled", false);
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });


    

});

