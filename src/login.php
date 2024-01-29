<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar se os campos estão preenchidos
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        echo "Por favor, preencha todos os campos.";
        exit();
    }

    // Conectar ao banco de dados (você deve incluir a lógica de conexão aqui)
    include("db/config.php");

    // Limpar e validar dados de entrada
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Consultar o banco de dados para verificar as credenciais
    $query = "SELECT id, password_hash, role FROM users WHERE username = '$username' LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userId = $row['id'];
        $hashedPassword = $row['password_hash'];
        $role = $row['role'];

        // Verificar a senha
        if ($password == $hashedPassword) {
            // Definir variáveis de sessão
            $_SESSION['user_id'] = $userId;
            $_SESSION['role'] = $role;

            // Usuário autenticado, redirecionar para o dashboard
            header("Location: ../public/dashboard.php");
            exit();
        } else {
            // Credenciais inválidas
            echo "Credenciais inválidas.";
        }
    } else {
        // Usuário não encontrado
        echo "Usuário não encontrado.";
    }

    // Fechar a conexão
    $conn->close();
}
?>