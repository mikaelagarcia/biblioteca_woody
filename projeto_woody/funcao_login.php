<?php
require_once("cms/conexao.php");



function login($login, $senha){

    $conexao = conexaoBD();
    $boolean = false;

    $sql = "SELECT login, senha, nome from tbl_usuario WHERE login='".$login."' AND status = 1";
    $select = mysqli_query($conexao, $sql);

    if($rsCoonsultaUsuario = mysqli_fetch_array($select)){
        $consultaLogin = $rsCoonsultaUsuario['login'];
        $consultaSenha = $rsCoonsultaUsuario['senha'];
        $nomeUsuario = $rsCoonsultaUsuario['nome'];


        if($login == $consultaLogin && $senha == $consultaSenha){
            session_start();
            $_SESSION['nomeUsuario'] = $nomeUsuario;
            $boolean = true;
        }else{
            $boolean = false;
        }
    }
    return $boolean;
}













?>