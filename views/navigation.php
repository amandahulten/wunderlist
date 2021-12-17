<nav>
    <div><?php echo $config['title']; ?></div>

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/../index.php">Home</a>
        </li>

        <?php if (isset($_SESSION['user'])) : ?>
            <li class="nav-item">
                <a class="nav-link" href="/../profile.php">Profile</a>
            </li>
        <?php endif; ?>

        <li class="nav-item">
            <?php if (isset($_SESSION['user'])) : ?>
                <a class="nav-link" href="/app/users/logout.php">Logout</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>
