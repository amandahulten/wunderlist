<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<article class="login">
    <h1>Login</h1>

    <?php if (isset($_SESSION['errors'])) : ?>
        <?php foreach ($_SESSION['errors'] as $error) : ?>
            <div class="error">
                <?= $error; ?>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['errors']) ?>
    <?php endif; ?>

    <form action="app/users/login.php" method="post">
        <div>
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>
        </div>

        <button type="submit" class="btn">Login</button>
        <p>Are you new to this site? Register <u><a href="/register.php">here</a></u>!</p>
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
