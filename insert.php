<?php
echo "Inserindo dados abaixo... <br>";
require ('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo $nome = $_POST["nome"];
    echo $email = $_POST["email"];
    echo $sexo = $_POST["sexo"];
    echo $endereco = $_POST["endereco"];
    echo $numero = $_POST["numero"];
    echo $complemento = $_POST["complemento"];
    echo $bairro = $_POST["bairro"];
    echo $cidade = $_POST["cidade"];
    echo $uf = $_POST["uf"];
    echo $modalidade = $_POST["modalidade"];
    echo "<hr>";

    // Função para inserir um novo registro no banco de dados
    function inserirRegistro($pdo, $nome, $email, $sexo, $endereco, $numero, $complemento, $bairro, $cidade, $uf, $modalidade) {
        $sql = "INSERT INTO alunos (nome, email, sexo, endereco, numero, complemento, bairro, cidade, uf, modalidade) VALUES (:nome, :email, :sexo, :endereco, :numero, :complemento, :bairro, :cidade, :uf, :modalidade)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR);
        $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
        $stmt->bindParam(':numero', $numero, PDO::PARAM_STR);
        $stmt->bindParam(':complemento', $complemento, PDO::PARAM_STR);
        $stmt->bindParam(':bairro', $bairro, PDO::PARAM_STR);
        $stmt->bindParam(':cidade', $cidade, PDO::PARAM_STR);
        $stmt->bindParam(':uf', $uf, PDO::PARAM_STR);
        $stmt->bindParam(':modalidade', $modalidade, PDO::PARAM_STR);

        return $stmt->execute();
    }
}

if (inserirRegistro($pdo, $nome, $email, $sexo, $endereco, $numero, $complemento, $bairro, $cidade, $uf, $modalidade)) {
    echo "Registro inserido com sucesso!<br>" . "<a href='index.php'>HOME</a>";
} else {
    echo 'Erro ao inserir o registro.';
}
