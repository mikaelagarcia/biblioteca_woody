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
    <div id="sessaoCadHorario">
        <div id="seguraFormCadHorario">
            <form method="POST" action="admHorario.php">
                <div id="tituloFormHorario">
                    <h2>Cadastro Horário</h2>
                </div>
                <div class="itemFormCadHorario">
                    <p>Dia da Semana: 
                        <select name="slcCadHorario">
                            <option>Domingo a domingo</option>
                            <option>Segunda a Sexta-feira</option>
                            <option>Finais de semana e Feriados</option>
                        </select></p>
                </div>
                <div class="itemFormCadHorario">
                    <p>Horário: <input type="text" name="txtHorario" class="txtFormUsuario" style="margin-left:61px" ></p>
                </div>
                <div class="itemFormCadHorario">
                    <input type="submit" value="" name="btnGravarHorario" id="btnGravarHorario">
                </div>
            </form>
        </div>
        <!-- **********************LISTA SERA CARREGADA*************** -->
        <div id="listaCadHorario">
            <div class=itemListaCadHorario>
                Dia da Semana
            </div>      
            <div class=itemListaCadHorario>
                Horário
            </div>   
            <div class=itemListaCadHorario>
                Opções
            </div>   
            <!-- ****************************ONDE LISTA SERA CARREGADA*************** -->
            <div class="carregarListaCadHorario">

            </div>
            <div class="carregarListaCadHorario">

            </div>
            <div class="carregarListaCadHorario">
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