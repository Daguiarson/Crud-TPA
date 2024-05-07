<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alunos</title>
</head>
<body>
    <div class="container">
        <h1>Editar Aluno</h1>
        <?php
        require('conn.php');

        // Verifica se o parâmetro idAluno foi passado na URL
        if (isset($_GET["idAluno"])) {
            $id = $_GET["idAluno"];

            // Função para buscar o registro do aluno no banco de dados
            function buscarAluno($pdo, $id) {
                $sql = "SELECT * FROM alunos WHERE idAluno = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }

            // Buscar o aluno com o ID fornecido
            $registro = buscarAluno($pdo, $id);

            // Se o aluno foi encontrado, exibir o formulário de edição
            if ($registro) {
        ?>
        <form action="update.php" method="post">
            <input type="hidden" name="idAluno" value="<?php echo $registro['idAluno']; ?>">
            <label for="nome">Nome</label>
            <input type="text" name="nome" value="<?php echo $registro['nome']; ?>" required>
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $registro['email']; ?>" required>
            <label>Sexo</label><br>
            <input type="radio" id="M" name="sexo" value="M" <?php echo ($registro['sexo'] == 'M') ? 'checked' : ''; ?>>
            <label for="M">Masculino</label>
            <input type="radio" id="F" name="sexo" value="F" <?php echo ($registro['sexo'] == 'F') ? 'checked' : ''; ?>>
            <label for="F">Feminino</label>
            <input type="radio" id="O" name="sexo" value="O" <?php echo ($registro['sexo'] == 'O') ? 'checked' : ''; ?>>
            <label for="O">Outro</label><br>
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" value="<?php echo $registro['endereco']; ?>">
            <label for="numero">Número</label>
            <input type="text" name="numero" value="<?php echo $registro['numero']; ?>">
            <label for="complemento">Complemento</label>
            <input type="text" name="complemento" value="<?php echo $registro['complemento']; ?>"><br>
            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" value="<?php echo $registro['bairro']; ?>">
            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" value="<?php echo $registro['cidade']; ?>">
            <label for="uf">UF</label>
            <select name="uf">
                <option value="AC" <?php echo ($registro['uf'] == 'AC') ? 'selected' : ''; ?>>Acre</option>
                <option value="AL" <?php echo ($registro['uf'] == 'AL') ? 'selected' : ''; ?>>Alagoas</option>
                <!-- Adicione as outras opções aqui -->
            </select><br>
            <label for="modalidade">Modalidade</label>
            <select name="modalidade">
                <option value="Natação" <?php echo ($registro['modalidade'] == 'Natação') ? 'selected' : ''; ?>>Natação</option>
                <option value="Pilates" <?php echo ($registro['modalidade'] == 'Pilates') ? 'selected' : ''; ?>>Pilates</option>
                <!-- Adicione as outras opções aqui -->
            </select>
            <button type="submit">Salvar</button>
        </form>
        <?php
            } else {
                // Se o aluno não foi encontrado, exibir mensagem de erro
                echo "<p>Aluno não encontrado.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
