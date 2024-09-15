<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
</head>

<body>

    <?php
    require_once '../../controllers/UserController.php';

    $controller = new UserController($conn);

    $acao = $_REQUEST['acao'] ?? 'default';

    switch ($acao) {
        case 'cadastrar':
            echo $controller->cadastrar($_POST);
            break;

        case 'editar':
            echo $controller->editar($_POST);
            break;

        case 'excluir':
            $id = $_POST['id'] ?? null;
            echo $controller->excluir($id);
            break;
        default:
            echo "Ação inválida.";
            break;
    }
    ?>

</body>

</html>