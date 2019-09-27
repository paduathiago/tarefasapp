<?php
	function criarConexao()
	{
		$banco = "tarefas";
		$usuario = "lista";
		$senha = "senha123";
		$conexao = new PDO("mysql:host=localhost;dbname=${banco}",
			$usuario, $senha,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")) ;
		return $conexao;
	}
	function buscaritens()
	{
		$conexao = criarConexao();
		$sql = "SELECT * FROM item";
		$comando = $conexao->query($sql);
		return $comando->fetchAll();
	}

	function deletaritem($id)
	{
		$conexao = criarConexao();
		$sql = "DELETE FROM item WHERE codigo = ?";
		$comando = $conexao->prepare($sql);
		return $comando->execute(
				[
					$id
				]
			);
	}
?>