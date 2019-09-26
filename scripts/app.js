$(document).ready(function() {

	$('#modal-tarefa').on('shown.bs.modal', function() {

		$('#descricao').text('');
		$('#descricao').focus();

	});

});