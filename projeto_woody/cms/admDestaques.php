<?php

require_once('conexao.php');
$conexao = conexaoBD();

session_start();

if(isset($_POST['btnGravarLivro'])){

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>CMS Woody</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>

<header>
    <?php
        require_once("header.php");
    
    ?>
</header> 

<body>

    <div id="sessaoAdmLivroDestaque">
       
        <!-- LISTA QUE SERA CARREGADA -->
        <div id="listaAdmLivroDestaque">
            <div class="itemlistaDestaque">
                <h3>Nome do livro</h3>
            </div>
            <div class="itemlistaDestaque">
                <h3>Opções</h3>
            </div>

            <!-- LISTA SERA CARREGADA A PARTIR DAQUI -->
           
            <div class="carregarlistaDestaque">

            </div>
            <div class="carregarlistaDestaque">
                <a href="#">
                    <img src="" alt="status">
                </a>
            </div>


        </div>
       
    </div>
</body>

<footer>
    <?php 
        require_once("footer.php");
    
    ?>
</footer>    
    

</html>