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
    <div id="sessaoAdmImagem">
        <div class="seguraFormAdmImagem">
            <form method="POST" action="admImagens.php" enctype="multipart/form-data">
                <div id="formTituloImg">
                    <h2>Cadastro de Imagem</h2>
                </div>
                <div class="itemFormCadImg">
                    <p>Nome da foto: <input type="text" name="txtNomeImg" class="txtFormUsuario" value="">  </p>
                </div>
                <div class="itemFormCadImg">
                    <p>Foto: <input type="file" name="filefoto"></p>
                </div>
                <div class="itemFormCadImg">
                    <input type="submit" name="btnSalvar" value="" id="btnGravarImg">
                </div>
                <div>
                    <input type="text" name="txtCrptoFoto" style="display: none;" value="">
                </div>    
            </form>

        </div>
        <div id="carregarImg">

        </div>
        <!-- Lista - Informações vindas do Banco -->
    </div>

    <div id="sessaoLista">

        <div id="listaImg">
            <div class="itemListaImg">
                <h3>Nome</h3>
            </div>
            <div class="itemListaImg">
                <h3>Opções</h3>
            </div>
            <div class="carregarListaImg">

            </div>
            <div class="carregarListaImg">
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