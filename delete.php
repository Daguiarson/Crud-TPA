<?php
require('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Verifica se o parâmetro idAluno foi passado na URL
    if(isset($_GET["idAluno"])) {
        $id = $_GET["idAluno"];

        // Função para deletar o registro no banco de dados
        function excluirRegistro($pdo, $id) {
            $sql = "DELETE FROM alunos WHERE idAluno = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }

        // Chama a função para excluir o registro
        if (excluirRegistro($pdo, $id)) {
            echo "Registro excluído com sucesso!<br><a href='index.php'>HOME</a>";
        } else {
            echo 'Erro ao excluir o registro.';
        }
    } else {
        echo "ID do aluno não foi fornecido.";
    }
} else {
    echo "Este script aceita apenas requisições GET.";
}
