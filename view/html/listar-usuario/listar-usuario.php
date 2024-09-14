<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../../public/css/listar-usuario/style.css">
    <title>Listar Usuários</title>
</head>

<body>
    <div id="teste">Listar Usuário</div>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Data de Nascimento</th>
                <th>Idade</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once '../../controllers/UserController.php';

            if ($conn->connect_error) {
                die("Erro: Conexão com o banco não estabelecida.");
            }

            $userController = new UserController($conn);
            $usuarios = $userController->listarUsuarios();

            if (count($usuarios) > 0) {
                foreach ($usuarios as $usuario) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($usuario['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($usuario['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($usuario['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($usuario['data_nascimento']) . "</td>";
                    echo "<td>" . htmlspecialchars($usuario['idade']) . "</td>";
                    echo "<td><span id='icon-edit' style='cursor:pointer' class='material-symbols-outlined'>edit</span></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum usuário encontrado.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Editar Usuário</h2>
            <form method="POST" id="editForm" action="?page=salvar">
                <input type="hidden" name="acao" value="editar">
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" required><br><br>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required><br><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required><br><br>
                <label for="idade">Idade:</label>
                <input type="number" id="idade" name="idade" required><br><br>
                <input type="submit" value="Salvar">
            </form>
        </div>
    </div>

</body>

<script src="../../public/js/listar-usuario/index.js"></script>

</html>