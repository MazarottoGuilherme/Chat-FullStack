<?php
    $conn = mysqli_connect('localhost', 'root', '', 'chat');
    if(!$conn){
        echo "Erro ao se conectar na base de dados:" .mysqli_connect_error();
    }
?>