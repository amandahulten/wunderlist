<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>



<article>
    <h1><?php echo $config['title']; ?></h1>

    <?php if (!isset($_SESSION['user'])) : ?>
        <p>Welcome to stress less! This is your website for a more structured life. Start by either <button><a href="/login.php">Login</a></button> or <button><a href="/register.php">Register</a></button>.</p>
    <?php endif; ?>




    <?php if (isset($_SESSION['user'])) : ?>
        <p>Welcome, <?php echo $_SESSION['user']['username']; ?>!</p>
    <?php endif; ?>

</article>

<?php require __DIR__ . '/views/footer.php'; ?>
