<?php

    require_once("conexao.php");
    $conexao = conexaoBD();
            
    session_start();

    if(isset($_POST['btnGravarEndereco'])){

        $logradouro = $_POST['txtEndereco'];




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
    <div id="sessaoEndereco">
        <div id="seguraFormEndereco">
            <form method="POST" name="frmEndereco" action="admEndereco.php">
                <div id="tituloFormEndereco">
                    <h3>Cadastro de Endereço - Lojas</h3>
                </div>
                <div class="itemFormCadEndereco">
                    <p>Logradouro: <input type="text" name="txtEndereco" style="margin-left:10px" class="txtFormUsuario"></p>
                </div>
                <div class="itemFormCadEndereco">
                    <p>Numero: <input type="text" name="txtEndereco" style="margin-left:35px" class="txtFormUsuario"> </p>
                </div>
                <div class="itemFormCadEndereco">
                    <p>Bairro: <input type="text" name="txtEndereco" style="margin-left:48px" class="txtFormUsuario"> </p>
                </div>
                <div class="itemFormCadEndereco">
                    <p>Cidade: <input type="text" name="txtEndereco" style="margin-left:37px" class="txtFormUsuario"> </p>
                </div>
                <div class="itemFormCadEndereco">
                    <p>UF <input type="text" name="txtEndereco" style="margin-left:79px" class="txtFormUsuario"></p>
                </div>
                <div class="itemFormCadEndereco">
                    <p>CEP: <input type="text" name="txtEndereco" style="margin-left:61px" class="txtFormUsuario">
                    </p>
                </div>
                <div class="itemFormCadEndereco">
                    <input type="submit" name="btnGravarEndereco" id="btnGravarEndereco">
                </div>
            </form>
        </div>
        <!-- LISTA QUE SERA CARREGADA******** -->
        <div id="listaAdmEndereco">
            <div class="itemListaEndereco" style="width:242px">
                Logradouro
            </div>
            <div class="itemListaEndereco">
                Numero
            </div>
            <div class="itemListaEndereco">
                Bairro
            </div>
            <div class="itemListaEndereco">
                Cidade
            </div>
            <div class="itemListaEndereco" style="width:100px">
                UF
            </div>
            <div class="itemListaEndereco">
                CEP
            </div>
            <div class="itemListaEndereco">
                Opções
            </div>
            <!-- ONDE OS DADOS SERÃO CARREGADOS -->
            <div class="carregarListaEndereco" style="width:242px">

            </div>
            <div class="carregarListaEndereco">

            </div>
            <div class="carregarListaEndereco">

            </div>
            <div class="carregarListaEndereco">

            </div>
            <div class="carregarListaEndereco" style="width:100px">

            </div>
            <div class="carregarListaEndereco">

            </div>
            <div class="carregarListaEndereco">
                <a href="#">
                    <img src="" alt="status">
                </a>
                <a href="#">
                    <img src="icons/edit.png.png" alt="editar">
                </a>
                <a href="#">
                    <img src="icons/delete.png" alt="excluir">
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