<?php
$usuario = "";
$senha = "";
$email = "";

$erroUsuario = "";
$erroSenha = "";
$erroEmail = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $email = $_POST["email"];

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
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cadastro</title>

</head>

<body>

    <div class="d-flex justify-content-center">
        <form class="row" action="cadastro_usuario.php" method="post">
            <legend class="text-primary">Cadastro de usuário</legend>
            <div class="row">
                <div class="col-6">
                    <label for="usuario" class="form-label">Usuario:</label>
                    <input id="usuario" type="text" name="usuario" class="form-control <?php echo ($erroUsuario != '' ? 'is-invalid' : '') ?>" value="<?php echo $usuario ?>" maxlength="20">
                    <div class="invalid-feedback">
                        <?php echo $erroUsuario ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="senha" class="form-label">Senha:</label>
                    <input id="senha" type="password" name="senha" class="form-control <?php echo ($erroSenha != '' ? 'is-invalid' : '') ?>" value="<?php echo $senha ?>" maxlength="20"> <br> <button type="button" class="btn btn-primary mb-3" id="mostrarSenha"> Mostrar senha </button>
                        <div class="invalid-feedback">
                            <?php echo $erroSenha ?>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="text" name="email" class="form-control <?php echo ($erroEmail != '' ? 'is-invalid' : '') ?>" value="<?php echo $email ?>">
                    <div class="invalid-feedback">
                        <?php echo $erroEmail ?>
                    </div>
                </div>
            </div>
            <div class="col-auto mt-3">
                <label for="btnCadastrar"></label>
                <button id="btnCadastrar" name="btnCadastrar" type="submit" class="btn btn-primary mb-3">Enviar</button>
            </div>
            <!-- -->
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <script>
        const input = document.getElementById("senha");
        const button = document.getElementById("mostrarSenha");
        button.addEventListener('click', mostrarSenha);

        function mostrarSenha() {
            if (input.type == "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }
    </script>


</body>

</html>