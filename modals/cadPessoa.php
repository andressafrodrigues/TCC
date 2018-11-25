<div class="modal inmodal fade in" id="cadastroUsu" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <h4 class="modal-title">Usuario</h4>
                <small class="font-bold">Cadastro de Usuario.</small>
            </div>
            <div class="modal-body">
                <form id="cadastroUser" action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nome:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nome" id="nome" required=""/>
                        </div><Br>


                        <label class="col-sm-4 control-label">Sobrenome:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="sobrenome" id="sobrenome" required=""/>
                        </div><Br>


                        <label class="col-sm-4 control-label">Email:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="email" id="email" required=""/>
                        </div><Br>

                        <label class="col-sm-4 control-label">Senha:</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" id="password" required=""/>
                        </div><Br>
              
                        <label class="col-sm-4 control-label">Celular:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="celular" id="celular" required=""/>
                        </div><Br>

                        
                        <label class="col-sm-4 control-label">Descricão:</label>
                        <div class="col-sm-8">
                            <textarea type="text" class="form-control" name="descricao" id="descricao" required=""/></textarea>
                        </div><Br>

                        <label class="col-sm-4 control-label">CEP:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="cep" id="cep" required=""/>
                        </div><Br>

                        <label class="col-sm-4 control-label">Estado:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="uf" id="uf" required=""/>
                        </div><Br>
                        <label class="col-sm-4 control-label">Cidade:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="cidade" id="cidade" required=""/>
                        </div><Br>
                        <label class="col-sm-4 control-label">Bairro:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="bairro" id="bairro" required=""/>
                        </div><Br>
                        <label class="col-sm-4 control-label">Rua:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="rua" id="rua" required=""/>
                        </div><Br>
                        
                        <label class="col-sm-4 control-label">Número:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="numero" id="numero" required=""/>
                        </div><Br>

                        <label class="col-sm-4 control-label">Você está aqui para:</label>
                        <div class="col-sm-8">
                          <select class="form-control" id="autonomo" name="autonomo">
                            <option value="S">Prestador serviço</option>
                            <option value="N">Contratar serviço</option>
                          </select>                        
                      </div><Br>
                    </div>
                </form>
            </div>    
            <div class="modal-footer">
                <button type="button" class="btn btn-white" value="fecharModal_cadastroUsu" id="fecharModal_cadastroUsu" data-dismiss="modal">Fechar</button>
                <button type="button" value="Salvar" id="salvar" class="btn btn-primary" onclick="cadastrarUsuario()" >Salvar</button>
            </div>
        </div>
    </div>
</div>

 <script src="assets/js/usuario.js"></script>
