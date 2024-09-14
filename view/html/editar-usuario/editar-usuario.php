<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
</head>

<body>
    <div id="teste">Editar Aluno</div>

    <form method="POST" action="?page=salvar">
        <input type="hidden" name="acao" value="editar">

        <input id="id" name="id" value="0">

        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required>
        </div>

        <div>
            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" required>
        </div>

        <button type="submit">Atualizar</button>
    </form>

</body>

</html>