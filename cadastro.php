<?php
// Estabeleça a conexão com o banco de dados
$servername = "localhost"; // Nome do servidor do banco de dados
$username = "root"; // Nome do usuário do banco de dados
$password = ""; // Senha do banco de dados
$dbname = "daily_tasks"; // Nome do banco de dados

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifique a conexão
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Recupere os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// Insira os dados na tabela
$sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

if (mysqli_query($conn, $sql)) {
    header("Location: index.html");
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conn);
}

// Feche a conexão com o banco de dados
mysqli_close($conn);
?>
