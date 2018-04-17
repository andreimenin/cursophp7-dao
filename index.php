<?php

	require_once("config.php");

	//$sql = new Sql();

	//$usuarios = $sql->select("SELECT * from tb_usuarios");

	//echo json_encode($usuarios);


	//CARREGA UM USUÁRIO
	//$root = new Usuario();
	//$root->buscarPorCodigo(5);
	//echo $root;


	//Carrega uma lista de usuários
	//$lista = Usuario::listar();

	//echo json_encode($lista);

	//CARREGA UMA LISTA DE USUÁRIOS BUSCANDO PELO LOGIN

	//$busca = Usuario::listarPorUsuario("an");

	//echo json_encode($busca);


	//CARREGA UM USUÁRIO USANDO O LOGIN E A SENHA

	//$usuario = new Usuario();
	//$usuario->login("user", "123456");

	//echo $usuario;


	//65 INSERT - CRIANDO UM NOVO USUÁRIO

	//$aluno = new Usuario("aluno","22222");	

	//$aluno->salvar();

	//echo $aluno;


	//$usuario = new Usuario();

	//$usuario->buscarPorCodigo(12);

	//$usuario->editar("pessoa" , "cassilda123");

	//echo $usuario;

//////////////////////


	$usuario = new Usuario();

	$usuario->buscarPorCodigo(12);

	$usuario->excluir();

	echo $usuario;




?>