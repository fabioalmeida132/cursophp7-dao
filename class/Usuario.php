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

            $row = $results[0];

            $this->setDeslogin($row['deslogin']);
            $this->setDessenha($row['dessenha']);
            $this->setIdusuario($row['idusuario']);
            $this->setDtcadastro( new DateTime($row['dtcadastro']));
        }
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