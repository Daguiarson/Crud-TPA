<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Alunos</title>
</head>
<body>
    <h1>Cadastro de Alunos</h1>
    <a href="create.php">Adicionar Novo Aluno</a>
    <?php
        require ('conn.php');
        // Função para listar todos os registros do banco de dados
            function listarRegistros($pdo) {
                $sql = "SELECT * FROM alunos";
                $stmt = $pdo->query($sql);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            // Listar registros
            $registros = listarRegistros($pdo);
            // Exibindo os dados em uma tabela
            echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Sexo</th>
                    <th>Endereço</th>
                    <th>Número</th>
                    <th>Complemento</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Uf</th>
                    <th>Modalidade</th>
                </tr>";
                foreach ($registros as $registro) {
                    echo "<tr>";
                    echo "<td>" . $registro['idAluno'] . "</td>";
                    echo "<td>" . $registro['nome'] . "</td>";
                    echo "<td>" . $registro['email'] . "</td>";
                    echo "<td>" . $registro['sexo'] . "</td>";
                    echo "<td>" . $registro['endereco'] . "</td>";
                    echo "<td>" . $registro['numero'] . "</td>";
                    echo "<td>" . $registro['complemento'] . "</td>";
                    echo "<td>" . $registro['bairro'] . "</td>";
                    echo "<td>" . $registro['cidade'] . "</td>";
                    echo "<td>" . $registro['uf'] . "</td>";
                    echo "<td>" . $registro['modalidade'] . "</td>";
                
                    echo "<td>
                        <a href='edit.php?idAluno=" . $registro['idAluno'] . "'>Editar</a>
                        <a href='delete.php?idAluno=" . $registro['idAluno'] . "'>Excluir</a>
                    </td>";
                }
                    echo "</tr>";
            echo "</table>";
        ?>
</body>
</html>
