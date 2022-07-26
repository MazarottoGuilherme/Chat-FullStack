<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $output = "";
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (nome LIKE '%$searchTerm%' OR sobrenome LIKE '%$searchTerm%')");
    if(mysqli_num_rows($sql) > 0){
        include_once "data.php";
        echo $output;
    }else{
        $output .=  "Nenhum usuário encontrado";
        echo $output;
    }
?>