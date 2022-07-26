<?php
    session_start();
    include_once "config.php";
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $sobrenome = mysqli_real_escape_string($conn, $_POST['sobrenome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    if(!empty($nome) && !empty($sobrenome) && !empty($email) && !empty($senha)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - Esse email já existe";
            }else{
                if(isset($_FILES['img'])){
                    $img_nome = $_FILES['img']['name'];
                    $tmp_nome = $_FILES['img']['tmp_name'];

                    $img_explode = explode('.', $img_nome);
                    $img_ext = end($img_explode);

                    $extensoes = ['png', 'jpeg', 'jpg'];
                    if(in_array($img_ext, $extensoes) === true){
                        $hora = time();

                        $novo_nome = $hora.$img_nome;
                        
                        if(move_uploaded_file($tmp_nome, 'imagens/'.$novo_nome)){
                            $status = "Online";
                            $id_aleatorio = rand(time(), 10000000);

                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, nome, sobrenome, email, senha, img, status)
                                                 VALUES ('$id_aleatorio', '$nome', '$sobrenome', '$email', '$senha', '$novo_nome', '$status')");
                            if($sql2){
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $linha = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $linha['unique_id'];
                                    echo "Sucesso";
                                }
                            }else{
                                echo "Algo deu errado no cadastro!";
                            }
                        }
                    }else{
                        echo "Por favor escolha um formato de imagem valido - png, jpeg, jpg";
                    }
                }else{
                    echo "Por favor escolha uma imagem";
                }
            }
        }else{
            echo "$email - Esse email não é valido";
        }
    }else{
        echo 'Por favor preencha todos os campos';
    }
?>