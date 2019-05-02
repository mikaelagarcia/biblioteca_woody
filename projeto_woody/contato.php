<?php
    require_once('cms/conexao.php');
    $conexao = conexaoBD();

    if(isset($_POST['btnEnviar'])){
        $nome = $_POST['txtNome'];
        $email = $_POST['txtEmail'];
        $telefone = $_POST['txtTelefone'];
        $celular = $_POST['txtCelular'];
        $sexo = $_POST['cbSexo'];
        $profissao = $_POST['txtProfissao'];
        $homepag = $_POST['txtHomepage'];
        $url = $_POST['txtUrl'];
        $sugestao = $_POST['sugestao'];
        $informacao = $_POST['informacao'];

        //as informações precisam estar iguais ao do banco no VALUES
        
        $sql = "INSERT INTO tbl_faleconosco
        (nome_fc,email_fc,telefone_fc,celular_fc, homepage_fc,
		url_fc,sugestao_fc,infoproduto_fc,sexo_fc,profissao_fc) VALUES ('".$nome."', 
        '".$email."','".$telefone."','".$celular."','".$homepag."','".$url."','".$sugestao."',
        '".$informacao."','".$sexo."','".$profissao."');";
                                                                    
        //executa o script no banco                                                            
        mysqli_query($conexao,$sql);
        //echo($sql);
        header('location:contato.php');                                                         
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Contato - “Woody Woodpecker” S/A</title>
        <link rel="stylesheet" href="css/style.css">
        
    </head>
    <body>
        <!--***************************************************CABEÇALHO*************************-->
        <div id="descerSlider">
        <header>
            <div id="cabecalho"> 
                <div id="seguraLogo">
                    <img id="logo" src="icons/logo.png" alt="logo">
                </div>
                  <!--***************************************************MENU***************************************-->
                <nav id="seguraMenu">
                    <ul>
                        <li class="itemMenu"><a href="index.php">HOME</a></li>
                        <li class="itemMenu"><a href="promocoes.php">PROMOÇÕES</a></li>
                        <li class="itemMenu"><a href="lojas.php">LOJAS</a></li>
                        <li class="itemMenu"><a href="destaques.php">DESTAQUES</a></li>
                        <li class="itemMenu"><a href="autores.php">AUTORES</a></li>
                        <li class="itemMenu"><a href="sobre.php">SOBRE</a></li>
                    </ul>    
                </nav>
                
                <div id="seguraFaleC">
                   <form method="post" action="index.php">
                       <div id="usuario">
                           <label>
                                Usuário: 
                           </label>
                           <br>
                           <input type="text" name="txtUsuario" id="txtUsuario" placeholder=" Usuário">
                        </div>   
                          
                        
                      <div id="senha">
                          <label>Senha:<br></label>
                          <input  type="text" name="txtSenha" id="txtSenha" placeholder=" Senha">
                          <input type="submit" value="LOGIN" name="bntLogin" id="btnLogin">  
                        </div>  
                    </form>            
                                    
                </div>
            </div> 
        </header>
        </div>
        <!--*************************************************** FORM***********************************************************-->
       
        <div id="sessaoForm">
            <div id="infoFaleConosco">  
                <p>Este é o canal direto de comunicação com a Woody Woodpecker.</p>
                <p>Escolha o assunto e envia sua mensagem para nós.</p>  
                <!-- *Os campos com asterisco são de preenchimento obrigatório -->
            </div>
            <div id="seguraForm"> 
                <div id="formFaleConosco">
                    <form method="POST" action="contato.php">
                        <div id="formTitulo">
                            <p>Fale Conosco</p>
                        </div>  
                        <div class="form">
                            Nome:*
                        </div>  
                        <div class="form">
                            E-mail:*
                        </div> 
                        <div class="form">
                            <input class="txtSize" type="text" name="txtNome" placeholder=" Nome" required>
                        </div> 
                        <div class="form">
                            <input class="txtSize" type="text" name="txtEmail" placeholder=" e-mail" required>
                        </div> 
                        <div class="form">
                            Telefone:
                        </div> 
                        <div class="form">
                            Celular*
                        </div> 
                        <div class="form">
                            <input class="txtSize" type="text" name="txtTelefone" placeholder="Ex: 1111-1111" maxlength="11">
                        </div> 
                        <div class="form">
                            <input class="txtSize" type="text" name="txtCelular" placeholder="Ex: 00 99999-8888" required maxlength="13">    
                        </div> 
                        <div class="form">
                            Sexo:*
                        </div>     
                        <div class="form">
                            Profissão:*
                        </div>
                        <div class="form">
                            <select name="cbSexo" id="cbSexo">
                                <option value="H">Homem</option>
                                <option value="M">Mulher</option>
                            </select>
                        </div>
                        <div class="form">
                            <input class="txtSize" type="text" name="txtProfissao" placeholder=" profissão" required >
                        </div>
                        <div class="form">
                            Home Page
                        </div>
                        <div class="form">
                            Url Facebook
                        </div>
                        <div class="form">
                            <input class="txtSize" type="text" name="txtHomepage" placeholder=" Homepage" >
                        </div>
                        <div class="form">
                            <input class="txtSize" type="text" name="txtUrl" placeholder=" url-Facebook" >
                        </div>
                        <div class="form">
                            Sugestões/Críticas
                        </div>
                        <div class="form">
                            Informações sobre Produtos
                        </div>
                        <div class="formTextArea">
                            <textarea class="textArea" name="sugestao" maxlength="500"></textarea>
                        </div>
                        <div class="formTextArea">
                            <textarea class="textArea" name="informacao" maxlength="500"></textarea>
                        </div>
                        
                        <input class="submit" type="submit" name="btnEnviar" value="ENVIAR" onkeypress="">
                        <input class="submit" type="button" name="btnLimpar" value="LIMPAR" onkeypress="">    
                     
                    </form>
                </div>    
            </div> 
        </div>
        <!--*************************************************** FOOTER*****************-->
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