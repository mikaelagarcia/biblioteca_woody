<?php

function conexaoBD(){

    $host = 'localhost';
    $password = 'Senai@127131';
    $user = 'root';
    $database = 'bd_woody';

    if(!$conexao = mysqli_connect($host,$user,$password,$database))
        echo("Erro na conexão");
    return $conexao;

}

?>