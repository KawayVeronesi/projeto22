<?php

include("conectadb.php");

session_start();

$nomeusuario = $_SESSION["nomecliente"];

#lista usuarios no baanco

$sql = "SELECT * FROM clientes WHERE cli_ativo = 's'";

$retorno = mysqli_query($link, $sql);





//força trazer "s" na variavel ativo

$ativo = 's';




//coleta botão de post

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $ativo = $_POST['ativo'];






    //verificar se usuario esta ativo para lista

    if ($ativo == 's') {

        $sql = "SELECT * FROM clientes WHERE cli_ativo = 's'";

        $retorno = mysqli_query($link, $sql);

    } else {

        $sql = "SELECT * FROM clientes WHERE cli_ativo = 'n'";

        $retorno = mysqli_query($link, $sql);

    }

}

?>





<!DOCTYPE html>

<html lang="pt-br">




<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/estiloadm.css">

    <title>Lista clientes</title>

</head>




<body>





    <div>

        <ul class="menu">

            <li><a href="cadastrausuario.php">CADASTRA USUARIO</a></li>

            <li><a href="listausuario.php">LISTA USUARIO</a></li>

            <li><a href="cadastraproduto.php">CADASTRA PRODUTO</a></li>

            <li><a href="listaproduto.php">LISTA PRODUTO</a></li>

            <li><a href="cadastracliente.php">CADASTRA CLIENTE</a></li>

            <li><a href="listacliente.php">LISTA CLIENTE</a></li>

            <li class="menuloja"><a href="logout.php">SAIR</a></li>

            <?php

            #ABERTO O PHP PARA VALIDAR SE A SESSÃO DO USUARIO ESTÁ ABERTA

            #SE SESSÃO ABERTA, FECHA O PHP PARA USAR ELEMENTOS HTML

            if ($nomeusuario != null) {

            ?>

                <!-- USO DO ELEMENTO HTML COM PHP INTERNO -->

                <li class="profile">OLÁ <?= strtoupper($nomecliente) ?></li>

            <?php

                #ABERTURA DE OUTRO PHP PARA CASO FALSE

            } else {

                echo "<script>window.alert('CLIENTE NÃO AUTENTICADO');

                        window.location.href='login.php';</script>";

            }

            #FIM DO PHP PARA CONTINUAR MEU HTML

            ?>

        </ul>

    </div>






    <!-- aqui lista os usuarios do banco-->

    <div id="background">

            <form action="listacliente.php" method="post">

                <input type="radio" name="ativo" class="radio" value="s" required onclick="submit()" <?=$ativo =='s'?"checked":""?>>ativo

                <input type="radio" name="ativo" class="radio" value="n" required onclick="submit()" <?=$ativo =='n'?"checked":""?>>ativo

            </form>

    </div>

            <div class="container">

                <table border="1">

                <tr>

                    <th>NOME</th>

                    <th>ALTERAR DADOS</th>

                    <th>ATIVO?</th>

                </tr>

                    <!--PHP-->

                    <?php

                    while($tbl = mysqli_fetch_array($retorno)){

                    ?>

                <tr>

                        <td><?= $tbl[1]?></td> <!--traz somente a coluna 1 do banco-->

                        <td><a href="alteracliente.php?=id<?= $tbl[0]?>">

                        <input type="button" value="ALTERAR DADOS"></a></td> <!--CRIANDO UM BOTAO ALTERAR PASSANDO O ID DO USUARIO NA URL VIA GET-->

                        <td><?=$check =($tbl [3] == 's')?"SIM":"NÃO"?></td> <!--valida s ou n e escreve sim e nao-->

                </tr>

                    <?php

                    }

                    ?>

                </table>




            </div>