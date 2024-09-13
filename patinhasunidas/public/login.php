<main>
        <section class="container_jogos">
            <h1>Iniciar Sessão</h1>
            <form action="../private/login_process.php" target="_self" method="post" class="auth-form">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" class="auth-btn">Entrar</button>

                <?php
                if (isset($_GET['error'])) {
                    echo '<p class="error-message">Usuário ou senha incorretos.</p>';
                }
                ?>
            </form>
        </section>
</main>  