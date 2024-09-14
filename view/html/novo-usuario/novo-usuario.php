<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cadastro de Alunos</title>
</head>

<body>
    <div id="teste">Novo Aluno</div>

    <form method="POST" action="?page=salvar">
        <input type="hidden" name="acao" value="cadastrar">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
        </div>

        <div>
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required>
        </div>

        <div>
            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" required>
        </div>

        <button type="submit">Cadastrar</button>
    </form>


    <?php
    /*
    switch (@$_REQUEST["acao"]) {
        case 'cadastrar':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
            $data_nascimento = $_POST["data_nascimento"];
            $idade = $_POST["idade"];

            $nome = $conn->real_escape_string($nome);
            $email = $conn->real_escape_string($email);
            $data_nascimento = $conn->real_escape_string($data_nascimento);
            $idade = $conn->real_escape_string($idade);

            $sql = "INSERT INTO alunos (nome, email, senha, data_nascimento, idade) VALUES ('$nome', '$email', '$senha', '$data_nascimento', '$idade')";
            $result = $conn->query($sql);

            if ($result) {
                print "
                <div class='container-list-alunos'>
                    <div>{$nome}</div>
                    <div>{$email}</div>
                    <div>{$data_nascimento}</div>
                    <div>{$idade}</div>
                </div>";
            } else {
                print "Erro: " . $conn->error;
            }
        case 'editar':
            break;
        case 'excluir':
            break;
    }
            */
    ?>

    <script src="../../js/index.js"></script>
</body>

</html>