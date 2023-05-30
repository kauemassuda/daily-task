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

// Verifique se o formulário foi enviado
//if (isset($_POST['eventTitle'])) {
    // Recupere os dados do formulário
    $id_usuario = 1;
    $titulo = $_POST['eventTitle'];
    $data_evento = '2023-30-05';
    $horai = $_POST['eventTimeFrom'];
    $horaf = $_POST['eventTimeTo'];
    
    // Valide as horas
    //$hora_valida = date('H:i', strtotime($hora));
    //$horaf_valida = date('H:i', strtotime($horaf));

    //if ($hora_valida === false || $horaf_valida === false) {
        //echo "Formato de hora inválido!";
        //exit(); // Encerra o script
    //}

    // Insira os dados na tabela
    $sql = "INSERT INTO evento (Id_usuario, Titulo, Data_evento, Hora_inicio, Hora_fin) VALUES ($id_usuario, '$titulo', $data_evento, '$horai', '$horaf')";
    //$sql = "INSERT INTO evento (Id_usuario, Titulo, Data_evento, Hora_inicio, Hora_fin) VALUES (1, 'teste 30', '2023-05-30', '12:30', '14:30')";

    if (mysqli_query($conn, $sql)) {
        header("Location: calendarioindex.html");
    } else {
        echo "Erro ao cadastrar evento: " . mysqli_error($conn);
    }
//}
