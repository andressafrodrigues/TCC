<div class="modal fade" id="modalAgenda" tabindex="-1" role="dialog" aria-labelledby="titleModalAgendamento" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="titleModalAgendamento">Novo Agendamento</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="formAgendamento" name="formAgendamento">
					<input type="hidden" class="form-control" id="formAgendamento_idAutonomo" name="formAgendamento_idAutonomo">
					<input type="hidden" class="form-control" id="formAgendamento_Status" name="formAgendamento_Status">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Data:</label>
						<input type="date" class="form-control" id="formAgendamento_data" name="formAgendamento_data">
					</div>
					<div class="form-group">
						<label class="col-form-label">Turno</label>
						<select class="form-control" id="formAgendamento_turno" name="formAgendamento_turno">
							<option value="M">Manhã</option>
							<option value="T">Tarde</option>
							<option value="N">Noite</option>
						</select>                        
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="agendaServ()">Agendar</button>
			</div>
		</div>
	</div>
</div>

