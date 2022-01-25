<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (isUserLoggedIn()) : ?>
    <section class="profile">

        <h1>Profile
            <hr style="width:100%">
        </h1>

        <?php if (isset($_SESSION['errors'])) : ?>
            <?php foreach ($_SESSION['errors'] as $error) : ?>
                <div class="error">
                    <?= $error; ?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['errors']) ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['completed'])) : ?>
            <?php foreach ($_SESSION['completed'] as $completed) : ?>
                <div class="message">
                    <?= $completed; ?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['completed']) ?>
        <?php endif; ?>

        <div class="profile-picture-flex">
            <?php if ($_SESSION['user']['avatar'] !== null) : ?>
                <div class="profile-picture-container">
                    <img src="/uploads/<?= $_SESSION['user']['avatar']; ?>" alt="A placeholder image when not modified and your profil picture when adding a picture below.">
                </div>
            <?php else : ?>
                <div class="profile-picture-container">
                    <img src="/uploads/placeholder.png" alt="Placeholder-image">
                </div>
            <?php endif; ?>
        </div>

        <div class="information">
            <h3>Username: <?= $_SESSION['user']['username'] ?></h3>
            <h3>Email: <?= $_SESSION['user']['email'] ?></h3>
        </div>
        <hr style="width: 100%;">

        <div class="form-upload-container">
            <h2>Upload/Change profile picture</h2>
            <form class="profile-form" action="/app/users/create-avatar.php" method="post" enctype="multipart/form-data">
                <div class="profile-upload">
                    <label for="avatar">Add profile picture:</label>
                    <input type="file" name="avatar" id="avatar" accept=".jpeg, .png" required>
                    <br>
                    <small>Accepted filetypes: jpeg and png.</small>
                </div>
                <button class="btn btn-profile">Upload</button>
            </form>
        </div>
        <hr>

        <div class="change-email-container">
            <h2>Change email</h2>
            <form action="/app/users/change-email.php" method="post">

                <label for="new-email">New email:</label>
                <input type="email" name="new-email" id="new-email">

                <button class="btn btn-profile">Submit</button>
            </form>
        </div>
        <hr>

        <div class="change-password-container">
            <h2>Change password</h2>
            <form action="/app/users/change-password.php" method="post">
                <label for="current-password">Current password:</label>
                <input type="password" name="current-password" id="current-password">

                <label for="new-password">New password:</label>
                <input type="password" name="new-password" id="new-password">

                <button class="btn btn-profile">Submit</button>
            </form>
        </div>
        <hr>
        <div class="delete-user-container">
            <h2>Delete user</h2>
            <p>This action will delete your profile and all of your lists and task. This can not be undone</p>
            <form action="/app/users/delete-user.php" method="post">
                <input type="hidden" name="id" value="<?php echo $user['id'] ?>">

                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>

                <button class="btn btn-profile">Delete</button>
            </form>
        </div>
    </section>
<?php endif; ?>

<?php require __DIR__ . '/views/footer.php'; ?>