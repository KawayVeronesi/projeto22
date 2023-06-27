<?php

include("conectadb.php");

session_start();




//TRAZ DADOS DO BANCO PARA COMPLETAR

$id = $_GET['id'];

$sql = "SELECT * FROM clientes WHERE usu_id = '$id'";

$retorno = mysqli_query($link, $sql);





while($tbl = mysqli_fetch_array($retorno))

{

$cpf = $tbl[1];

$nome = $tbl[2];

$datanasc = $tbl[3];

$telefone = $tbl[4];

$logradouro = $tbl[5];

$numero = $tbl[6];

$cidade = $tbl[7];

$ativo = $tbl[8];






}




//usuario clika no botao salvar

if($_SERVER['REQUEST_METHOD'] == 'POST')

{

    $id = $_POST['id'];

    $cpf = $_POST['cpf'];

    $nome = $_POST['nome'];

    $senha = $_POST['senha'];

    $datanasc = $_POST['datanasc'];

    $telefone = $_POST['telefone'];

    $logradouro = $_POST['logradouro'];

    $numero = $_POST['numero'];

    $cidade = $_POST['cidade'];

    $ativo = $_POST['ativo'];




    //$sql ="UPDATE clientes SET usu_nome = '$nome', usu_senha = '$senha', usu_ativo = '$ativo' WHERE usu_id = $id";

    $sql ="UPDATE clientes SET usu_nome = '$nome', usu_senha = '$senha', usu_ativo = '$ativo' WHERE usu_id = $id";

    $sql ="UPDATE clientes SET cli_cpf = '$cpf', cli_nome = '$nome', cli_senha = '$senha',cli_datanasc = 'STR_TO_DATE('$datanasc', '%y-%m-%d')', cli_telefone = '$telefone', cli_logradouro = '$logradouro', cli_numero = '$numero', cli_cidade = '$cidade' WHERE usu_id = $id";

    mysqli_query($link, $sql);





    mysqli_query($link, $sql);







echo"<script>window.alert('CLIENTE ALTERADO COM SUCESSO!');</script>";    




echo"<script>window.location.href='admhome.php';</script>";





}





?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/estiloadm.css">

    <title>ALETRA USUARIOS</title>

</head>

<body>

    <div>

        <ul class="menu">

            <li><a href="cadastrausuario.php">CADASTRA USUARIO</a></li>

            <li><a href="listausuario.php">LISTA USUARIO</a></li>

            <li><a href="cadastraproduto.php">CADASTRA PRODUTO</a></li>

            <li><a href="listaproduto.php">LISTA PRODUTO</a></li>

            <li><a href="listacliente.php">LISTA CLIENTE</a></li>

            <li class="menuloja"><a href="./areacliente/loja.php">LOJA</a></li>

        </ul>

    </div>




    <div>

        <form action="alterausuario.php" method="post">

            <input type="hidden" name="id" value="<?$id?>">

            <input type="text" name="nome" id="nome" value="<?=$nome?>"require>

            <br>

            <input type="password" name="senha" id="senha" value="<?=$senha?>"require>

            <br>

            <input type="text" name="nome" id="nome" placeholder="NOME CLIENTE">

            <br>

            <input type="number" name="cpf" id="cpf" placeholder="CPF">

            <br>

            <input type="date" name="datanasc" id="datanasc" placeholder="DATA">

            <br>

            <input type="number" name="telefone" id="telefone" placeholder="TELEFONE">

            <br>

            <input type="text" name="logradouro" id="logradouro"placeholder="LOGRADOURO">

            <br>

            <input type="number" name="numero" id="numero" placeholder="NUMERO">

            <br>

            <input type="text" name="cidade" id="cidade"placeholder="CIDADE">

            <br>

            <input type="radio" name="ativo" value="s" <?=$ativo == "s"?"checked":""?>>ATIVO

            <br>

            <input type="radio" name="inativo" value="n" <?=$ativo == "s"?"checked":""?>>INATIVO




            <input type="submit" name="salvar" id="salvar" value="SALVAR">

        </form>

    </div>




   

</body>

</html>