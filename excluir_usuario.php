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
    <h3>Excluir Usuário</h3>
    <?php
        include_once('conexao.php');

        $id = $_GET['id'];

        $sqlDelete = "DELETE FROM usuarios WHERE id = $id";

        $resultado = mysqli_query($conexao, $sqlDelete);

        if(!$resultado){
            die('Não foi possivel excluir. Descrição:' . mysqli_error($conexao));
        } else {
            echo "Registro Excluido com Sucesso";
        }

        mysqli_close($conexao);
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>