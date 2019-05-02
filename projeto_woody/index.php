<?php

require_once('funcao_login.php');
require_once("cms/conexao.php");
$conexao = conexaoBD();


session_start();

$mensagem = "";
//a variavel modo pesquisa sera usada em cada uma das buscas - aleatorio, categoria, subcategoria ou barra de busca
//sera feita como no modo - dentro do select vai receber o nome do modo que estara.
//havera um if 

$modoPesquisa = "aleatorio";

$modo = "";

$id_pesquisa = "";



if(isset($_POST['bntLogin'])){
   
    $login = $_POST['txtUsuario'];
    $senha = $_POST['txtSenha'];
    
   
    
    $boolean = login($login, $senha);
    echo($boolean);

    if($boolean == true){
        
        header('location:cms/index.php');
    }else{
        $mensagem = "Digite 'usuário' e 'senha' corretos!";
    
    }
}
// pegando o id da categoria via a href para fazer um select na tabela de livro correspondente a categoria
    if(isset($_GET['modo'])){

        // variavel modo recebendo o modo da url
        $modo = $_GET['modo'];
        // verificando qual modo é
        $id_pesquisa = $_GET['id_pesquisa'];
        // fazendo a verificação do modo
        //se for for categoria
        if($modo == "categoria"){
            $sqlCategoria = "SELECT tbl_livros.* FROM tbl_livros, tbl_subcategoria, tbl_subcategoria_livro, tbl_categoria
            WHERE tbl_categoria.id_categoria = tbl_subcategoria.id_categoria
            AND tbl_subcategoria.id_subcategoria = tbl_subcategoria_livro.id_subcategoria
            AND tbl_subcategoria_livro.id_livro = tbl_livros.id_livro 
            AND tbl_categoria.id_categoria =".$id_pesquisa;
            
            // para diferenciar o script - trazendo somente por categoria
            $modoPesquisa = 'categoria';
                                        
            

        //se for subcategoria
        }else if($modo == "subcategoria"){

            $sqlSubcategoria =  "SELECT tbl_livros.* FROM tbl_livros, tbl_subcategoria_livro, tbl_subcategoria, tbl_categoria
            WHERE tbl_categoria.id_categoria = tbl_subcategoria.id_categoria
            AND tbl_subcategoria.id_subcategoria = tbl_subcategoria_livro.id_subcategoria
            AND tbl_subcategoria_livro.id_livro = tbl_livros.id_livro
            AND tbl_subcategoria.id_subcategoria =".$id_pesquisa;     

            // para diferenciar o script - trazendo somente por subcategoria
            $modoPesquisa = 'subcategoria';

    
    }







}
// if isset da barra de busca
if(isset($_GET['btnbarra'])){



    $pesquisa = $_GET['txt_barraBusca'];

    // VAI TER UM SELECT TBL DE LIVROS NO MODO  - BUSCA COM A PROPRIEDADE LIKE

    $sql_barra_busca = "SELECT tbl_livros.* from tbl_livros, tbl_subcategoria_livro, tbl_subcategoria, tbl_categoria
    WHERE tbl_categoria.id_categoria = tbl_subcategoria.id_categoria 
    AND tbl_subcategoria.id_subcategoria = tbl_subcategoria_livro.id_subcategoria
    AND tbl_livros.id_livro = tbl_subcategoria_livro.id_livro
    AND tbl_livros.titulo_livro LIKE '%".$pesquisa."%'";

    $modoPesquisa = 'busca';

 
}


