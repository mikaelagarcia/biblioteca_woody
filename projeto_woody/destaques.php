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
                        <li class="itemMenu"><a href="promocoes.php">PROMOCOES</a></li>
                        <li class="itemMenu"><a href="lojas.php">LOJAS</a></li>
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
        
        <!--**************************************DESTAQUES*************************************************************-->
        <div id="seguraDestaques">
            <div id="containerDestaques">
                <div id="tituloDestaques">
                    <h1>Livro em destaque</h1>     
                </div>  
                 <div id="imgDestaques">
                     <div id="destaqueImg">
                        <img src="imagens/pele.jpg" alt="livroEmDestaque">
                    </div>
                    <div id="descLivroDestaques">
                        <p>Autor: Lazaro Ramos</p>
                        <p>Idioma: Português - BR</p>
                        <p>País: Brasil</p>
                        <p>Editora: Objetiva </p>
                        <p>Lançamento: 2017</p>
                        <p>Páginas: 152</p>
                        <p>Isbn: 9788547000417</p>
                        <p>Peso: 0.250</p>
                    </div>
                      
                 </div> 
                 <div id="conteudoDestaques">
                    <div id="descricaoLivro">
                        <p>Movido pelo desejo de viver num mundo em que a pluralidade cultural, 
                            racial, étnica e social seja vista como um valor positivo, 
                            e não uma ameaça, Lázaro Ramos divide com o leitor suas reflexões 
                            sobre temas como ações afirmativas, gênero, família, empoderamento, 
                            afetividade e discriminação. Ainda que não seja uma biografia, 
                            em Na minha pele Lázaro compartilha episódios íntimos de sua vida e 
                            também suas dúvidas, descobertas e conquistas. </p>
                            <p>Ao rejeitar qualquer tipo de segregação ou radicalismos, 
                            Lázaro nos fala da importância do diálogo. Não se pode abraçar a diferença 
                            pela diferença, mas lutar pela sua aceitação num mundo ainda tão cheio de 
                            preconceitos. Um livro sincero e revelador, que propõe uma mudança de 
                            conduta e nos convoca a ser mais vigilantes e atentos ao outro.</p>
                    </div>
                    <div id="linkDescricao">
                        <div class="linkDescricaoLinha">
                            <h4>Sobre o autor:</h4>
                            <br>
                            <p>Luís Lázaro Ribeiro Ramos é um ator, apresentador, 
                                cineasta e escritor de literatura infantil brasileiro.</p>
                        </div>
                        <div class="linkDescricaoLinha">
                            <a href="promocoes.php"><h4>Confira outros títulos relacionados.</h4></a>
                            <br>    
                            <a href="autores.php"><h4>Confira também os autores em destaque!</h4></a>
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







