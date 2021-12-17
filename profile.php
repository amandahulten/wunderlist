<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<section class="profile">

    <h1>Profile</h1>


    <?php if (isset($_SESSION['errors'])) : ?>
        <?php foreach ($_SESSION['errors'] as $error) : ?>
            <div class="error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['errors']) ?>
    <?php endif; ?>


    <div class="profile-picture-container">
        <img class="profile-picture" src="/uploads/<?php echo $_SESSION['user']['avatar']; ?>" alt="A placeholder image when not modified and your profil picture when adding a picture below.">

        <form class="profile-form" action="/app/users/create-avatar.php" method="post" enctype="multipart/form-data">
            <div class="profile-upload">
                <label for="avatar">Add or change profile picture:</label>
                <input type="file" name="avatar" id="avatar" accept=".jpeg, .png" required>
            </div>
            <button class="btn upload">Upload</button>

        </form>
    </div>

    <div class="change-email-container">
        <h2>Change email</h2>
        <form action="/app/users/change-email.php" method="post">
            <label for="current-email">Current email:</label>
            <input type="email" name="current-email" id="current-email">

            <label for="new-email">New email:</label>
            <input type="email" name="new-email" id="new-email">

            <button class="btn profile">Submit</button>
        </form>
    </div>

    <div class="change-password-container">
        <h2>Change password</h2>
        <form action="/app/users/change-password.php" method="post">
            <label for="current-password">Current password:</label>
            <input type="password" name="current-password" id="current-password">

            <label for="new-password">New password:</label>
            <input type="password" name="new-password" id="new-password">

            <button class="btn profile">Submit</button>
        </form>
    </div>
</section>

<?php require __DIR__ . '/views/footer.php'; ?>