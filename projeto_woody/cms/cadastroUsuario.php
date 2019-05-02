<?php

require_once("conexao.php");
$conexao = conexaoBD();

$botao = "inserir";
$nomeUsuario = "";
$loginUsuario = "";
$senhaUsuario = "";
$idNivel2 = 0;
$nomeNivel = "";


session_start();

if(isset($_POST['btnEnviar'])){

    
    $nome = $_POST['txtNome'];
    $idNivel = $_POST['slcNivel'];
    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];
    $status = $_POST['slcStatus'];
      

   if($_POST['btnEnviar'] == 'inserir'){

    $sql = "INSERT into tbl_usuario (nome, id_nivel, login, senha, status) VALUES ('".$nome."','".$idNivel."','".$login."','".$senha."','".$status."');";

   }else if($_POST['btnEnviar'] == "editar"){
       
    
    $sql = "UPDATE tbl_usuario SET nome = '".$nome."',id_nivel = '".$idNivel."', login = '".$login."', senha = '".$senha."', 
    status = '".$status."' WHERE id_usuario=".$_SESSION['id_usuario'];
   
    }
    mysqli_query($conexao, $sql);
    //echo($sql);
    header('location:cadastroUsuario.php');

}

//Criando o deletar
if(isset($_GET['modo'])){
    $modo = $_GET['modo'];
    //echo($modo);
    //se modo for excluir
    if($modo == 'excluir'){
        $codigo = $_GET['id_usuario'];
        //deletar
        $sql = "DELETE FROM tbl_usuario WHERE id_usuario =".$codigo;
       
        mysqli_query($conexao, $sql);
        //echo($sql);
        header('location:cadastroUsuario.php');
    
    //se modo for buscar, editar o dado    
    }else if($modo == "editar"){

        $botao = "editar";
        $codigo = $_GET['id_usuario'];
        $_SESSION['id_usuario']=$codigo;
        $sql = "SELECT tbl_niveis.nivel, tbl_usuario.* 
        FROM tbl_usuario, tbl_niveis 
        WHERE tbl_niveis.id_nivel = tbl_usuario.id_nivel 
        AND id_usuario =".$codigo;
        
      
        $select = mysqli_query($conexao, $sql);

        if($rsConsulta = mysqli_fetch_array($select)){

            $nomeUsuario = $rsConsulta['nome'];
            $loginUsuario = $rsConsulta['login'];
            $senhaUsuario = $rsConsulta['senha'];
            $nomeNivel = $rsConsulta['nivel'];
            $idNivel2 = $rsConsulta['id_nivel'];
                    
        }
}else if($modo == "status"){
    //criando a variavel status para receber o valor de status quando for clicada
    $valorStatus = $_GET['valorStatus'];
    $codigo = $_GET['id_usuario'];
    //criando condicional para verificar status 
    if($valorStatus == 0){
        $valorStatus = 1;
    }else{
        $valorStatus = 0;
    }
    $sql = "UPDATE tbl_usuario SET status ='".$valorStatus."' WHERE id_usuario =".$codigo;

    mysqli_query($conexao, $sql);
    //echo($sql);
    header('location:cadastroUsuario.php');
      
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
    <!-- ************************* TABELA CADASRO USUARIO********************** -->        
    <div id="sessaoCadUsuario">
        <div id="seguraFormUsuario">
            <form method="POST" action="cadastroUsuario.php" id="formCadUsuario">
                <div id="formTituloUser">
                    <h2>Cadastro de Usuário</h2>
                </div>
                <div class="itemForm">
                   <p>Nome: <input type="text" class="txtFormUsuario" name="txtNome" value="<?php echo($nomeUsuario)?>"></p> 
                </div>
                <div class="itemForm">
                    <p>Login: <input type="text" class="txtFormUsuario" name="txtLogin" value="<?php echo($loginUsuario)?>"></p> 
                </div>
                <div class="itemForm">
                    <p>Senha: <input type="text" class="txtFormUsuario" name="txtSenha" value="<?php echo($senhaUsuario)?>"></p> 
                </div>
                <div class="itemForm">
                    <p>Nivel: <select name="slcNivel">
                    <!-- se o modo for editar, carregar as informações selecionadas por id
                    caso não seja, mostrar o padrão de opções -->
                    <?php 
                        if($modo == "editar"){
                            ?> <option value="<?php echo($idNivel2)?>"><?php echo($nomeNivel)?></option>
                            <?php
                        }else{
                            ?>
                            <option value="">Selecione o nível:</option>
                            <?php
                        }

                    $sql = "SELECT * FROM tbl_niveis WHERE tbl_niveis.id_nivel <>".$idNivel2;
                    $select = mysqli_query($conexao,$sql);
                        
                    while($rsContato = mysqli_fetch_array($select)){
                    ?>
                        <option value="<?php echo($rsContato['id_nivel'])?>"><?php echo($rsContato['nivel']);?></option>
                    <?php
                    }
                    ?>
                    </select></p> 
                </div>
                <div class="itemForm">
                    <p>Status: <select name="slcStatus">
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                            </select>
                    </p>
                </div>
                <div class="itemForm">
                    <input type="submit" value="<?php echo($botao)?>" name="btnEnviar" id="btnEnviarUsuario">
                </div>
            </form>    
        </div>  
        
        <!-- INICIO DA TABELA QUE SERA CARREGADA -->
        <div id="listaUsuario">
            <div class="itemListaUsuario">
                Nome
            </div>    
            <div class="itemListaUsuario">
                Login
            </div>
            <div class="itemListaUsuario">
                Opções
            </div>
            <!-- *******************LISTA SENDO CARREGADA************* -->
            <?php
            
            $sql = "SELECT * FROM tbl_usuario ORDER BY id_usuario DESC";
            $select = mysqli_query($conexao,$sql);
            
            while($rsUsuario = mysqli_fetch_array($select)){
            //criando condição para verificar se o status é ON ou OFF
            if($rsUsuario['status'] ==0){
                $imgStatus = "statusOff.png";
            }else{
                $imgStatus = "statusOn.png";
            }
            
            ?>
            <div class="carregarListUsuario">
                <?php echo($rsUsuario['nome']);?>
            </div>
            <div class="carregarListUsuario">
                <?php echo($rsUsuario['login']);?>
            </div> 
            
            <div class="carregarListUsuario">
                <a href="cadastroUsuario.php?modo=excluir&id_usuario=<?php echo($rsUsuario['id_usuario'])?>">
                    <img src="icons/delete.png" alt="delete">
                </a>
                <a href="cadastroUsuario.php?modo=editar&id_usuario=<?php echo($rsUsuario['id_usuario'])?>">
                    <img src="icons/edit.png.png" alt="editar">
                </a>
                <a href="cadastroUsuario.php?modo=status&valorStatus=<?php echo($rsUsuario['status'])?>&id_usuario=<?php echo($rsUsuario['id_usuario'])?>" >
                    <img src="icons/<?php echo($imgStatus)?>" alt="status">
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