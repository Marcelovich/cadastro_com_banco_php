<?php
$nome_cidade = "";
$uf_cidade = "";

$erroCidade = "";
$erroUf = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_cidade = $_POST["cidade"];
    $uf_cidade = $_POST["uf"];

    if (trim($nome_cidade) == "") {
        $erroCidade = "Campo de preenchimento obrigatório.";
    }
    if (trim($uf_cidade) == "") {
        $erroUf = "Campo de preenchimento obrigatório.";
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
        <form class="row" action="cadastro_cidade.php" method="post">
            <legend class="text-primary">Cadastro de cidades</legend>

            <div class="row">
                <div class="col-6">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input id="cidade" type="text" name="cidade" class="form-control <?php echo ($erroCidade != '' ? 'is-invalid' : '') ?>" value="<?php echo $nome_cidade ?>" maxlength="30">
                    <div class="invalid-feedback">
                        <?php echo $erroCidade ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="uf" class="form-label">UF</label>
                    <input id="uf" type="text" name="uf" class="form-control <?php echo ($erroUf != '' ? 'is-invalid' : '') ?>" value="<?php echo $uf_cidade ?>" maxlength="2">
                    <div class="invalid-feedback">
                        <?php echo $erroUf ?>
                    </div>
                </div>
            </div>

            <div class="col-auto mt-3">
                <label for="btnCadastrar"></label>
                <button id="btnCadastrar" name="btnCadastrar" type="submit" class="btn btn-primary mb-3">Enviar</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>