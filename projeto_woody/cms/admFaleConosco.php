<?php

require_once('conexao.php');
$conexao = conexaoBD();

session_start();

    //criando o deletar
    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];

        if($modo == 'excluir'){
            $codigo = $_GET['id_fc'];
            $sql = "DELETE FROM tbl_faleconosco WHERE id_fc =".$codigo;
            mysqli_query($conexao, $sql);
            //echo($sql);
            header('location:admFaleConosco.php');
        }
    }


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>CMS Woody</title>
    <link rel="stylesheet" href="css/style.css"/>
    <script src="js/script.js"></script>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script>
      //iniciando o jquery
        $(document).ready(function(){
            //function para abrir a modal    
            $(".visualizar").click(function(){
                $("#container").slideToggle(500);
            });
            
        });

        function modal(idItem){
            $.ajax({
                 type: "GET",
                 url: "modal1.php",
                 data:{idItem:idItem},
                 success: function(dados){
                    $('#modal').html(dados);
                }
            });
        }
    </script>
</head>
<body>  
    <div id="container">
        <div id="modal">
        </div>    
    </div> 
    <header>
        <?php
            require_once("header.php");
        
        ?>
    </header> 
   
    <!-- ************************* TABELA FALE CONOSCO********************** -->        
    <div id="sessaoFaleConosco">
        <div id="faleConosco">
            <div id="tblFaleConosco">
                <div id="tituloFaleConosco">
                    <h3>FALE CONOSCO</h3>
                </div>
                <div class="itemTblFaleConosco">
                    <p>Nome</p> 
                </div>
                <div class="itemTblFaleConosco">
                    <p>E-mail</p>
                </div>
                <div class="itemTblFaleConosco">
                    <p>Telefone</p>
                </div>
                <div class="itemTblFaleConosco">
                    <p>Celular</p>
                </div>
                <div class="itemTblFaleConosco">
                    <p>Visualizar</p>
                </div>
                <div class="itemTblFaleConosco">
                    <p>Deletar</p>
                </div>
    
                <?php
                //fazendo o select
                $sql = "SELECT * FROM tbl_faleconosco ORDER BY id_fc DESC";
                //recebendo a conexão
                $select = mysqli_query($conexao,$sql);
                while($rsContato = mysqli_fetch_array($select)){
                ?>        

                <div class="carregarDados">
                    <p><?php echo($rsContato['nome_fc'])?></p>
                </div>
                <div class="carregarDados">
                    <p><?php echo($rsContato['email_fc'])?></p>
                </div>
                <div class="carregarDados">
                    <p><?php echo($rsContato['telefone_fc'])?></p>
                </div>
                <div class="carregarDados">
                    <p><?php echo($rsContato['celular_fc'])?></p>
                </div>
                <div class="carregarDados">
                   <a href="#" class="visualizar" onclick="modal(<?php echo($rsContato['id_fc'])?>)"><img src="icons/view.png" alt="atualizar"></a>  
                </div>
                <div class="carregarDados">
                    <a href="admFaleConosco.php?modo=excluir&id_fc=<?php echo($rsContato['id_fc'])?>">
                        <img src="icons/delete_.png" alt="delete">
                    </a>
                </div>
                <?php
                }
                ?>  
            </div>  
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