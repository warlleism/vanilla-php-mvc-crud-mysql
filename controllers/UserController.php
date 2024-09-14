<?php
class UserController
{
    private $conn;

    // Construtor que recebe a conexão
    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    public function listarUsuarios()
    {
        $sql = "SELECT id, nome, email, data_nascimento, idade FROM alunos";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function cadastrar($dados)
    {
        $nome = $dados["nome"] ?? null;
        $email = $dados["email"] ?? null;
        $senha = $dados["senha"] ?? null;
        $data_nascimento = $dados["data_nascimento"] ?? null;
        $idade = $dados["idade"] ?? null;

        if ($nome && $email && $senha && $data_nascimento && $idade) {
            $stmt = $this->conn->prepare("INSERT INTO alunos (nome, email, senha, data_nascimento, idade) VALUES (?, ?, ?, ?, ?)");
            $senha_hash = password_hash($senha, PASSWORD_BCRYPT);
            $stmt->bind_param("ssssi", $nome, $email, $senha_hash, $data_nascimento, $idade);

            if ($stmt->execute()) {
                return "
                <div class='container-list-alunos'>
                    <div>" . htmlspecialchars($nome) . "</div>
                    <div>" . htmlspecialchars($email) . "</div>
                    <div>" . htmlspecialchars($data_nascimento) . "</div>
                    <div>" . htmlspecialchars($idade) . "</div>
                </div>";
            } else {
                return "Erro: " . $stmt->error;
            }
        } else {
            return "Preencha todos os campos corretamente.";
        }
    }

    // Função para editar um aluno existente
    public function editar($dados)
    {
        $id = $dados["id"] ?? null;
        $nome = $dados["nome"] ?? null;
        $email = $dados["email"] ?? null;
        $data_nascimento = $dados["data_nascimento"] ?? null;
        $idade = $dados["idade"] ?? null;

        if ($id && $nome && $email && $data_nascimento && $idade) {
            $stmt = $this->conn->prepare("UPDATE alunos SET nome = ?, email = ?, data_nascimento = ?, idade = ? WHERE id = ?");
            $stmt->bind_param("sssii", $nome, $email, $data_nascimento, $idade, $id);

            if ($stmt->execute()) {
                return "
                <div class='container-list-alunos'>
                    <div>ID: " . htmlspecialchars($id) . "</div>
                    <div>Nome: " . htmlspecialchars($nome) . "</div>
                    <div>Email: " . htmlspecialchars($email) . "</div>
                    <div>Data de Nascimento: " . htmlspecialchars($data_nascimento) . "</div>
                    <div>Idade: " . htmlspecialchars($idade) . "</div>
                </div>";
            } else {
                return "Erro: " . $stmt->error;
            }
        } else {
            return "Preencha todos os campos corretamente.";
        }
    }

    // Função para excluir um aluno
    public function excluir($id)
    {
        if ($id) {
            $stmt = $this->conn->prepare("DELETE FROM alunos WHERE id = ?");
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                return "Usuário excluído com sucesso!";
            } else {
                return "Erro: " . $stmt->error;
            }
        } else {
            return "ID inválido.";
        }
    }
}
?>