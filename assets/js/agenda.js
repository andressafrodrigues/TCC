    function novoAgendamento(idAutonomo){
        $("#modalAgenda").modal();
        $("#formAgendamento_idAutonomo").val(idAutonomo);
        $("#formAgendamento_Status").val("A")
    }

    function agendamentos(){
        $("#modalAgendamentos").modal();
          pageurl = 'ajax/agenda/getAgendamentos.php';
          $.ajax({
              url: pageurl,
              data: null,
              dataType: 'Json',
              type: 'POST',
              cache: false,
              async : true,
              error: function(ret){
                  swal("ERROU!","ERRRRRROOOOOOUUUUUU!","error");
              },
              success: function(ret){
                exibeAgendamentosParaAutonomos();
                document.getElementById('agendamentosList').innerHTML="";
                for (i in ret) {
                  var autonomo = ret[i];
                  if (autonomo != null){
                    var div = document.createElement('div');
                    div.className = 'feed-element';
                    div.innerHTML = ret[i].divAnexavel;
                    document.getElementById('agendamentosList').appendChild(div);
                  }
                }
              }
          });
    }

    function agendamentosPrincipal(){
      pageurl = 'ajax/agenda/getAgendamentos.php';
      $.ajax({
          url: pageurl,
          data: null,
          dataType: 'Json',
          type: 'POST',
          cache: false,
          async : true,
          error: function(ret){
              swal("ERROU!","ERRRRRROOOOOOUUUUUU!","error");
          },
          success: function(ret){
            document.getElementById('dadosAutonomos').innerHTML="";
            for (i in ret) {
              var autonomo = ret[i];
              if (autonomo != null){
                var div = document.createElement('div');
                div.className = 'feed-element';
                div.innerHTML = ret[i].divAnexavel;
                document.getElementById('dadosAutonomos').appendChild(div);
              }
            }
          }
      });
    }

    function exibeAgendamentosParaAutonomos(){
      pageurl = 'ajax/agenda/getValidaAutonomo.php';
      $.ajax({
          url: pageurl,
          data: null,
          dataType: 'Json',
          type: 'POST',
          cache: false,
          async : true,
          error: function(ret){
              swal("ERROU!","ERRRRRROOOOOOUUUUUU!","error");
          },
          success: function(ret){
            if(ret.return){
              agendamentosPrincipal();
            }
          }
      });
    }

    function cancelarAgendamento(idAgendamento){
        var dadosajax = {
            'idAgendamento'        : idAgendamento
        }
        pageurl = 'ajax/agenda/setCancelAgendamento.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            dataType: 'Json',
            type: 'POST',
            cache: false,
            async : true,
            error: function(ret){
              swal("ERROU!","ERRRRRROOOOOOUUUUUU!","error");
            },
            success: function(ret){
                if(ret.return){
                    swal("Êxito!",ret.mensagem,"success");
                    agendamentos();
                }else{
                    swal("ERROU!",ret.mensagem,"error");
                }
            }
        });
    }

    function definirComoFazendo(idAgendamento){
        var dadosajax = {
            'idAgendamento'        : idAgendamento
        }
        pageurl = 'ajax/agenda/setInProgressAgendamento.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            dataType: 'Json',
            type: 'POST',
            cache: false,
            async : true,
            error: function(ret){
              swal("ERROU!","ERRRRRROOOOOOUUUUUU!","error");
            },
            success: function(ret){
                if(ret.return){
                    swal("Êxito!",ret.mensagem,"success");
                    agendamentos();
                }else{
                    swal("ERROU!",ret.mensagem,"error");
                }
            }
        });
    }

    function definirComoTerminado(idAgendamento){
        var dadosajax = {
            'idAgendamento'        : idAgendamento
        }
        pageurl = 'ajax/agenda/setDoneAgendamento.php';
        $.ajax({
            url: pageurl,
            data: dadosajax,
            dataType: 'Json',
            type: 'POST',
            cache: false,
            async : true,
            error: function(ret){
              swal("ERROU!","ERRRRRROOOOOOUUUUUU!","error");
            },
            success: function(ret){
                if(ret.return){
                    swal("Êxito!",ret.mensagem,"success");
                    agendamentos();
                }else{
                    swal("ERROU!",ret.mensagem,"error");
                }
            }
        });
    }

    function agendaServ() {
        swal({
            title: "Aviso",
            text: "Deseja efetuar este agendamento?",
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
                    var data = $("#formAgendamento").serialize(); 
                    pageurl = 'ajax/agenda/agendar.php';
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
                            console.log(ret);
                            if(ret.return){
                                swal("Êxito!","Agendamento efetuado com sucesso!","success");
                            }else{
                                swal("ERROU!",ret.mensagem,"error");
                            }
                        }
                    });
            }
        });
    }
