<?php

	require_once("config.php");

	//$sql = new Sql();

	//$usuarios = $sql->select("SELECT * from tb_usuarios");

	//echo json_encode($usuarios);


	//CARREGA UM USUÁRIO
	$root = new Usuario();
	$root->buscarPorCodigo(5);
	echo $root;


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




?>