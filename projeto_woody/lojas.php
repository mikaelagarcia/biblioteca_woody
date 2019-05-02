<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>“Woody Woodpecker” S/A</title>
        <link rel="stylesheet" href="css/style.css">
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
                        <li class="itemMenu"><a href="promocoes.php">PROMOÇÕES</a></li>
                        <li class="itemMenu"><a href="destaques.php">DESTAQUES</a></li>
                        <li class="itemMenu"><a href="autores.php">AUTORES</a></li>
                        <li class="itemMenu"><a href="sobre.php">SOBRE</a></li>
                        <li class="itemMenu"><a href="contato.php">CONTATO</a></li>
                    </ul>    
                </nav>
                
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
        
        <!--**************************************CONTEUDO LOJAS*************************************************************-->
       
        <div id="conteudoLojas">
            <div id="containerStore">
                <div id="tituloLoja">
                    <h2>Encontre a loja mais perto de você!</h2>
                </div> 
                <div id="lojas">
                    <div class="catalagoLojas">
                        <div class="imgLojas">
                            <img class="lojaImg" src="imagens/loja2.jpg" alt="lojaSp">
                        </div>
                        <div class="infoLojas">
                            <div class="col1Lojas">
                                <p>Horário de funcionamento</p>
                                <p>Segunda a Sábado - Das 9h às 22h</p>
                                <p>Domingos - Das 11h às 20h</p> 
                                <p>Feriados - Das 11h às 20</p>
                            </div>
                            <div class="col2Lojas">
                                <p>São Paulo - Av Luiz Carlos Berrini - 666</p>
                                <p>Itam Paulista - 01025-222</p>
                                <p>São Paulo - SP</p>
                                <p> Telefone: 3366-5544</p>
                                <p>E-mail: sploja@woody.com.br</p>
                                <input class="btnLocalizacao" type="button" name="btnLocalizacao" value="VER LOCALIZAÇÃO">
                            </div>
                        </div>
                    </div>
                    <div class="catalagoLojas">
                        <div class="imgLojas">
                            <img class="lojaImg" src="imagens/loja1.jpg" alt="lojaRio">
                        </div>
                        <div class="infoLojas">
                            <div class="col1Lojas">
                                <p>Horário de funcionamento</p>
                                <p>Segunda a Sábado - Das 9h às 22h</p>
                                <p>Domingos - Das 11h às 20h</p> 
                                <p>Feriados - Das 11h às 20</p>
                            </div>
                            <div class="col2Lojas">
                            <p>Rio de Janeiro - Barra Shooping</p>
                            <p>Ala Sul - Segundo Piso</p>
                            <p>Telefones: (21) 4556-8945 / (21) 4587-8547</p>
                            <p>E-mail: rjloja@woody.com.br</p>
                                <input class="btnLocalizacao" type="button" name="btnLocalizacao" value="VER LOCALIZAÇÃO">
                            </div>
    
                        </div>
                        
                    </div>
                    <div class="catalagoLojas">
                        <div class="imgLojas">
                            <img class="lojaImg" src="imagens/loja3.jpg" alt="loja3">
                        </div>
                        <div class="infoLojas">
                            <div class="col1Lojas">
                                <p>Horário de funcionamento</p>
                                <p>Segunda a Sábado - Das 9h às 22h</p>
                                <p>Domingos - Das 11h às 20h</p> 
                                <p>Feriados - Das 11h às 20</p>
                            </div>
                            <div class="col2Lojas">
                                <p>Ribeirão Preto - Shooping Ribeirão </p>
                                <p>Ala Sul - Térreo</p>
                                <p>Ribeirão Preto - SP</p>
                                <p>Telefones: (16) 3578-8925</p>
                                <p>E-mail: rbloja@woody.com.br</p>
                                <input class="btnLocalizacao" type="button" name="btnLocalizacao" value="VER LOCALIZAÇÃO">
                            </div>
    
                        </div>
                        
                    </div>
                    <div class="catalagoLojas">
                        <div class="imgLojas">
                            <img class="lojaImg" src="imagens/loja4.jpg" alt="loja4">
                        </div>
                        <div class="infoLojas">
                            <div class="col1Lojas">
                                <p>Horário de funcionamento</p>
                                <p>Segunda a Sábado - Das 9h às 22h</p>
                                <p>Domingos - Das 11h às 20h</p> 
                                <p>Feriados - Das 11h às 20</p>
                            </div>
                            <div class="col2Lojas">
                                    <p>Sorocaba - Av do Estado - 2018</p>
                                    <p>Jd. Brasil - 45787-854</p>
                                    <p>Telefones: (15) 3357-7858</p>
                                    <p>E-mail: srcbloja@woody.com.br</p>
                                
                                <input class="btnLocalizacao" type="button" name="btnLocalizacao" value="VER LOCALIZAÇÃO">
                            </div>
    
                        </div>
                        
                    </div>
                    <div class="catalagoLojas">
                        <div class="imgLojas">
                            <img class="lojaImg" src="imagens/loja5.jpg" alt="loja5">
                        </div>
                        <div class="infoLojas">
                            <div class="col1Lojas">
                                <p>Horário de funcionamento</p>
                                <p>Segunda a Sábado - Das 9h às 22h</p>
                                <p>Domingos - Das 11h às 20h</p> 
                                <p>Feriados - Das 11h às 20</p>
                            </div>
                            <div class="col2Lojas">
                                <p>Campinas - Av. Brasil - 1500</p>    
                                <p>Centro - 01548-257</p>    
                                <p>Telefones: (15) 3459-7815</p>    
                                <p>camploja@woody.com.br</p>    
                                
                                <input class="btnLocalizacao" type="button" name="btnLocalizacao" value="VER LOCALIZAÇÃO">
                            </div>
    
                        </div>
                        
                    </div>


                </div>
            </div>    
        </div>
        <!--***********************************FOOTER***************************************-->
        <footer>
            <div id="rodape">
                  
                <div id="contatoFooter">
                    <div id="iconFooter">
                        <img src="icons/fone.png" alt="telefone">
                    </div>
                    <div id="infoFooter">
                        <p>Contato Livraria "Woodpecker” - Sede</p>
                        <span class="format">São Paulo/Berrini +55 11 3333-4444 
                        </span>
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







