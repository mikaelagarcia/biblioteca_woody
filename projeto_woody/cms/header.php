<?php

if(isset($_GET['logout'])){
    session_destroy();
    header('location:../index.php');
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CMS Woody</title>
    <link rel="stylesheet" href="css/style.css"/>
    <script>
    </script>
</head>
<body>
       
    <!-- **********CABECALHO********  -->
    <div id="containerCms">
        <div id="cabecalho">
            <div id="logoCabecalho">
                <a href="index.php">
                    <img src="icons/logo.png" alt="logoCabecalhoCms">   
                </a>    
            </div>
            <div id="tituloCabecalho">
                <h1>CMS - SISTEMA DE GERENCIAMENTO DO SITE</h1>
            </div>
           
        </div>
    <!-- ************MENU DE ICONES************* -->
        <div id="menu">
            <div class="itemMenu">
                <div class="imgItemMenu">
                    <a href="index.php">
                        <img src="icons/home.png"  alt="iconConteudo">
                    </a>
                </div>  
                
                <div class="textItemMenu">
                    <h3>Home</h3>
                </div>  
            </div>

            <div class="itemMenu">   

                <div class="imgItemMenu">
                    <a href="admConteudo.php">
                        <img src="icons/conteudo.png"  alt="iconConteudo">
                    </a>
                </div>

                <div class="textItemMenu">
                    <h3>Adm. Conteúdo</h2>
                </div>  
            </div>

            <div class="itemMenu">
                <div class="imgItemMenu">
                    <a href="admFaleConosco.php">
                        <img src="icons/fale.png"  alt="iconFale">
                    </a>
                    
                </div>

                <div class="textItemMenu">
                    <h3>Adm. Fale Conosco</h3>
                </div>
            </div>

            <div class="itemMenu">
                <div class="imgItemMenu">
                    <a href="admProdutos.php">
                        <img src="icons/produtos.png"  alt="iconProdutos" >
                    </a>
                    
                </div>

                <div class="textItemMenu">
                    <h3>Adm. Produtos</h3>
                </div>
            </div>

            <div class="itemMenu">
                <div class="imgItemMenu">
                    <a href="admUsuarios.php">
                        <img src="icons/usuario.png"  alt="iconUsuario" >
                    </a>
                    
                </div>
                <div class="textItemMenu">
                    <h3>Adm. Usuários</h3>
                </div>
            </div>
    <!-- *****************AREA DE LOGIN**************** -->
            <div id="areaLogin">
                <div id="areaUsuario">
                   <span id="login">Ola, <?php echo($_SESSION['nomeUsuario'])?></span>
                </div>
                
                <div id="logout">
                <a href="header.php?logout=false"> 
                    <input type="button" name="btnLogout" value="LOGOUT" id="btnLogout">
                </a>
                                    
                </div>
            </div>
        </div>
           
    </div>
    
</body>

</html>