<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Chat Particular</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>Primeiro Nome</label>
                        <input type="text" name="nome" placeholder="Digite o seu nome" required>
                    </div>
                    <div class="field input">
                        <label>Sobrenome</label>
                        <input type="text" name="sobrenome" placeholder="Sobrenome" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Digite o seu email" required>
                </div>
                <div class="field input">
                    <label>Senha</label>
                    <input type="password" name="senha" placeholder="Digite a sua senha para cadastro" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label>Imagem</label>
                    <input type="file" name="img">
                </div>
                <div class="field button">
                    <input type="submit" value="Continuar">
                </div>
            </form>
            <div class="link">Já tem uma conta? <a href="login.php">Login</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>
</body>
</html>