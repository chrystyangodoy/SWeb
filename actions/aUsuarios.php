<?php

require '../model/mUsuario.php';

class aUsuarios extends mUsuario{
    protected $sqlInsert = "INSERT INTO seg_usuario(DSC_Login, DSC_Senha, DTM_Inicio, DTM_Fim, ID_SEG_Grupo) VALUES ('%s',MD5('%s'),'%s','%s','%s')";
    protected $sqlUpdate = "update seg_usuario set DSC_Login = '%s',DSC_Senha= '%s',DTM_Inicio= '%s',DTM_Fim= '%s', ID_SEG_Grupo='%s' where ID_Usuario = '%s'";
    protected $sqlDelete = "delete from seg_usuario where ID_Usuario = '%s'";
    protected $sqlSelect = "select * from seg_usuario where 1=1 %s %s"; 
    
    public function insert(){
        $sql = sprintf($this->sqlInsert, $this->getLogin(), $this->getSenha(), $this->getEmail(), $this->getNome());
        return $this->RunQuery($sql);
    }
    
    public function update(){
        $sql = sprintf($this->sqlUpdate,$this->getUser_ID() ,$this->getLogin(), $this->getSenha(), $this->getDataIni(), $this->getDatafim(), $this->getGrupo());
        return $this->RunQuery($sql);
    }
    
    public function delete(){
        $sql = sprintf($this->sqlDelete, $this->getUser_ID());
        return $this->RunQuery($sql);
    }
    
    public function select($where='',$order=''){
        $sql = sprintf($this->sqlSelect, $where, $order);
        return $this->RunSelect($sql);
    }
    
    public function load(){
        $rs = $this->select(sprintf("and ID_Usuario='%s'",  $this->getUser_ID()));
        $this->setUser_ID($rs[0]['user_ID']);
        $this->setUser_ID($rs[0]['login']);
        $this->setUser_ID($rs[0]['senha']);
        $this->setUser_ID($rs[0]['dtInicio']);
        $this->setUser_ID($rs[0]['dtFim']);
        $this->setUser_ID($rs[0]['grupo']);
        return $this;
    }
    public function login($login,$senha){
        $sql = $this->select(sprintf("and DSC_Login='%s' and DSC_Senha=md5('%s')",$login,$senha));
        return $sql;
    }
}
