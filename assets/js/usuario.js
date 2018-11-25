    function cadastrarUsuario() {
        swal({
            title: "Aviso",
            text: "Deseja cadastrar com esses dados?",
            icon: "warning",
            dangerMode: true,
            buttons: {
                cancel: "Cancelar",
                confirm: {
                    text: "Sim",
                    value: "YESS"
                }
            }
        })
        .then((value) => {
            switch (value) {
                case "YESS":
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
                            swal("ERROU!","ERRRRRROOOOOOUUUUUU!","error");
                        },
                        success: function(result){
                            if(result){
                                swal("Êxito!","Cadastro efetuado com sucesso!","success");
                            }else{
                                swal("ERROU!","Erro ao tentar efetuar o cadastro!","error");
                            }
                        }
                    });
            }
        });
    }

    function salvaDadosUser(){
        swal({
            title: "Aviso",
            text: "Deseja alterar os dados?",
            icon: "warning",
            dangerMode: true,
            buttons: {
                cancel: "Cancelar",
                confirm: {
                    text: "Sim",
                    value: "YESS"
                }
            }
        })
        .then((value) => {
            switch (value) {
                case "YESS":
                    var data = $("#editaUser").serialize(); 
                    pageurl = 'ajax/usuario/edita.php';
                    $.ajax({
                        url: pageurl,
                        data: data,
                        dataType: 'Json',
                        type: 'POST',
                        cache: false,
                        async : true,
                        error: function(ret){
                            swal("ERROU!","Deu Treta","error");
                        },
                        success: function(ret){
                            if(ret.return){
                                swal("Êxito!",ret.mensagem,"success");
                                location.reload();
                            }else{
                                swal("ERROU!",ret.mensagem,"error");
                            }
                        }
                    });
            }
        });
    }

    function editarUsuario() {
        var data = $("#editaUser").serialize(); 
        pageurl = 'ajax/usuario/getDados.php';
        $.ajax({
            url: pageurl,
            data: data,
            dataType: 'Json',
            type: 'POST',
            cache: false,
            async : true,
            error: function(ret){
                swal("ERROU!","ERRRRRROOOOOOUUUUUU!","error");
            },
            success: function(ret){
                if(ret.return){
                    $("#editaUsu").modal();
                    document.getElementById('editaUser_autonomo').value = ret.autonomo;
                    $("#editaUser_email").val(ret.email);
                    $("#editaUser_nome").val(ret.nome);
                    $("#editaUser_sobrenome").val(ret.sobrenome);
                    $("#editaUser_celular").val(ret.celular);
                    $("#editaUser_password").val(ret.senha);
                    $("#editaUser_descricao").val(ret.descricao);
                    $("#editaUser_cep").val(ret.cep);
                    $("#editaUser_rua").val(ret.rua);
                    $("#editaUser_bairro").val(ret.bairro);
                    $("#editaUser_cidade").val(ret.cidade);
                    $("#editaUser_numero").val(ret.numero);
                    $("#editaUser_uf").val(ret.uf);
                }else{
                    swal("ERROU!","Não foi possível abrir tela de cadastro!","error");
                }
            }
        });
    }

    $(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
        }

        function limpa_formulário_cep_edicao() {
            // Limpa valores do formulário de cep.
            $("#editaUser_rua").val("");
            $("#editaUser_bairro").val("");
            $("#editaUser_cidade").val("");
            $("#editaUser_uf").val("");
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
                        }else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                }else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    $("#rua").prop("disabled", false);
                    $("#bairro").prop("disabled", false);
                    $("#cidade").prop("disabled", false);
                    $("#uf").prop("disabled", false);
                    alert("Formato de CEP inválido.");
                }
            }else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
      
        $("#editaUser_cep").blur(function() {
            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');
            //Verifica se campo cep possui valor informado.
            if (cep != "") {
                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;
                //Valida o formato do CEP.
                if(validacep.test(cep)) {
                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#editaUser_rua").val("...");
                    $("#editaUser_bairro").val("...");
                    $("#editaUser_cidade").val("...");
                    $("#editaUser_uf").val("...");
                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#editaUser_rua").val(dados.logradouro);
                            $("#editaUser_bairro").val(dados.bairro);
                            $("#editaUser_cidade").val(dados.localidade);
                            $("#editaUser_uf").val(dados.uf);
                        }else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep_edicao();
                            alert("CEP não encontrado.");
                        }
                    });
                }else {
                    //cep é inválido.
                    limpa_formulário_cep_edicao();
                    $("#editaUser_rua").prop("disabled", false);
                    $("#editaUser_bairro").prop("disabled", false);
                    $("#editaUser_cidade").prop("disabled", false);
                    $("#editaUser_uf").prop("disabled", false);
                    alert("Formato de CEP inválido.");
                }
            }else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep_edicao();
            }
        });
    });

