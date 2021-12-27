<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php $listId = $_GET['id']; ?>

<div class="change-task-container">
    <h2>Change listname</h2>
    <form action="/app/posts/update-list.php?id=<?= $listId; ?>" method="post">

        <label for="new-title">New title:</label>
        <input type="text" name="new-title" id="new-title">

        <button class="btn">Change</button>
        <button class="btn"><a href="/index.php">Cancel</a></button>
    </form>
</div>

<?php require __DIR__ . '/views/footer.php'; ?>
