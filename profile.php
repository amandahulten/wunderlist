<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (isset($_SESSION['errors'])) : ?>
    <?php foreach ($_SESSION['errors'] as $error) : ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <?php unset($_SESSION['errors']) ?>
<?php endif; ?>

<img class="profile-picture" src="/uploads/<?php echo $_SESSION['user']['avatar']; ?>" alt="">



<form action="/app/users/create-avatar.php" method="post" enctype="multipart/form-data">
    <div>
        <label for="avatar">Add or change profile picture:</label>
        <input type="file" name="avatar" id="avatar" accept=".jpeg, .png" required>
    </div>
    <button class="btn">Upload</button>


</form>

<?php require __DIR__ . '/views/footer.php'; ?>
