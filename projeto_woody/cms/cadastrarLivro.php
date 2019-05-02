<?php
    
    require_once('conexao.php');
    $conexao = conexaoBD();

    session_start();

    $botao = "inserir";
    $id_categoria = 0;
    $id_subcategoria = 0;
    $img_livro = "";
    $titulo_livro = "";
    $categoria_livro = "";
    $subcategoria_livro = "";
    $preco_livro = "";
    $detalhes_livro = "";
    $paginas_livro = "";
    $isbn_livro = "";
    $idioma_livro = "";


    if(isset($_POST['btnGravarLivro'])){

        $arquivo = $_FILES['filefoto']['name'];
        $tamanho_arquivo = $_FILES['filefoto']['size'];
        $tamanho_arquivo = round($tamanho_arquivo/1024);
        $ext_arquivo = strrchr($arquivo,".");
        $nome_arquivo = pathinfo($arquivo, PATHINFO_FILENAME);
        $nome_arquivo = md5(uniqid(time()).$nome_arquivo);
        $diretorio_arquivo = "imagensUpload/";
        $arquivos_permitidos = array(".jpg",".png",".jpeg");

        
        $titulo_livro = $_POST['titulo_livro'];
        $categoria_livro = $_POST['slcCategoria'];
        $subcategoria_lilvro = $_POST['slcSubCategoria'];
        $preco_livro = $_POST['preco_livro'];
        $detalhes_livro = $_POST['detalhes_livro'];
        $paginas_livro = $_POST['paginas_livro'];
        $isbn_livro = $_POST['isbn_livro'];
        $idioma_livro = $_POST['idioma_livro'];
        
        if(in_array($ext_arquivo, $arquivos_permitidos)){

            if($tamanho_arquivo <=2000){
                $arquivo_tmp = $_FILES['filefoto']['tmp_name'];
                $img_livro = $diretorio_arquivo . $nome_arquivo . $ext_arquivo;

                if(move_uploaded_file($arquivo_tmp,$img_livro)){

                }else{
                    echo utf8_encode("Extensão Invalida");
                }
            }else{
                echo utf8_encode("Tamanho do arquivo invalido!");
            }
        }
        // fazendo o inserir
        if($_POST['btnGravarLivro'] == 'inserir'){
                       
        //select para inserir livro no banco - na tabela de livros
        $sql = "INSERT INTO tbl_livros (img_livro, titulo_livro, preco, detalhes, paginas, isbn, idioma) 
        VALUES ('".$img_livro."','".$titulo_livro."','".$preco_livro."','".$detalhes_livro."', ".$paginas_livro.",'".$isbn_livro."','".$idioma_livro."')";
        
        mysqli_query($conexao, $sql);
        //echo ($sql);
        header('location:cadastrarLivro.php');
        //ultimo id criado para inserir na tabela de relacionamento entre subcategoria e livros
        $ultimo_id = mysqli_insert_id($conexao);
        echo("Ultimo id".$ultimo_id);
        echo("Sub ".$subcategoria_lilvro);
        echo("Sub ".$categoria_livro);

        // insert na tabela de relacionamento
        $sql = "INSERT INTO tbl_subcategoria_livro (id_subcategoria, id_livro) 
        values ('".$subcategoria_lilvro."',".$ultimo_id.")";

        //  echo($sql);

        mysqli_query($conexao, $sql);   
                
         // FAZENDO O EDITAR - UPDATE
        }else if($_POST['btnGravarLivro'] == 'editar'){


        $sql = "UPDATE tbl_livros SET img_livro = '".$img_livro."', 
        titulo_livro = '".$titulo_livro."', preco = '".$preco_livro."',
        detalhes = '".$detalhes_livro."', paginas = '".$paginas_livro."',
        isbn = '".$isbn_livro."', idioma = '".$idioma_livro."' 
        WHERE id_livros=".$_SESSION['id_livro'];

        $select = "UPDATE tbl_categoria SET id_categoria";

        }
    }
    // criando o delete
    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        //echo($modo);

        if($modo == 'excluir'){
            $id_livro = $_GET['id_livro'];
            //deletar da tabela de livros
            $select ="DELETE FROM tbl_subcategoria_livro WHERE id_livro=".$id_livro;
            mysqli_query($conexao, $select);
             //deletar da tabela de categoria 
             $sql = "DELETE FROM tbl_livros WHERE id_livro =".$id_livro;
            mysqli_query($conexao, $sql);
            
            header('location:cadastrarLivro.php');





        
        //se modo for buscar, editar o dado
        }else if($modo == "editar"){

            $botao = "editar";
            $id_livro = $_GET['id_livro'];
           
            $_SESSION['id_livro']=$id_livro;

            $sql = "SELECT tbl_livros.*, tbl_categoria.*, tbl_subcategoria.*
            FROM tbl_categoria, tbl_subcategoria, tbl_subcategoria_livro, tbl_livros
            WHERE tbl_subcategoria.id_categoria = tbl_categoria.id_categoria 
            AND tbl_subcategoria.id_subcategoria = tbl_subcategoria_livro.id_subcategoria
            AND tbl_livros.id_livro = tbl_subcategoria_livro.id_livro
            AND tbl_subcategoria_livro.id_livro =".$id_livro;

            $select = mysqli_query($conexao, $sql);

            if($rs_editar_livro = mysqli_fetch_array($select)){
                $img_livro = $rs_editar_livro['img_livro'];
                $titulo_livro = $rs_editar_livro['titulo_livro'];
                $id_categoria_livro = $rs_editar_livro['id_categoria'];
                $nome_categoria_livro = $rs_editar_livro['nome_categoria'];
                $id_subcategoria_livro = $rs_editar_livro['id_subcategoria'];
                $nome_subcategoria_livro = $rs_editar_livro['nome_subcategoria'];
                $preco_livro = $rs_editar_livro['preco'];
                $detalhes_livro = $rs_editar_livro['detalhes'];
                $paginas_livro = $rs_editar_livro['paginas'];
                $isbn_livro = $rs_editar_livro['isbn'];
                $idioma_livro = $rs_editar_livro['idioma'];
            }

        }
        // else if($modo == "status"){
        //     $valorStatus = $_GET['valorStatus'];
        //     $id_livro = $_GET['id_livro'];

        //     if($valorStatus == 0){
        //         $valorStatus = 1;
        //     }else{
        //         $valorStatus = 0;
        //     }

        //     $sql = "UPDATE tbl_livros SET status ='".$valorStatus."'WHERE id_livros =".$id_livro;

        //     mysqli_query($conexao, $sql);
        //     header('location:cadastrarLivro.php');


        // }
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

