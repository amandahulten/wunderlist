<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Register</h1>

    <form action="app/users/register.php" method="post">

        <div class="">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" required>

        </div>

        <div class="">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" required>
        </div>

        <div class="">
            <label for="passwordRep">Repeat password</label>
            <input class="form-control" type="passwordRep" name="passwordRep" id="passwordRep" required>
        </div>

        <button type="submit" class="btn" name="reg_user">Register</button>

    </form>
</article>


<?php require __DIR__ . '/views/footer.php'; ?>
