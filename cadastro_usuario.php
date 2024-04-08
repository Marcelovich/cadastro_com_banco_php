<?php
include_once('conexao.php');

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$senha = md5($senha);
$email = $_POST["email"];

$erroUsuario = "";
$erroSenha = "";
$erroEmail = "";

    if (trim($usuario) == "") {
        $erroUsuario = "Campo de preenchimento obrigatório.";
    }
    if (trim($senha) == "") {
        $erroSenha = "Campo de preenchimento obrigatório.";
    }
    if (trim($email) == "") {
        $erroEmail = "Campo de preenchimento obrigatório.";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erroEmail = "O e-mail informado não é válido";
        }
    }

$sqlInsert = "INSERT INTO usuarios (usuario, senha, email)
            VALUES ('$usuario', '$senha', '$email')";

$resultado = mysqli_query($conexao, $sqlInsert);

if(!$resultado){
    die('Não foi possivel cadastrar. Descrição: '. mysqli_error($conexao));
} else {
    echo "Registro Cadastro com Sucesso";
}
mysqli_close($conexao);
?>