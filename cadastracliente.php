<?php
/*
cli_id
cli_cpf
cli_nome
cli_senha
cli_datanasc
cli_telefone
cli_logradouro
cli_numero
cli_cidade
cli_ativo
*/

include("conectadb.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $data = $_POST['data'];
    $telefone = $_POST['telefone'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $cidade = $_POST['cidade'];
    $ativo = $_POST['ativo'];


    #VALIDAÇÃO DE USUARIO. VERIFICA SE USUARIO JA EXISTE
    $sql = "SELECT COUNT(cli_id) FROM usuarios WHERE cli_cpf = '$cpf' AND cli_nome = '$nome' AND cli_senha = '$senha'";
    $retorno = mysqli_query($link, $sql);

    while($tbl = mysqli_fetch_array($retorno)){
        $cont = $tbl[1];
    }
    #VALIDAÇÃO DE TRUE E FALSE
    if($cont == 1){
        echo"<script>window.alert('CLIENTE JÁ EXISTENTE');</script";
    }
    else{
        $sql = "INSERT INTO clientes (cli_cpf, cli_nome, cli_senha, cli_data, cli_telefone, cli_logradouro, cli_numero, cli_cidade cli_ativo)
        VALUES('$cpf','$nome','$senha',STR_TO_DATE('$data', '%y-%m-%d'),'$telefone','$logradouro','$numero','$cidade','n')";
        mysqli_query($link, $sql);
        #CADASTRAR USUARIO E JOGA MENSAGEM NA TELA E DIRECIONA PARA LISTA USUARIO
        echo"<script>window.alert('CLIENTE CADASTRADO');</script";
        echo"<script>window.location.href='listacliente.php';</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloadm.css"
    <title>CADASTRO DE CLIENTE</title>
</head>
<body>
    <div>
        <ul class="menu">
            <li><a href="cadastrausuario.php">CADASTRA USUARIO</a></li>
            <li><a href="listausuario.php">LISTA USUARIO</a></li>
            <li><a href="cadastraproduto.php">CADASTRA PRODUTO</a></li>
            <li><a href="cadastracliente.php">CADASTRA CLIENTE</a></li>
            <li><a href="listaproduto.php">LISTA PRODUTO</a></li>
            <li><a href="listacliente.php">LISTA CLIENTE</a></li>
            <li class="menuloja"><a href="./areacliente/loja.php">LOJA</a></li>
        </ul>
     <div>   

     <div>
        <form action="cadastrausuario.php" method="post">
            <input type="number" name="cpf" id="cpf" placeholder="CPF DO USUARIO">
            <br>
            <input type="text" name="nome" id="nome" placeholder="NOME DO USUARIO">
            <br>
            <input type="password" name="senha" id="senha" placeholder="SENHA">
            <br>
            <input type="date" name="data" id="data" placeholder="DATA">
            <br>
            <input type="number" name="telefone" id="telefone" placeholder="TELEFONE">
            <br>
            <input type="text" name="logradouro" id="logradouro" placeholder="LOGRADOURO">
            <br>
            <input type="number" name="numero" id="numero" placeholder="NUMERO">
            <br>
            <input type="text" name="cidade" id="cidade" placeholder="CIDADE">
            <br>
            <input type="submit" name="cadastrar" id="cadastrar" placeholder="CADASTRAR">
        </form>
     </div>
</body>
</html>