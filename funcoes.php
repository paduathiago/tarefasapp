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
	function adicionaritem($nome,$prazo)
	{
		$conexao = criarConexao();
		$sql = "INSERT INTO item values (null,?,?,0)";
		$comando = $conexao->prepare($sql);
		return $comando->execute(
				[
					$nome,$prazo
				]
			);
	}
	function Concluiritem($id)
	{
		$conexao = criarConexao();
		$sql = "UPDATE item SET concluida=1  WHERE codigo = ?";
		$comando = $conexao->prepare($sql);
		return $comando->execute(
				[
					$id
				]
			);
	}
?>