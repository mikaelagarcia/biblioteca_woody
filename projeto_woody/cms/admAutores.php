<?php

require_once("conexao.php");
$conexao = conexaoBD();

session_start();

$botao = "inserir";
$nome_autor = "";
$descricao_autor = "";
$nome = "";
$fotoBanco = "";
$print_img = "";

//pegando dados via post para fazer upload da imagem
if(isset($_POST['btnSalvar'])){ 
    
    $arquivo = $_FILES['filefoto']['name'];
    $tamanho_arquivo = $_FILES['filefoto']['size'];
    $tamanho_arquivo = round($tamanho_arquivo/1024);
    $ext_arquivo = strrchr($arquivo,".");
    $nome_arquivo = pathinfo($arquivo, PATHINFO_FILENAME);
    $nome_arquivo = md5(uniqid(time()).$nome_arquivo);
    $diretorio_arquivo = "imagensUpload/";
    $arquivos_permitidos = array(".jpg",".png",".jpeg");
    
    $nome_autor = $_POST['txtNomeAutor'];
    $descricao_autor = $_POST['txtDescricao'];
    $nome = $_POST['txtNomeFoto'];



    if(in_array($ext_arquivo,$arquivos_permitidos)){

        if($tamanho_arquivo<=2000){

            $arquivo_tmp = $_FILES['filefoto']['tmp_name'];
            $foto = $diretorio_arquivo . $nome_arquivo . $ext_arquivo;

            if(move_uploaded_file($arquivo_tmp,$foto)){
                       
            }else{
                echo("Tamanho do arquivo invalido!");
            }
        }else{
        echo("Extensão Invalida");
        }
       
    }


    if($_POST['btnSalvar'] == 'inserir'){
                
        $sql = "INSERT into tbl_autores (nome_autor, descricao_autor, img_autor, nome_img_autor) VALUES ('".$nome_autor."','".$descricao_autor."','".$foto."','".$nome."')";

    }
    else if($_POST['btnSalvar'] == "editar"){


        
        if($_FILES['filefoto']['name'] == ""){
            
            $sql = "UPDATE tbl_autores SET nome_autor='".$nome_autor."', descricao_autor='".$descricao_autor."', 
            nome_img_autor='".$nome."' WHERE id_autor =".$_SESSION['id_autor'];

            
        }else{
            
            $sql = "UPDATE tbl_autores SET nome_autor='".$nome_autor."', descricao_autor='".$descricao_autor."', 
            img_autor='".$foto."', nome_img_autor='".$nome."' WHERE id_autor =".$_SESSION['id_autor'];
           

        }
        
        
    }    
    mysqli_query($conexao,$sql);
    //echo($sql);
    header('location:admAutores.php');
}
// VERIFICANDO MODO
if(isset($_GET['modo'])){

    $modo = $_GET['modo'];
    //verifica se o modo é excluir ao clicar
    if($modo == 'excluir'){
        //recebe o código do ID
        $codigo = $_GET['id_autor'];
        //deletar
        $sql = "DELETE FROM tbl_autores WHERE id_autor=".$codigo;
        //executando o script no banco
        mysqli_query($conexao, $sql);
        //echo($sql);
        header('location:admAutores.php');

}else if($modo == 'editar'){
        
        $botao = "editar";
        $codigo = $_GET['id_autor'];
        $_SESSION['id_autor']=$codigo;
        
        $sql = "SELECT * FROM tbl_autores WHERE id_autor=".$codigo;
        
        $select = mysqli_query($conexao, $sql);
        //a variavel rsConsulta esta recebendo a consulta do banco e criando uma array e pegando os campos
        if($rsConsulta=mysqli_fetch_array($select)){
            $nome_autor = $rsConsulta['nome_autor'];
            $descricao_autor = $rsConsulta['descricao_autor'];
            $nome = $rsConsulta['nome_img_autor'];
            $fotoBanco = $rsConsulta['img_autor'];

            if($fotoBanco == ""){
                $print_img = "Não foram carregadas fotos anteriormente";
            }else{
                $print_img = "<img src='$fotoBanco'>";
            }
        }
        
    }else if ($modo == 'status'){
        
        $valorStatus = $_GET['valorStatus'];
        $id = $_GET['id_autor'];

        if($valorStatus == 0){
            $valorStatus = 1;
        }else{
            $valorStatus = 0;
        }

        $sql = "UPDATE tbl_autores SET status_autor='".$valorStatus."' WHERE id_autor =".$id;

        mysqli_query($conexao, $sql);
        //echo($sql);
        header('location:admAutores.php');





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
    <div id="sessaoadmAutores">
        <div class="seguraForm">
            <form method="POST" action="admAutores.php" enctype="multipart/form-data">
                Nome do autor: <input type="text" name="txtNomeAutor" value="<?php echo($nome_autor)?>">
                <br>
                <br>
                Descrição do autor:<input type="textarea" name="txtDescricao" value="<?php echo($descricao_autor)?>">
                <br>
                <br>
                Foto: <input type="file" name="filefoto">
                <br>
                <br>
                Nome da foto: <input type="text" name="txtNomeFoto" value="<?php echo($nome)?>">
                <br>
                <input type"text" name="txtCriptoFoto" style="display: none;" value="<?php echo($foto)?>">

                <input type="submit" value="<?php echo($botao)?>" name="btnSalvar" id="btnGravarAutores">
                
            </form>
        </div>
              
        <div id="carregarImg">
            <?php echo($print_img)?>

        </div>    
            
    </div>
    <!-- ************LISTA QUE SERA CARREGADA****** -->
   
    <div id="seguraListaAdmAutores">
        <div id="listaAdmAutores">
            <div class="itemListaAutores">
                Nome do Autor
            </div>
            <div class="itemListaAutores">
                Descrição
            </div>
            <div class="itemListaAutores">
                Opções
            </div>

            <?php 
            $sql = "SELECT * FROM tbl_autores ORDER BY id_autor";

            $select = mysqli_query($conexao,$sql);

            while($rsContato=mysqli_fetch_array($select)){

                if($rsContato['status_autor'] == 0){
                    $imgStatus = "statusOff.png";
                }else{
                    $imgStatus = "statusOn.png";
                }
                        
            ?>
            
            <div id="carregarListaAutores">
                <?php echo ($rsContato['nome_autor'])?>
            </div>
            <div id="carregarListaAutores">
                <?php echo($rsContato['descricao_autor'])?>
            </div>
            <div id="carregarListaAutores">
                <a href="admAutores.php?modo=status&valorStatus=<?php echo($rsContato['status_autor'])?>&id_autor=<?php echo($rsContato['id_autor'])?>">
                    <img src="icons/<?php echo($imgStatus)?>" alt="status">
                </a>
                <a href="admAutores.php?modo=editar&id_autor=<?php echo($rsContato['id_autor'])?>">
                    <img src="icons/edit.png.png" alt="editar">
                </a>
                <a href="admAutores.php?modo=excluir&id_autor=<?php echo($rsContato['id_autor'])?>">
                    <img src="icons/delete.png" alt="excluir">
                </a>
            </div>

            <?php } ?>        
                

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