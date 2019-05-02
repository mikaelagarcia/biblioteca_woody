<?php

$host = "localhost";    
$user = "root";
$password = "bcd127";
$database = "bd_woody";
    // verificando conexão com o banco
    if(!$conexao = mysqli_connect($host,$user,$password,$database)){
        echo("Erro de Conexão");
    }


// pegando o id via get
$codigo = $_GET['idItem'];
// criando o select
$sql = "SELECT * FROM tbl_faleconosco WHERE id_fc=".$codigo;
    // echo($sql);
// recebendo a conexão
$select = mysqli_query($conexao,$sql);

    if($rs = mysqli_fetch_array($select)){
        $nome = $rs['nome_fc'];
        $email = $rs['email_fc'];
        $telefone = $rs['telefone_fc'];
        $celular = $rs['celular_fc'];
        $homepage = $rs['homepage_fc'];
        $url = $rs['url_fc'];
        $sugestao = $rs['sugestao_fc'];
        $infoproduto = $rs['infoproduto_fc'];
        $sexo = $rs['sexo_fc'];
        $profissao = $rs['profissao_fc'];
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <meta charset="utf-8" />
    <title>Modal</title>
    <link rel="stylesheet" href="css/style.css"/>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script>
        //função para fechar a modal
        $(document).ready(function(){
            $('.fechar').click(function(){
                $('#container').fadeOut(400);

            });

        });
    </script>    
    </head>
    <body>
        <a href="#" class="fechar">Fechar</a>
        <table border="1" align="center">
            <tr height="40px">
                <td width="250px">
                    <p>Nome</p>
                </td>
                <td width="250px">
                    <p>E-mail</p>
                </td>
            </tr>
            <tr height="40px">
                <td width="100px">
                    <p><?php echo($nome) ?></p>
                </td>
                
                <td width="100px">
                    <p><?php echo($email) ?></p>
                </td>
            </tr>
            <tr height="40px">
                <td width="100px">
                    <p>Telefone</p>
                </td>
                <td width="100px">
                    <p>Celular</p>
                </td>
            </tr>
            <tr height="40px">
                <td width="100px">
                    <p><?php echo($telefone) ?></p>
                </td>
                <td width="100px">
                    <p><?php echo($celular) ?></p>
                </td>
            </tr>
            <tr height="40px">
                <td width="100px">
                    <p>Sexo</p>
                </td>
                <td width="100px">
                    <p>Profissão</p>
                </td>
            </tr>
            <tr height="40px">
                <td width="100px">
                    <p><?php echo($sexo) ?></p>
                </td>
                <td width="100px">
                    <p><?php echo($profissao) ?></p>
                </td>
            </tr>
            <tr height="40px">
                <td width="100px">
                    <p>Url</p>
                </td>
                <td width="100px">
                    <p>Home</p>
                </td>
            </tr>
            <tr height="40px">
                <td width="100px">
                    <p><?php echo($url)?></p>
                </td>
                <td width="100px">
                    <p><?php echo($homepage)?></p>
                </td>
            </tr>
            <tr height="40px">
                <td width="100px">
                    <p>Informações</p>
                </td>
                <td width="100px">
                    <p>Sugestões</p>
                </td>
            </tr>
            <tr height="40px">
                <td width="100px">
                    <p><?php echo($infoproduto)?></p>
                </td>
                <td width="100px">
                    <p><?php echo($sugestao)?></p>
                </td>
                </tr>   

        </table>
    </body>
</html>