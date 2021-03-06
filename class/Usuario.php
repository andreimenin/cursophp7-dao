<?php
class Usuario{

	private $id;
	private $login;
	private $senha;
	private $dtCadastro;


	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getLogin(){
		return $this->login;
	}

	public function setLogin($login){
		$this->login = $login;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}


	public function getDtCadastro(){
		return $this->dtCadastro;
	}

	public function setDtCadastro($dtCadastro){
		$this->dtCadastro = $dtCadastro;
	}


	public function buscarPorCodigo($id){
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>$id));

		if(count($results) > 0) {
			//$row = $results[0];

			$this->setDados($results[0]);	
		}
	}


	public function __tostring(){
		return json_encode(array(
			"idusuario"=>$this->getId(),
			"deslogin"=>$this->getLogin(),
			"dessenha"=>$this->getSenha(),
			"dtCadastro"=>$this->getDtCadastro()->format("d|m|Y ")

		));
	}

	///////64
	public static function listar(){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
	}


	public static function listarPorUsuario($login){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin;",array(':SEARCH'=>"%".$login."%"));
	}



	public function login($login, $senha){
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :SENHA", array(":LOGIN"=>$login, ":SENHA"=>$senha));

		if(count($results) > 0) {
			//$row = $results[0];
			$this->setDados($results[0]);
				
		}
	}

	public function setDados($row){
		$this->setId($row['idusuario']);
			$this->setLogin($row['deslogin']);
			$this->setSenha($row['dessenha']);
			$this->setDtCadastro(new DateTime($row['dtcadastro']));	
	}




	public function salvar(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :SENHA)", array(':LOGIN'=>$this->getLogin(),
				  ':SENHA'=>$this->getSenha()
	));

		if(count($results) > 0) {
			//$row = $results[0];
			$this->setDados($results[0]);
				
		}
	}



public function __construct($login = "", $senha = ""){
	$this->setLogin($login);
	$this->setSenha($senha);
}


public function editar($login, $senha){

	$this->setLogin($login);
	$this->setSenha($senha);

	$sql = new Sql();

	$sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :SENHA WHERE idusuario = :ID", array(
		':LOGIN'=>$this->getLogin(),
		':SENHA'=>$this->getSenha(),
		'ID'=>$this->getId()

	));
}


public function excluir(){

	$sql = new Sql();

	$sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID" , array(
			':ID'=>$this->getId()
	));

	$this->setId(0);
	$this->setLogin("");
	$this->setSenha("");
	$this->setDtCadastro(new DateTime());



}








}//FIM DA CLASSE

?>