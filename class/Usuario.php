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

	public function setDtcadastro($dtCadastro){
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
			$this->setDtcadastro(new DateTime($row['dtcadastro']));		
		}
	}


	public function __tostring(){
		return json_encode(array(
			"idusuario"=>$this->getId(),
			"idusuario"=>$this->getLogin(),
			"idusuario"=>$this->getSenha(),
			"idusuario"=>$this->getDtCadastro()->format("d|m|Y H:i:s")

		));
	}







}

?>