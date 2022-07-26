<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
?>

<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="users">
           <header>
            <?php
            include_once "php/config.php";
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$_SESSION['unique_id']}'");
                if(mysqli_num_rows($sql) > 0){
                    $linha = mysqli_fetch_assoc($sql);
                }
            ?>
             <div class="content">
                <img src="php/imagens/<?php echo $linha['img']; ?>" alt="">
                <div class="details">
                    <span><?php echo $linha['nome'] . " " . $linha['sobrenome']; ?></span>
                    <p><?php echo $linha['status']; ?></p>
                </div>
             </div>
             <a href="php/logout.php?logout_id=<?php echo $linha['unique_id'] ?>" class="logout">Logout</a>
           </header>
           <div class="search">
            <span class="text">Selecione um usuario para comecar a conversa</span>
            <input type="text" placeholder="Digite o nome para a busca">
            <button><i class="fas fa-search"></i></button>
           </div>
           <div class="users-list">
            
           </div>
        </section>
    </div>
    <script src="javascript/users.js"></script>
</body>
</html>