<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "projeto_gestao_testes";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Não é necessário imprimir "Conexão bem-sucedida!"

// Exemplo: Listar as tabelas do banco de dados apenas em ambiente de desenvolvimento
if (getenv('ENVIRONMENT') === 'development') {
    $result = $conn->query("SHOW TABLES");

    if ($result->num_rows > 0) {
        echo "<br>Tabelas disponíveis:<br>";
        while ($row = $result->fetch_assoc()) {
            echo $row["Tables_in_" . $dbname] . "<br>";
        }
    } else {
        echo "<br>Nenhuma tabela encontrada.";
    }
}

// Não feche a conexão aqui; ela será fechada quando o script terminar
?>
