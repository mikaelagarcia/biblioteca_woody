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
    <!-- *************************ADM USUARIO - NIVEL********************** -->        
    <div id="admUsuarios">
            <div class="itemOpcao">
                <img src="icons/addUser.png" alt="cadastroUsuario">
                <br>
                <a href="cadastroUsuario.php"> 
                    <input type="button" value="CADASTRAR USUARIO" class="btnCad">
                </a>    
            </div>  

            <div class="itemOpcao">
                <img src="icons/level.png" alt="cadastroUsuario">
                <br>
                <a href="cadastroNivel.php"> 
                    <input type="button" value="CADASTRAR NIVEL" class="btnCad">
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