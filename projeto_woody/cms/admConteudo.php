<?php

session_start();

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
    <!-- ************************* ADM CONTEUDO ********************** -->        
    <div id="sessaoAdmConteudo">

        <div class="itemOpcaoConteudo">
            <img src="icons/adm.png" alt="lojas">
            <a href="admLojas.php">
                <input type="button" value="Adm Lojas" class="btnAdmConteudo"> 
            </a>
        </div>
        <div class="itemOpcaoConteudo">
            <img src="icons/adm.png" alt="destaques">
            <a href="admDestaques.php">
                <input type="button" value="Adm Destaque" class="btnAdmConteudo"> 
            </a>
        </div>
        <div class="itemOpcaoConteudo">
            <img src="icons/adm.png" alt="autor">
            <a href="admAutores.php">
                <input type="button" value="Adm Autor" class="btnAdmConteudo"> 
        </div>
        <div class="itemOpcaoConteudo">
            <img src="icons/adm.png" alt="sobre">
            <a href="admSobre.php">
                <input type="button" value="Adm Sobre" class="btnAdmConteudo"> 
            </a>
        </div>
        <div class="itemOpcaoConteudo">
            <img src="icons/adm.png" alt="promoção">
            <a href="admPromocao.php">
                <input type="button" value="Adm Promoção" class="btnAdmConteudo"> 
            </a>
        </div>
        <div class="itemOpcaoConteudo">
            <img src="icons/adm.png" alt="home">
            <a href="admHome.php">
                <input type="button" value="Adm Home" class="btnAdmConteudo"> 
            </a>
        </div>
        <div class="itemOpcaoConteudo">
            <img src="icons/adm.png" alt="imagens">
            <a href="admImagens.php">
                <input type="button" value="Adm Imagens" class="btnAdmConteudo"> 
            </a>
        </div>
        <div class="itemOpcaoConteudo">
            <img src="icons/adm.png" alt="imagens">
            <a href="admEndereco.php">
                <input type="button" value="Adm Endereço" class="btnAdmConteudo"> 
            </a>
        </div>
        <div class="itemOpcaoConteudo">
            <img src="icons/adm.png" alt="imagens">
            <a href="admHorario.php">
                <input type="button" value="Adm Horário" class="btnAdmConteudo"> 
            </a>
        </div>
        
        <div class="itemOpcaoConteudo">
            <img src="icons/adm.png" alt="imagens">
            <a href="cadastrarPromocao.php">
                <input type="button" value="Cadastrar Promocao" class="btnAdmConteudo"> 
            </a>
        </div>
               
    </div>
    

</body>
              
<!-- ***********************************FOOTER********************************* -->
<footer>
    <?php 
        require_once("footer.php");
    
    ?>
</footer>    
    

</html>