?> 

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>“Woody Woodpecker” S/A</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/jssor.slider-27.5.0.min.js" ></script>
        <style>
            /*jssor slider loading skin spin css*/
            .jssorl-009-spin img {
                animation-name: jssorl-009-spin;
                animation-duration: 1.6s;
                animation-iteration-count: infinite;
                animation-timing-function: linear;
            }

            @keyframes jssorl-009-spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }

            /*jssor slider bullet skin 051 css*/
            .jssorb051 .i {position:absolute;cursor:pointer;}
            .jssorb051 .i .b {fill:#fff;fill-opacity:0.5;}
            .jssorb051 .i:hover .b {fill-opacity:.7;}
            .jssorb051 .iav .b {fill-opacity: 1;}
            .jssorb051 .i.idn {opacity:.3;}

            /*jssor slider arrow skin 051 css*/
            .jssora051 {display:block;position:absolute;cursor:pointer;}
            .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
            .jssora051:hover {opacity:.8;}
            .jssora051.jssora051dn {opacity:.5;}
            .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
        </style>
        <script>
            jQuery(document).ready(function ($) {

            var jssor_1_SlideshowTransitions = [
              {$Duration:800,$Opacity:2}
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 1280;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
            });
        </script>
    </head>
    <body>
        
    <!--***********************************************CABEÇALHO ***********************************************-->
    <div id="conteudoPrincipal">
        <div id="descerSlider">
            <header>
                <div id="cabecalho"> 
                    <div id="seguraLogo">
                        <img id="logo" src="icons/logo.png" alt="logo">
                    </div>
        <!--**************************************MENU***********************************************************-->
                    <nav id="seguraMenu">
                        <ul>
                            <li class="itemMenu"><a href="promocoes.php">PROMOÇÕES</a></li>
                            <li class="itemMenu"><a href="lojas.php">LOJAS</a></li>
                            <li class="itemMenu"><a href="destaques.php">DESTAQUES</a></li>
                            <li class="itemMenu"><a href="autores.php">AUTORES</a></li>
                            <li class="itemMenu"><a href="sobre.php">SOBRE</a></li>
                            <li class="itemMenu"><a href="contato.php">CONTATO</a></li>
                        </ul>    
                    </nav>
                    
                    <div id="seguraFaleC">
                        <form method="POST" action="index.php">
                            <div id="usuario">
                                <label>
                                    Usuário: 
                                </label>
                                <br>
                                <input class="txtLogin" type="text" name="txtUsuario" id="txtUsuario" placeholder=" usuário">
                                <p><?php echo utf8_encode($mensagem)?></p>
                            </div>   
                                
                            
                            <div id="senha">
                                <label>Senha:<br></label>
                                <input class="txtLogin" type="text" name="txtSenha" id="txtSenha" placeholder=" senha">
                                <input type="submit" value="login" name="bntLogin" id="btnLogin">  
                              
                            </div>  
                        </form>            
                                        
                    </div>
                    
                </div> 
            </header>
        </div>
            
        <!--**************************************SLIDER*************************************************************-->
        <div id="holdContent">
            <div id="container">
                <div id="seguraSlider">
                
                    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
                        <!-- Loading Screen -->
                        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" alt="image20"/>
                        </div>
                        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
                            <div>
                                <img data-u="image" src="img/livraria.png" alt="image1"/>
                            </div>
                            <div>
                                <img data-u="image" src="img/woody7.png" alt="image2"/>
                            </div>
                            <div>
                                <img data-u="image" src="img/woody1.png" alt="image3"/>
                            </div>
                            <div>
                                <img data-u="image" src="img/woody2.png" alt="image4"/>
                            </div>
                            <div>
                                <img data-u="image" src="img/woody6.png" alt="image5"/>
                            </div>
                        
                        </div>
                        <!-- Bullet Navigator -->
                        <div data-u="navigator" class="jssorb051" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                                </svg>
                            </div>
                        </div>
                        <!-- Arrow Navigator -->
                        <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                            </svg>
                        </div>
                        <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- #endregion Jssor Slider End -->        
            
                <!--***********************************CONTEUDO - MENU***************************************-->
                
                <div id="seguraConteudo">
                    <nav id="menuVertical">
                        <?php 
                            //  
                            $sql = "SELECT * FROM tbl_categoria";
                            $select = mysqli_query($conexao, $sql);


                            while($rs_consulta_categoria = mysqli_fetch_array($select)){
                                
                                $id_categoria = $rs_consulta_categoria['id_categoria'];
                        ?>
                        <div class="menu_categoria">
                            <a href="index.php?modo=categoria&id_pesquisa=<?php echo utf8_encode($id_categoria)?>"><?php echo utf8_encode($rs_consulta_categoria['nome_categoria'])?></a>
                            <div class="caixa_subcategoria">
                                <?php
                                    // select para trazer dados da subcategoria
                                    $sql_subcategoria = "SELECT tbl_subcategoria.* 
                                    FROM tbl_categoria, tbl_subcategoria 
                                    WHERE tbl_subcategoria.id_categoria = tbl_categoria.id_categoria
                                    AND tbl_subcategoria.id_categoria = ".$id_categoria;

                                    $select_subcategoria = mysqli_query($conexao, $sql_subcategoria);
                                
                                    while($rs_consulta_subcategoria = mysqli_fetch_array($select_subcategoria)){
                                    
                                        $id_subcategoria = $rs_consulta_subcategoria['id_subcategoria'];
                                ?>
                                <div class="item_subcategoria">
                                    <a href="index.php?modo=subcategoria&id_pesquisa=<?php echo utf8_encode($id_subcategoria)?>"><?php echo utf8_encode($rs_consulta_subcategoria['nome_subcategoria'])?></a>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </nav>
                    
                    <div id="conteudo">
                        <div id="conteudo_barra">

                            <form method="GET" action="index.php" name="frmbarrabusca">
                                <div id="barra_busca">
                                    <input type="text" name="txt_barraBusca" placeholder="Buscar">
                                    <input type="submit" name="btnbarra" value="ok">
                                </div>
                            </form>
                        </div>






                        <?php
                            // SELECT QUE ESTA CARREGANDO O CATALAGO
                            $sql = "SELECT * FROM tbl_livros ORDER BY RAND()";
                            
                        //    QUANDO CLICADO EM CATEGORIA (A VARIAVEL SQL VAI RECEBER O SELECT LA NO TOPO DE CATEGORIA)
                            if($modoPesquisa == 'categoria'){
                               
                                $sql = $sqlCategoria;

                            }else if($modoPesquisa == 'subcategoria'){

                                $sql = $sqlSubcategoria;
                                                               

                            }else if($modoPesquisa == 'busca'){

                                $sql = $sql_barra_busca;
                            }
                            
                            $select = mysqli_query($conexao,$sql);

                            while($rs_livro = mysqli_fetch_array($select)){
                        ?>
                           
                        <div class="catalago">
                            <div class="seguraimgCatalago">
                                <img class="imgCatalago" src="cms/<?php echo utf8_encode($rs_livro['img_livro'])?>" alt="produto">
                            </div>
                            <div class="descCatalago">
                                <p><strong></strong></p>
                                <p>Titulo: <?php echo utf8_encode($rs_livro['titulo_livro'])?></p>
                                <p>Preco: <?php echo utf8_encode($rs_livro['preco'])?></p>
                                <br>
                                <input class="btnDetalhes" type="button" name="btnComprar" value="DETALHES">
                            </div>
                        </div>

                        <?php
                            }
                        ?>
                    </div>

                </div>
            </div> 
            <div id="redesSociais">
                <div id="conteudoRedesSociais">
                    <div class="imgRedeSocial">
                        <img src="icons/insta.png" alt="insta">
                    </div>   
                    <div class="imgRedeSocial">
                        <img src="icons/twitter.png" alt="twitter">
                    </div> 
                    <div class="imgRedeSocial">
                        <img src="icons/youtube.png" alt="youtube">
                    </div> 
                </div>    

            </div>     
        </div>
            <!--***********************************FOOTER***************************************-->
        <footer>
            <div id="rodapeFooter">
                    
                <div id="contatoFooter">
                    <div id="iconFooter">
                        <img src="icons/fone.png" alt="telefone">
                    </div>
                    <div id="infoFooter">
                        <p>Contato Livraria "Woodpecker” - Sede</p>
                        <p>São Paulo/Berrini +55 11 3333-4444</p> 
                        
                    </div>
                </div>
                <div id="conteudoFooter">
                    <div class="containerFooter">
                        <h5>PRINCIPAIS ENDEREÇOS</h5>
                        <p>São Paulo - Av Luiz Carlos Berrini - 666</p>
                        <p>Ribeirão Preto - Shooping Ribeirão - Ala Sul</p>
                        <p>Campinas - Av. Brasil - 1500</p>
                        

                    </div>
                    <div class="containerFooter">
                        <h5>ATENDIMENTO AO CLIENTE</h5>
                        
                        <a href="contato.php" ><span class="format">Entre em Contato</span></a>
                        <br>
                        <a href="#"><span class="format">Politica de Entrega</span></a>
                        <br>
                        <a href="#"><span class="format">Devoluções</span></a>
                        
                    </div>
                    <div id="formadePagamento">
                        <h5>FORMA DE PAGAMENTO</h5>
                        
                        <p>Cartões de Credito</p>
                        <img class="iconePag" src="icons/visa.png" alt="visa">
                        <img class="iconePag" src="icons/master.png" alt="master">
                        <img class="iconePag" src="icons/diners.png" alt="diners">
                        <img class="iconePag" src="icons/maestro.png" alt="maestro">
                        <img class="iconePag" src="icons/american.png" alt="american">
                        <img class="iconePag" src="icons/cirrus.png" alt="cirrus">
                        <p>Outras Formas</p>
                        <img class="iconePag" src="icons/cash.png" alt="cash">
                        <img class="iconePag" src="icons/paypal.png" alt="paypal">
                        <img class="iconePag" src="icons/gift.png" alt="gift">
                    </div>

                </div>
                <div id="copirightFooter">
                    <div id="copiright">
                        <p>2018, Woody Woodpecker Copiright</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>    
    </body>
   
</html>







