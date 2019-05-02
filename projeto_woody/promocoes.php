<?php

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
        <div id="descerSlider">
        <header>
            <div id="cabecalho"> 
                <div id="seguraLogo">
                    <img id="logo" src="icons/logo.png" alt="logo">
                </div>
                  <!--**************************************MENU***********************************************************-->
                <nav id="seguraMenu">
                    <ul>
                        <li class="itemMenu"><a href="index.php">HOME</a></li>
                        <li class="itemMenu"><a href="lojas.php">LOJAS</a></li>
                        <li class="itemMenu"><a href="destaques.php">DESTAQUES</a></li>
                        <li class="itemMenu"><a href="autores.php">AUTORES</a></li>
                        <li class="itemMenu"><a href="sobre.php">SOBRE</a></li>
                        <li class="itemMenu"><a href="contato.php">CONTATO</a></li>
                    </ul>    
                </nav>
                <!--**************************************LOGIN CABEÇALHO***********************************************************-->
                <div id="seguraFaleC">
                   <form method="post" action="index.php">
                       <div id="usuario">
                           <label>
                                Usuário: 
                           </label>
                           <br>
                           <input class="txtLogin" type="text" name="txtUsuario" id="txtUsuario" placeholder=" usuário">
                        </div>   
                          
                        
                      <div id="senha">
                          <label>Senha:<br></label>
                          <input class="txtLogin" type="text" name="txtSenha" id="txtSenha" placeholder=" senha">
                          <input type="submit" value="LOGIN" name="bntLogin" id="btnLogin">  
                        </div>  
                    </form>            
                                    
                </div>
            </div> 
        </header>
        </div>
        
        <!--************************************** MENU E WALLPAPER*************************************************************-->
        <div id="seguraWallpaper">
            <nav id="menuVerticalWall">
                <div class="itemMenuVerticalWall">
                    Tecnologia
                </div>
                <div class="itemMenuVerticalWall">
                    Terror
                </div>
                <div class="itemMenuVerticalWall">
                    Romance
                </div>
                <div class="itemMenuVerticalWall">
                    Didático
                </div>
                <div class="itemMenuVerticalWall">
                    HQ
                </div>
                <div class="itemMenuVerticalWall">
                    Aventura
                </div>
            </nav> 
            <div id="wallpaper">
            <!-- SLIDER -  Loading Screen -->
            <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
               
                <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                    <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" alt="image20"/>
                </div>
                <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
                    <div>
                        <img data-u="image" src="img/woody2.png" alt="image1"/>
                    </div>
                    <div>
                        <img data-u="image" src="img/woody6.png" alt="image2"/>
                    </div>
                    <div>
                        <img data-u="image" src="img/woody7.png" alt="image3"/>
                    </div>
                    <div>
                        <img data-u="image" src="img/woody3.png" alt="image4"/>
                    </div>
                    <div>
                        <img data-u="image" src="img/woody4.png" alt="image5"/>
                    </div>
                    
                    </div>
                </div>
                <!-- Bullet Navigator -->
                <div data-u="navigator" class="jssorb051" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                    <div data-u="prototype" class="i" style="width:16px;height:16px;">
                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            
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
                <!-- #endregion Jssor Slider End --> 
            </div>
        
        
        <!--***********************************CONTEUDO**********************************************-->
         
        <div id="seguraConteudo">
            <div id="conteudoPromocoes">
                <div class="catalagoPromocao">
                    <div class="seguraimgCatalago">
                        <img class="imgCatalago" src="imagens/quem.jpg" alt="produto">
                    </div>
                    <div class="descCatalagoPromocao">
                        <p><strong>Quem tem medo do feminismo negro?</strong></p>
                        <p>Djamila Ribeiro</p>
                        <p><s>R$ 65,00</s></p>
                        <p>R$ 50,00</p>
                        <input class="btnDetalhes" type="button" name="btnComprar" value="DETALHES">
                    </div>
                </div>
                <div class="catalagoPromocao">
                    <div class="seguraimgCatalago">
                        <img class="imgCatalago" src="imagens/oque.jpg" alt="produto">
                    </div>
                    <div class="descCatalagoPromocao">
                        <p><strong>O que é lugar de fala?</strong></p>
                        <p>Djamila Ribeiro</p>
                        <p><s>R$ 65,00</s></p>
                        <p>R$ 50,00</p>
                        <input class="btnDetalhes" type="button" name="btnComprar" value="DETALHES">
                    </div>
                </div>
                <div class="catalagoPromocao">
                    <div class="seguraimgCatalago">
                        <img class="imgCatalago" src="imagens/prisioneiras.jpg" alt="produto">
                    </div>
                    <div class="descCatalagoPromocao">
                        <p><strong>Prisioneiras</strong></p>
                        <p>Drauzio Varella</p>
                        <p><s>R$ 65,00</s></p>
                        <p>R$ 50,00</p>
                        <input class="btnDetalhes" type="button" name="btnComprar" value="DETALHES">
                    </div>
                </div>
                <div class="catalagoPromocao">
                    <div class="seguraimgCatalago">
                        <img class="imgCatalago" src="imagens/mulheres.jpg" alt="produto">
                    </div>
                    <div class="descCatalagoPromocao">
                        <p><strong>Mulheres, Raça e Classe</strong></p>
                        <p>Angela Davis</p>
                        <p><s>R$ 65,00</s></p>
                        <p>R$ 50,00</p>
                        <input class="btnDetalhes" type="button" name="btnComprar" value="DETALHES">
                       
                    </div>
                </div>
                <div class="catalagoPromocao">
                    <div class="seguraimgCatalago">
                        <img class="imgCatalago" src="imagens/correr.jpg" alt="produto">
                    </div>
                    <div class="descCatalagoPromocao">
                        <p><strong>Correr</strong></p>
                        <p>Drauzio Varella</p>
                        <p><s>R$ 65,00</s></p>
                        <p>R$ 50,00</p>
                        <input class="btnDetalhes" type="button" name="btnComprar" value="DETALHES">
                    </div>
                </div>
                <div class="catalagoPromocao">
                    <div class="seguraimgCatalago">
                        <img class="imgCatalago" src="imagens/marxista.jpg" alt="produto">
                    </div>
                    <div class="descCatalagoPromocao">
                        <p><strong>O orangotando Marxista</strong></p>
                        <p>Marcelo Rubens Paiva</p>
                        <p><s>R$ 65,00</s></p>
                        <p>R$ 50,00</p>
                        <input class="btnDetalhes" type="button" name="btnComprar" value="DETALHES">
                        
                    </div>
                </div>    
                <div class="catalagoPromocao">
                    <div class="seguraimgCatalago">
                        <img class="imgCatalago" src="imagens/ua.jpg" alt="produto">
                    </div>
                    <div class="descCatalagoPromocao">
                        <p><strong>Ua: brari</strong></p>
                        <p>Marcelo Rubens Paiva</p>
                        <p><s>R$ 65,00</s></p>
                        <p>R$ 50,00</p>
                            <input class="btnDetalhes" type="button" name="btnComprar" value="DETALHES">
                            
                    </div>
                </div>    
                <div class="catalagoPromocao">
                    <div class="seguraimgCatalago">
                        <img class="imgCatalago" src="imagens/por.jpg" alt="produto">
                    </div>
                    <div class="descCatalagoPromocao">
                        <p><strong>Por um fio</strong></p>
                        <p>Drauzio Varella</p>
                        <p><s>R$ 65,00</s></p>
                        <p>R$ 50,00</p>
                            <input class="btnDetalhes" type="button" name="btnComprar" value="DETALHES">
                    </div>
                    </div>    
            </div>
        </div>

<!--***********************************FOOTER**********************************************-->        
        <footer>
            <div id="rodapePromocoes">
                            
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
                        
                        <a href="#" ><span class="format">Entre em Contato</span></a>
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
            
    </body>

</html>







