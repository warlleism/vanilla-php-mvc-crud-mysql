<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php">Início</a></li>
            <li><a href="?page=novo">Novo usuário</a></li>
            <li><a href="?page=listar">Listar usuários</a></li>
            <li><a href="?page=editar">Editar usuários</a></li>
        </ul>
    </nav>

    <div class="contaienr">
        <?php
        include("config.php");
        switch (@$_REQUEST["page"]) {
            case 'novo':
                include 'novo-usuario/novo-usuario.php';
                break;
            case 'listar':
                include 'listar-usuario/listar-usuario.php';
                break;
            case 'salvar':
                include 'salvar-usuario/salvar-usuario.php';
                break;
            case 'editar':
                include 'editar-usuario/editar-usuario.php';
                break;
            default:
                print "<h1>Bem Vindos!</h1>";
        }
        ?>
    </div>
</body>

</html>