<div class="modal inmodal fade in" id="editaUsu" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <h4 class="modal-title">Usuario</h4>
                <small class="font-bold">Edição de Usuario.</small>
            </div>
            <div class="modal-body">
                <form id="editaUser" action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="editaUser_id" id="editaUser_id" value="<?= $_SESSION["idUser"]; ?>" required=""/>

                        <label class="col-sm-4 control-label">Nome:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="editaUser_nome" id="editaUser_nome" required=""/>
                        </div><Br>

                        <label class="col-sm-4 control-label">Sobrenome:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="editaUser_sobrenome" id="editaUser_sobrenome" required=""/>
                        </div><Br>

                        <label class="col-sm-4 control-label">Email:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" name="editaUser_email" id="editaUser_email" required=""/>
                        </div><Br>

                        <label class="col-sm-4 control-label">Senha:</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="editaUser_password" id="editaUser_password" required=""/>
                        </div><Br>
              
                        <label class="col-sm-4 control-label">Celular:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="editaUser_celular" id="editaUser_celular" required=""/>
                        </div><Br>

                        
                        <label class="col-sm-4 control-label">Descricão:</label>
                        <div class="col-sm-8">
                            <textarea type="text" class="form-control" name="editaUser_descricao" id="editaUser_descricao" required=""/></textarea>
                        </div><Br>

                        <label class="col-sm-4 control-label">CEP:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="editaUser_cep" id="editaUser_cep" required=""/>
                        </div><Br>

                        <label class="col-sm-4 control-label">Estado:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="editaUser_uf" id="editaUser_uf" required=""/>
                        </div><Br>
                        <label class="col-sm-4 control-label">Cidade:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="editaUser_cidade" id="editaUser_cidade" required=""/>
                        </div><Br>
                        <label class="col-sm-4 control-label">Bairro:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="editaUser_bairro" id="editaUser_bairro" required=""/>
                        </div><Br>
                        <label class="col-sm-4 control-label">Rua:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="editaUser_rua" id="editaUser_rua" required=""/>
                        </div><Br>
                        
                        <label class="col-sm-4 control-label">Número:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="editaUser_numero" id="editaUser_numero" required=""/>
                        </div><Br>

                        <label class="col-sm-4 control-label">Você está aqui para:</label>
                        <div class="col-sm-8">
                          <select class="form-control" id="editaUser_autonomo" name="editaUser_autonomo">
                            <option value="S">Prestador serviço</option>
                            <option value="N">Contratar serviço</option>
                          </select>                        
                      </div><Br>
                    </div>
                </form>
            </div>    
            <div class="modal-footer">
                <button type="button" class="btn btn-white" value="fecharModal_cadastroUsu" id="editaUser_fecharModal_cadastroUsu" data-dismiss="modal">
                    Fechar
                </button>
                <button type="button" value="Salvar" id="editaUser_salvar" class="btn btn-primary" onclick="salvaDadosUser()">
                    Salvar
                </button>

            </div>
        </div>
    </div>
</div>

 <script src="assets/js/usuario.js" type="text/javascript"></script>
