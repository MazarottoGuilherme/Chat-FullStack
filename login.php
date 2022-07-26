<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Chat Particular</header>
            <form action="#">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Digite o seu email">
                </div>
                <div class="field input">
                    <label>Senha</label>
                    <input type="password" name="senha" placeholder="Digite a sua senha para login">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Continuar">
                </div>
            </form>
            <div class="link">Ainda não tem uma conta? <a href="index.php">Cadastro</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>
</html>