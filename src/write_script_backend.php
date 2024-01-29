<?php
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Incluir o arquivo de configuração do banco de dados
include("db/config.php");

// Verificar a conexão com o banco de dados
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Criar diretório de upload se não existir
$uploadDir = "upload/";

if (!file_exists($uploadDir) && !is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Utilizar a função mysqli_real_escape_string para evitar SQL injection
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $testEnvironment = mysqli_real_escape_string($conn, $_POST["testEnvironment"]);
    $executionSteps = mysqli_real_escape_string($conn, $_POST["executionSteps"]);
    $inputData = mysqli_real_escape_string($conn, $_POST["inputData"]);
    $expectedResults = mysqli_real_escape_string($conn, $_POST["expectedResults"]);
    $evaluationConditions = mysqli_real_escape_string($conn, $_POST["evaluationConditions"]);
    $variableSection = mysqli_real_escape_string($conn, $_POST["variableSection"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]);

    // Verificar se há um arquivo enviado
    if (isset($_FILES["attachments"])) {
        $fileName = basename($_FILES["attachments"]["name"]);
        $filePath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES["attachments"]["tmp_name"], $filePath)) {
            // Upload bem-sucedido
        } else {
            echo "Erro ao fazer o upload do arquivo: " . $_FILES["attachments"]["error"];
            exit();
        }
    } else {
        $filePath = ''; // Se nenhum arquivo foi enviado, define como string vazia
    }

    $userId = $_SESSION['user_id'];

    // Usar instrução preparada para segurança
    $stmt = $conn->prepare("INSERT INTO scripts (user_id, title, test_environment, execution_steps, input_data, expected_results, evaluation_conditions, variable_section, category, file_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $userId, $title, $testEnvironment, $executionSteps, $inputData, $expectedResults, $evaluationConditions, $variableSection, $category, $filePath);

    if ($stmt->execute()) {
        echo "Script salvo com sucesso!";
    } else {
        echo "Erro ao salvar o script: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Acesso inválido ao script.";
}

// Fechar a conexão
$conn->close();
?>
