<?php

require_once("cms/conexao.php");
$conexao = conexaoBD();

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
                        <li class="itemMenu"><a href="lojas.php">LOJAS</a></li>
                        <li class="itemMenu"><a href="destaques.php">DESTAQUES</a></li>
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
        
        <!--************************* CONTEUDO AUTORES ************************************************************-->
        <div id="conteudoAutores">
            <div id="containerAutores">
                <div id="tituloAutores">
                    <h2>Autores em Destaque</h2>
                </div>
                <div class="listaAutores">
                    <?php

                        $sql = "SELECT * FROM tbl_autores WHERE status_autor=1 limit 3";
                        $select = mysqli_query($conexao,$sql);

                        while($rsConsulta = mysqli_fetch_array($select)){
                  
                    ?>
                    
                    <div class="autores">
                        <div class="imgAutores">
                            <img src="cms/<?php echo($rsConsulta['img_autor'])?>" alt="autor">
                        </div>
                        <div class="descricaoAutores">
                            <h2><?php echo($rsConsulta['nome_autor'])?></h2>
                            <p>
                                <?php echo($rsConsulta['descricao_autor'])?>
                            </p>
                            
                        </div>    
                    </div>
                    

                    <?php
                    
                        }
                    ?>


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