<!-- **********************************CADASTRAR LIVROS************************ -->

<div id="sessaoCadastroLivro">

    <div class="seguraFormLivro">
        <form method="POST" action="" name="frmCadastroLivro" style="width: 500px; height: 558px;" enctype="multipart/form-data">
            <div id="tituloCadLivro">
                <h3>CADASTRAR LIVRO</h3>
            </div>
            <div class="itemFormCadLivro">
                <p>Titulo do Livro: <input type="text" name="titulo_livro" class="txtFormLivro" value="<?php echo utf8_encode($titulo_livro)?>" required></p>
            </div>
            <div class="itemFormCadLivro">
                <p>Categoria: 
                    <select name="slcCategoria">
                    <!-- SELECT PARA PEGAR DADOS DO BANCO E CARREGAR O COMBO -->
                     <?php
                        if($modo == "editar"){
                     ?>      
                            <option value="<?php echo($id_categoria)?>" required><?php echo utf8_encode($nome_categoria_livro)?></option>
                        <?php
                        }else{
                            
                        ?>
                            <option value="">Selecione a categoria:</option>
                        <?php 
                        }
                    
                        $sql = "SELECT * FROM tbl_categoria WHERE tbl_categoria.id_categoria <>".$id_categoria;
                        $select = mysqli_query($conexao, $sql);

                        while($rs_categoria = mysqli_fetch_array($select)){
                        ?>
                        
                        <option value="<?php echo($rs_categoria['id_categoria'])?>" required><?php echo utf8_encode($rs_categoria['nome_categoria']);?></option>
                    <?php
                        }
                    ?>

                    </select>
                </p>
            </div>
            <div class="itemFormCadLivro">
                <p>Subcategoria: 
                    <select name="slcSubCategoria" id="slcSubcategoria" onchange="atualizarCombo()" required>

                    <?php
                        if($modo == "editar"){
                    ?>
                        <option value="<?php echo($id_subcategoria)?>" required><?php echo utf8_encode($nome_subcategoria_livro)?></option>
                    <?php
                    }else{
                    ?>
                        <option value="">Selecione a subcategoria:</option>
                    <?php
                    }
                        // $sql = "SELECT * FROM tbl_subcategoria WHERE tbl_subcategoria.id_subcategoria <>".$id_subcategoria;
                        // $select = mysqli_query($conexao, $sql);
                        // // while($rs_subcategiria = mysqli_fetch_array($select)){


                    ?>
                        <option value="<?php echo($rs_subcategiria['id_subcategoria'])?>" required><?php echo utf8_encode($rs_subcategiria['nome_subcategoria'])?></option>
                    <?php
                      }
                    ?>
                    </select>
                </p>
            </div>
            <div class="itemFormCadLivro">
                <p>Preço: <input type="text" name="preco_livro" class="txtFormLivro" value="<?php echo utf8_encode($preco_livro)?>" required></p>
            </div>
            <div class="itemFormCadLivro" style="height: 150px;">
                <p>Detalhes:</p><textarea name="detalhes_livro" value="<?php echo($detalhes_livro)?>" style="height: 110px; width: 250px" required><?php echo utf8_encode($detalhes_livro)?></textarea>
            </div>
            <div class="itemFormCadLivro">
                <p>Paginas: <input type="text" name="paginas_livro" value="<?php echo utf8_encode($paginas_livro)?>" class="txtFormLivro" required></p>
            </div>
            <div class="itemFormCadLivro">
                <p>ISBN: <input type="text" name="isbn_livro" value="<?php echo utf8_encode($isbn_livro)?>" class="txtFormLivro" required></p>
            </div>
            <div class="itemFormCadLivro">
                <p>Idioma: <input type="text" name="idioma_livro" value="<?php echo utf8_encode($idioma_livro)?>" class="txtFormLivro" required></p>
            </div>
            <div class="itemFormCadLivro" style="height: 145px;">
                <div class="itemFoto" style="width: 300px">
                    <p>Imagem: </p>
                    <input type="file" name="filefoto" required>
                </div>
                <div class="itemFoto" style="width: 200px">
                    <img src="<?php echo($img_livro)?>">
                </div>
            </div>
            <div class="itemFormCadLivro">
                <input type="submit"  name="btnGravarLivro" value="<?php echo($botao)?>" id="btnGravarLivro" required>
            </div>
        </form>
    </div>

    <!-- ****************************************LISTA SERA CARREGADA AQUI****************************************** -->
    <div id="listaCadastroLivro">
        <div class="itemListaLivro" style="width: 185px">
            Titulo
        </div>
        <div class="itemListaLivro">
           Categoria
        </div>
        <div class="itemListaLivro">
            Subcategoria
        </div>
        <div class="itemListaLivro">
            Detalhes
        </div>
        <div class="itemListaLivro">
            Paginas    
        </div>
        <div class="itemListaLivro">
            ISBN
        </div>
        <div class="itemListaLivro">
            Idioma
        </div>
        <div class="itemListaLivro">
            Opções
        </div>
        <!-- ************************ONDE LISTA SERA CARREGADA********************* -->
        <?php
            
            $sql = "SELECT tbl_livros.*, tbl_categoria.nome_categoria, tbl_subcategoria.nome_subcategoria 
            FROM tbl_livros, tbl_categoria, tbl_subcategoria, tbl_subcategoria_livro
            WHERE tbl_livros.id_livro = tbl_subcategoria_livro.id_livro 
            AND tbl_subcategoria.id_subcategoria = tbl_subcategoria_livro.id_subcategoria
            AND tbl_categoria.id_categoria = tbl_subcategoria.id_categoria";
           
            $select = mysqli_query($conexao,$sql);

            while($rs_livros=mysqli_fetch_array($select)){

            // if($rs_livros['status_livro'] == 0){
            //     $imgStatus = "statusOff.png";
            // }else{
            //     $imgStatus = "statusOn.png";
            // }
        ?>
        
        <div class="carregarListaLivro" style="width: 185px">
            <?php echo utf8_encode($rs_livros['titulo_livro'])?>
        </div>
        <div class="carregarListaLivro">
            <?php echo utf8_encode($rs_livros['nome_categoria'])?>
        </div>
        <div class="carregarListaLivro">
            <?php echo utf8_encode($rs_livros['nome_subcategoria'])?>
        </div>
        <div class="carregarListaLivro">
            <?php echo utf8_encode($rs_livros['preco'])?>
        </div>
        <div class="carregarListaLivro">
            <?php echo utf8_encode($rs_livros['detalhes'])?>
        </div>
        <div class="carregarListaLivro">
            <?php echo utf8_encode($rs_livros['isbn'])?>
        </div>
        <div class="carregarListaLivro">
        <?php echo utf8_encode($rs_livros['idioma'])?>
        </div>
        <div class="carregarListaLivro">
            <a href="cadastrarLivro.php?modo=editar&id_livro=<?php echo($rs_livros['id_livro'])?>">
                <img src="icons/edit.png.png" alt="editar"> 
            </a>
            <a href="cadastrarLivro.php?modo=excluir&id_livro=<?php echo($rs_livros['id_livro'])?>">
                <img src="icons/delete.png" alt="delete"> 
            </a>
            <a href="cadastroLivro.php?modo=status&valorStatus=<?php echo($rs_livros['status_livro'])?>&id_livro=<?php echo($rs_livro['id_livro'])?>">
                <img src="icons/<?php echo($img_status)?>" alt="status"> 
            </a>
        </div>

    <?php
        }
    ?>
    </div>


</div>

<!-- ***********************************FOOTER********************************* -->
<footer>
    <?php 
        require_once("footer.php");
    ?>
</footer>    
    

</html>


<!-- ***********************************
Campos que serão alterados no layout
PAIS
EDITORA
LANÇAMENTO
PESO


********************************* -->