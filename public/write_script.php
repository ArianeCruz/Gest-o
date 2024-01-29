<!-- public/write_script.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="../css/form_style.css">
    <title>Escrever Script</title>
</head>
<body>
    <div id="scriptFormContainer">
        <div class="menu">
            <ul>
                <a href="dashboard.php">Home</a>
                <a href="#">Outra Opção</a>
                <a href="write_script.php">Escrever Script</a>
            </ul>
        </div>

        <h2 id="titleLogin">Escrever Script</h2>
        
        <form id="scriptForm" action="../src/write_script_backend.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Título:</label>
                <textarea id="title" name="title" required></textarea>
            </div>  
            <div class="form-group">
                <label for="testEnvironment">Ambiente de Teste:</label>
                <textarea id="testEnvironment" name="testEnvironment" required></textarea>
            </div>
            <div class="form-group">
                <label for="executionSteps">Passos de Execução:</label>
                <textarea id="executionSteps" name="executionSteps" required></textarea>
            </div>
            <div class="form-group">
                <label for="inputData">Dados de Entrada:</label>
                <textarea id="inputData" name="inputData" required></textarea>
            </div>
            <div class="form-group">
                <label for="expectedResults">Resultados Esperados:</label>
                <textarea id="expectedResults" name="expectedResults" required></textarea>
            </div>
            <div class="form-group">
                <label for="evaluationConditions">Condições de Avaliação:</label>
                <textarea id="evaluationConditions" name="evaluationConditions" required></textarea>
            </div>
            <div class="form-group">
                <label for="variableSection">Variável:</label>
                <textarea id="variableSection" name="variableSection" required></textarea>
            </div>
            <div class="form-group">
                <label for="category">Categoria:</label>
                <select id="category" name="category">
                    <option value="funcionalidade">Funcionalidade</option>
                    <option value="desempenho">Desempenho</option>
                    <option value="seguranca">Segurança</option>
                    <!-- Adicione mais opções de categoria conforme necessário -->
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="attachments">Anexar Arquivos:</label>
                <input id="anexarInput" type="file" id="attachments" name="attachments" accept=".jpg, .jpeg, .png, .pdf">
                <button type="submit">Salvar Script</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/dashboard.js"></script>
    <script src="../js/write_script.js"></script>
</body>
</html>