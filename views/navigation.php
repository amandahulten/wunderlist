<nav>

    <div class="title">
        <a href="/index.php"><?php echo $config['title']; ?></a>
    </div>

    <div class="hamburger">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/../index.php">Home</a>
        </li>
        <?php if (!isUserLoggedIn()) : ?>
            <li class="nav-item">
                <a class="nav-link" href="/../login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/../register.php">Register</a>
            </li>
        <?php endif; ?>

        <?php if (isUserLoggedIn()) : ?>

            <li class="nav-item">
                <a class="nav-link" href="/../profile.php">Profile</a>
            </li>

            <li class="nav-item logout">
                <a class="nav-link" href="/app/users/logout.php">Logout</a>
            </li>
    </ul>
<?php endif; ?>

</nav>
