<?php
require_once("conexao.php");
$conexao = conexaoBD();

session_start();


$botao = "inserir";
$idLivro = 0;
$idPromocao = 0;
$nome_promocao = "";

//pegando dados via post para fazer upload da imagem
if(isset($_POST['btnGravarAdmPromocao'])){

    $livros = $_POST['slcLivro'];
    $promocao = $_POST['slcPromocao'];

    
    if($_POST['btnGravarAdmPromocao'] == 'inserir'){

        $sql = "INSERT into tbl_livros_promocao (id_livro, id_promocao) VALUES ('".$livros."','".$promocao."');";

    }else if($_POST['btnGravarAdmPromocao'] == 'editar'){

        $SQL = "UPDATE tbl_livros_promocao SET id_livro = '".$livros."', id_promocao = '".$promocao."' WHERE id_livros_promocao=".$_SESSION['id_livros_promocao']; 
    }
    mysqli_query($conexao, $sql);
    //echo($sql);
    header('location:admPromocao.php');
}

//verificando dados via modo
if(isset($_GET['modo'])){
    
    $modo = $_GET['modo'];
    if($modo == 'excluir'){

        $id = $_GET['id_livros_promocao'];

        $sql = "DELETE from tbl_livros_promocao WHERE id_livros_promocao =".$id;

        mysqli_query($conexao, $sql);
        //echo($sql);
        header('location:admPromocao.php');

    }else if($modo == 'editar'){
       
        $botao = "editar";
        $id = $_GET['id_livro'];
        $_SESSION['id_usuario']=$id;
        $sql = "select tbl_livros.id_livro, tbl_livros.titulo_livro, tbl_promocao.*,  tbl_livros_promocao. * from tbl_livros, tbl_promocao, tbl_livros_promocao where tbl_livros.id_livro  =  tbl_livros_promocao.id_livro and tbl_promocao.id_promocao = tbl_livros_promocao.id_promocao and tbl_livros_promocao.id_livros_promocao =".$id;

        $select = mysqli_query($conexao, $sql);

        if($rsConsulta = mysqli_fetch_array($select)){
            $nome_livro = $rsConsulta['titulo_livro'];
            $nome_promocao = $rsConsulta['nome_promocao'];
            $id_livro = $rsConsulta['id_livro'];
            $id_promocao = $rsConsulta['id_promocao'];
            
        }
    } else if($modo == 'status'){
        //criando a variavel status para receber o valor de status quando for clicada
        $valorStatus = $_GET['valorStatus'];
        $id = $_GET['id_livros_promocao'];

        if($valorStatus == 0){
            $valorStatus = 1;
        }else{
            $valorStatus = 0;
        }
        $sql = "UPDATE tbl_livros_promocao SET status ='".$valorStatus."' WHERE id_livros_promocao =".$id;
    
        mysqli_query($conexao, $sql);
        //echo($sql);
        header('location:admPromocao.php');
        
    }
   
}
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
    <div id="sessaoAdmPromocao">
        <div id="seguraFormPromocao">
            <form method="POST" action="admPromocao.php">  
                <div id="tituloFormPromocao">
                    <h3>Promoções</h3>
                </div>
                <div class="itemFormPromocao">
                    <p>Livro: <select name="slcLivro">
                        
                        <!-- se o modo for editar, carregar as informações selecionadas por id
                        caso não seja, mostrar o padrão de opções -->
                        <?php
                        if($botao == "editar"){
                        ?> <option value="<?php echo($id_livro)?>"><?php echo($nome_livro)?></option>
                        <?php
                        }else{
                        ?>
                        <option>Selecione o Livro:</option>
                        
                        <?php
                                         
                        }
                        
                        $sql= "SELECT * FROM tbl_livros WHERE id_livro <> ".$idLivro;
                        $select = mysqli_query($conexao, $sql);

                        while($rsLivro = mysqli_fetch_array($select)){
                        
                        ?>
                            <option value="<?php echo($rsLivro['id_livro'])?>"><?php echo($rsLivro['titulo_livro'])?></option>
                        <?php
                        }
                        ?>
                        
                    </select></p>
                </div>

                <div class="itemFormPromocao">
                    <p>Promoção: <select name="slcPromocao">
                        <!-- se o modo for editar, carregar as informações selecionadas por id
                        caso não seja, mostrar o padrão de opções -->

                        <?php
                        
                        if($botao == "inserir"){
                        ?> 
                            <option>Selecione a Promoção:</option>
                            
                        <?php

                        }else{
                            ?>
                            <option value="<?php echo($id_promocao)?>"><?php echo($nome_promocao)?></option>
                            <?php
                            
                        }
                                               
                        $sql = "SELECT * FROM tbl_promocao WHERE id_promocao <>".$idPromocao;
                        $select = mysqli_query($conexao, $sql);

                        while($rsPromocao = mysqli_fetch_array($select)){
                                                
                        ?>
                            <option value="<?php echo($rsPromocao['id_promocao'])?>"><?php echo($rsPromocao['nome_promocao'])?></option>

                        <?php
                        }
                        ?>
                    </select></p>
                </div>
                <div class="itemFormPromocao">
                    <input type="submit" value="<?php echo($botao)?>" id="btnGravarAdmPromocao" name="btnGravarAdmPromocao">
                </div>
            </form>
        </div>

        <!-- *************************LISTA QUE SERA CARREGADA******** -->
        <div id="listaAdmPromocao">
            <div class="itemListaPromocao">
                Nome do Livro
            </div>
            <div class="itemListaPromocao">
                Nome da Promoção
            </div>
            <div class="itemListaPromocao">
                Opções
            </div>
            <!-- LISTA SERA CARREGADA AQUI****** -->
            <?php

            $sql = "SELECT tbl_livros.id_livro, tbl_livros.titulo_livro, tbl_promocao.id_promocao, tbl_promocao.nome_promocao, tbl_livros_promocao.id_livros_promocao, tbl_livros_promocao.status FROM tbl_livros, tbl_promocao, tbl_livros_promocao WHERE tbl_livros.id_livro = tbl_livros_promocao.id_livro AND tbl_promocao.id_promocao = tbl_livros_promocao.id_promocao";

            $select = mysqli_query($conexao,$sql);
            //criando condição para verificar se o status é ON ou OFF
            while($rsConexao = mysqli_fetch_array($select)){

                if($rsConexao['status'] ==0){
                    $imgStatus = "statusOff.png";
                }else{
                    $imgStatus = "statusOn.png";
                }
                                 
            ?>
            
            <div class="carregarListaPromocao">
                <?php echo($rsConexao['titulo_livro'])?>
            </div>
            <div class="carregarListaPromocao">
                <?php echo($rsConexao['nome_promocao'])?>
            </div>
            <div class="carregarListaPromocao">
                <a href="admPromocao.php?modo=status&valorStatus=<?php echo($rsConexao['status'])?>&id_livros_promocao=<?php echo($rsConexao['id_livros_promocao'])?>">
                    <img src="icons/<?php echo($imgStatus)?>" alt="status">
                </a>
                <a href="admPromocao.php?modo=editar&id_livro=<?php echo($rsConexao['id_livros_promocao'])?>">
                    <img src="icons/edit.png.png" alt="editar">
                </a>
                <a href="admPromocao.php?modo=excluir&id_livros_promocao=<?php echo($rsConexao['id_livros_promocao'])?>">
                    <img src="icons/delete.png" alt="excluir">
                </a>
            </div>
            <?php
             }
            ?>
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