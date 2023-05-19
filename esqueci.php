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
$email = $_POST['email'];
$nova_senha = trim($_POST['senha']);
// Verifique se o email existe no banco de dados
$sql_verificar = "SELECT * FROM usuario WHERE email = '$email'";
$resultado = mysqli_query($conn, $sql_verificar);

if (mysqli_num_rows($resultado) == 1) {
    // Atualize a senha no banco de dados
    $senha_hash_nova = password_hash($nova_senha, PASSWORD_DEFAULT);
    $sql_atualizar = "UPDATE usuario SET senha = '$senha_hash_nova' WHERE email = '$email'";
    
    if (mysqli_query($conn, $sql_atualizar)) {
        echo "Senha alterada com sucesso!";
    } else {
        echo "Erro ao atualizar a senha: " . mysqli_error($conn);
    }
} else {
    echo "Email não encontrado!";
}

// Feche a conexão com o banco de dados
mysqli_close($conn);
?>
