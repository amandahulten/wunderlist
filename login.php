<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<article>
    <h1>Login</h1>

    <form action="app/users/login.php" method="post">
        <div class="">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" required>
            <small class="form-text">Please provide the your email address.</small>
        </div>

        <div class="">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>
            <small class="form-text">Please provide the your password (passphrase).</small>
        </div>

        <button type="submit" class="">Login</button>
        <p>Are you new to this site? Register <a href="/register.php">here</a>!</p>
    </form>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
