<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (isUserLoggedIn()) : ?>
    <?php $listId = $_GET['id']; ?>

    <div class="change-task-container">
        <h1>Change listname
            <hr style="width:100%">
        </h1>

        <form action="/app/lists/update.php?id=<?= $listId; ?>" method="post">

            <label for="new-title">New title:</label>
            <input type="text" name="new-title" id="new-title">

            <button class="btn">Change</button>
            <button class="btn"><a href="/index.php">Cancel</a></button>
        </form>
    </div>
<?php endif; ?>

<?php require __DIR__ . '/views/footer.php'; ?>
