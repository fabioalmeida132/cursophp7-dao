<?php
/**
 * Created by PhpStorm.
 * User: fabio
 * Date: 14/11/2018
 * Time: 13:11
 */

Class Usuario {

    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function __construct($login = "", $senha = "")
    {
        $this->setDeslogin($login);
        $this->setDessenha($senha);
    }


    /** @GETTER Idusuario */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /** @SETTER Idusuario */
    public function setIdusuario($idusuario): void
    {
        $this->idusuario = $idusuario;
    }

    /** @GETTER Deslogin */
    public function getDeslogin()
    {
        return $this->deslogin;
    }

    /** @SETTER Deslogin */
    public function setDeslogin($deslogin): void
    {
        $this->deslogin = $deslogin;
    }

    /** @GETTER Dessenha */
    public function getDessenha()
    {
        return $this->dessenha;
    }

    /** @SETTER Dessenha */
    public function setDessenha($dessenha): void
    {
        $this->dessenha = $dessenha;
    }

    /** @GETTER Dtcadastro */
    public function getDtcadastro()
    {
        return $this->dtcadastro;
    }

    /** @SETTER Dtcadastro */
    public function setDtcadastro($dtcadastro): void
    {
        $this->dtcadastro = $dtcadastro;
    }

    public function loadByid($id){
        $sql = new sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID",array(
            ":ID"=>$id
        ));

        if (count($results) > 0) {

            $this->setData($results[0]);
        }
    }

    public static function getLista(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios order by deslogin");
    }

    public static function search($login){
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH order by deslogin", array(
            ':SEARCH'=>"%".$login."%"
        ));
    }

    public function login($login,$password){
        $sql = new sql();

        $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD",array(
            ":LOGIN"=>$login,
            ":PASSWORD"=>$password
        ));

        if (count($results) > 0) {

            $this->setData($results[0]);

        }else{
            throw new Exception("Login e/ou senha inválidos!");
        }
    }

    public function setData($data){
        $this->setDeslogin($data['deslogin']);
        $this->setDessenha($data['dessenha']);
        $this->setIdusuario($data['idusuario']);
        $this->setDtcadastro( new DateTime($data['dtcadastro']));
    }

    public function insert(){
        $sql = new Sql();
        $results = $sql->select("CALL sp_usuarios_insert(:LOGIN,:PASSWORD)",array(
            ":LOGIN"=>$this->getDeslogin(),
            ":PASSWORD"=>$this->getDessenha()
        ));

        if(count($results) > 0){
            $this->setData($results[0]);
        }
    }

    public function update($login, $password){

        $this->setDeslogin($login);
        $this->setDessenha($password);

        $sql = new Sql();
        $sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array(
            ":LOGIN"=>$this->getDeslogin(),
            ":PASSWORD"=>$this->getDessenha(),
            ":ID"=>$this->getIdusuario()
        ));
    }

    public function __toString()
    {
     return json_encode(array(
         "idusuario"=>$this->getIdusuario(),
         "deslogin"=>$this->getDeslogin(),
         "dessenha"=>$this->getDessenha(),
         "dtcadastro"=>$this->getDtcadastro()->Format("d/m/Y H:i:s")
     ));
    }


}