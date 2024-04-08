<?php
include_once('conexao.php');

$nome_cidade = $_POST["cidade"];
$uf_cidade = $_POST["uf"];

$erroCidade = "";
$erroUf = "";

    if (trim($nome_cidade) == "") {
        $erroCidade = "Campo de preenchimento obrigatório.";
    }
    if (trim($uf_cidade) == "") {
        $erroUf = "Campo de preenchimento obrigatório.";
    }

$sqlInsert = "INSERT INTO cidades (cidade, uf)
            VALUES ('$nome_cidade', '$uf_cidade')";

$resultado = mysqli_query($conexao, $sqlInsert);

if (!$resultado) {
    die('Não foi possivel cadastrar. Descrição: ' . mysqli_error($conexao));
} else {
    echo "Registro Cadastro com Sucesso";
}
mysqli_close($conexao);
