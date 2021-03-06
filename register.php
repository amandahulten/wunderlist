<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article class="register">
    <h1>Register</h1>

    <?php if (isset($_SESSION['errors'])) : ?>
        <?php foreach ($_SESSION['errors'] as $error) : ?>
            <div class="error">
                <?= $error; ?>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['errors']) ?>
    <?php endif; ?>


    <form action="app/users/register.php" method="post">

        <div>
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="Choose something fun!" required>
        </div>

        <div>
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="example@gmail.com" required>

        </div>

        <div class="register-password">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>
            <small>Min 16 characters</small>
        </div>

        <button type="submit" class="btn" name="reg_user">Register</button>

    </form>
</article>


<?php require __DIR__ . '/views/footer.php'; ?>
