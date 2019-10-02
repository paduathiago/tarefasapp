<?php
	require ('funcoes.php');
	if (!empty($_POST['acao'])) 
	{
		if ($_POST['acao'] == "excluir")
		{
			deletaritem($_POST['id']);
		}
		else if ($_POST['acao'] == "adicionar")
		{
			adicionaritem($_POST['nome'],$_POST['prazo']);
		}
		else if ($_POST['acao'] == "concluir")
		{
			Concluiritem($_POST['id']);
		}
		header("Location: index.php");
	}

	$itens = buscaritens();	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Tarefas App</title>

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Open Iconic - biblioteca de ícones -->
	<link rel="stylesheet" href="open-iconic/font/css/open-iconic-bootstrap.css">

    <!-- meus estilos -->
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a href="#" class="navbar-brand">Tarefas</a>
	</nav>
	<main class="container">

		<!-- lista de tarefas cadastradas -->

		<?php foreach ($itens as $i ): ?>
			<div class="card mb-3">
			<div class="card-body">
				<h5 class="card-title">
				<?php if($i['concluida']==1): ?>

					<del><?=$i['nome']?></del>
				
				<?php else:?>
					<?=$i['nome']?>
				<?php endif; ?>

				</h5>
				<p class="card-text text-muted">Prazo: <?= $i['prazo'] ?></p>
			</div>
			<div class="card-footer text-right">
				
				<form action="index.php" method="post">
					<!-- dica: colocar um input hidden aqui -->
					<input type="hidden" name="id" value="<?= $i['codigo'] ?>">
					<button type="submit" name="acao" value="excluir" class="btn btn-link btn-excluir">
						<span class="oi oi-trash" title="trash"></span>
						Excluir
					</button>
					<button type="submit" name="acao" value="concluir" class="btn btn-primary" 
					<?php if($i['concluida']==1):?>
						disabled
					<?php endif; ?>>
						<span class="oi oi-check" title="trash"></span>
						Concluir
					</button>
				</form>
			</div>
		</div>
		<?php endforeach; ?>
		



		


		<!-- botao flutuante -->

		<div class="fab">
			<button class="fab-button" type="button" data-toggle="modal" data-target="#modal-tarefa">
				<span class="oi oi-plus"></span>
			</button>
		</div>

		<!-- formulario modal de criação de nova tarefa -->

		<div id="modal-tarefa" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Nova Tarefa</h5>
					</div>
					<div class="modal-body">
						<form id="frm-tarefa" action="index.php" method="post">
							<div class="form-group">
								<label for="descricao">* Descrição</label><input type="text" id="nome" class="form-control" name="nome" autofocus required>
							</div>
							<div class="form-group">
								<label for="prazo">Prazo</label><input type="date" class="form-control" id="prazo" name="prazo">
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						<button class="btn btn-primary" type="submit" form="frm-tarefa" name="acao" value="adicionar">Adicionar</button>
					</div>
				</div>
			</div>

		</div>
	</main>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	

    <!-- meus scripts -->
    <script type="text/javascript" src="scripts/app.js"></script>
</body>
</html>