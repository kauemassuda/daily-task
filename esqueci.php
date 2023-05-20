<?php
// Estabeleça a conexão com o banco de dados
$servername = "localhost"; // Nome do servidor do banco de dados
$username = "root"; // Nome do usuário do banco de dados
$password = ""; // Senha do banco de dados
$dbname = "daily_tasks"; // Nome do banco de dados

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
// Obtém os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];
$t = $_POST['jioehdshsfbrjhfghdhffdshfkjerhhyufgye'];
// Verifica se a nova senha e a confirmação da senha coincidem
if ($senha != $t) {
    // Atualiza a senha no banco de dados
    $sql = "UPDATE usuario SET senha = '$senha' WHERE email = '$email'";
    if ($conn->query($sql) === TRUE) {
        header("Location: senhatrocada.html");
    } else {
        echo "Erro ao alterar a senha: " . $conn->error;
    }
}   

// Fecha a conexão com o banco de dados
$conn->close();
?>
