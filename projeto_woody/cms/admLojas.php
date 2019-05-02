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
    <div id="sessaoLojas">
        <div id="seguraFormLojas">
            <form method="POST" action="admLojas.php" name="frmLojas">
                <div id="tituloFormLojas">
                    <h3>Cadastrar Loja</h3>
                </div>
                <div class="itemFormCadLoja">
                    <p>Nome Loja: <input type="text" name="txtNomeloja" class="txtFormUsuario"></p>
                </div>
                <div class="itemFormCadLoja">
                    <p>Foto loja: 
                        <select name="slcFotoLoja">
                            <option></option>
                        </select>
                    </p>
                </div>
                <div class="itemFormCadLoja">
                    <p>Endereço: 
                        <select name="slcEnderecoLoja">
                            <option></option>
                        </select>
                    </p>
                </div>
                <div class="itemFormCadLoja">
                    <p>Horário de Funcionamento:    
                        <select name="slcHorarioLoja">
                            <option></option>
                        </select>
                    </p>
                </div>
                <div class="itemFormCadLoja">
                    <input type="submit" name="btnGravarLoja" id="btnGravarLoja">
               </div>
            </form>
        </div>
    </div>
     <!-- LISTA QUE SERA CARREGADA -->
    <div id="sessaoListaLoja">
        <div id="listaCadLoja">
            <div class="itemListaCadLoja" style="width:120px">
                Nome Loja
            </div>
            <div class="itemListaCadLoja" style="width:120px">
               Foto
            </div>
            <div class="itemListaCadLoja" style="width:350px">
                Endereço
            </div>
            <div class="itemListaCadLoja" style="width:204px">
                H. Funcionamento
            </div>
            <div class="itemListaCadLoja">
                Opções
            </div>
            <!-- *******CARREGANDO AS DIVS******** -->
            <div class="carregarListaCadLoja" style="width:120px">

            </div>
            <div class="carregarListaCadLoja" style="width:120px">

            </div>
            <div class="carregarListaCadLoja" style="width:350px">

            </div>
            <div class="carregarListaCadLoja" style="width:204px">

            </div>
            <div class="carregarListaCadLoja">
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