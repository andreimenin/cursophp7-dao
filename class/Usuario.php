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
			$row = $results[0];

			$this->setId($row['idusuario']);
			$this->setLogin($row['deslogin']);
			$this->setSenha($row['dessenha']);
			$this->setDtCadastro(new DateTime($row['dtcadastro']));		
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
			$row = $results[0];

			$this->setId($row['idusuario']);
			$this->setLogin($row['deslogin']);
			$this->setSenha($row['dessenha']);
			$this->setDtCadastro(new DateTime($row['dtcadastro']));		
		}
	}


}//FIM DA CLASSE

?>