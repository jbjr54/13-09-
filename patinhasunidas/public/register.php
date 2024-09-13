<main>
    <section class="container_jogos">
        <h1>Cadastrar-se</h1>
        <form action="php/signup_process.php" method="post" class="auth-form">
            <label for="fullname">Nome Completo:</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="username">Usuário:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirmar Senha:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button type="submit" class="auth-btn">Cadastrar</button>

            <?php
            if (isset($_GET['error'])) {
                echo '<p class="error-message">Por favor, verifique os dados fornecidos.</p>';
            }
            ?>
        </form>
    </section>
</main>