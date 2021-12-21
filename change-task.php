<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<div class="change-task-container">
    <h2>Change task</h2>
    <form action="/app/posts/update.php" method="post">

        <label for="new-title">New title:</label>
        <input type="text" name="new-title" id="new-title">

        <label for="new-description">New description:</label>
        <textarea name="new-description" id="new-description" cols="30" rows="10"></textarea>

        <label for="new-deadline">New deadline:</label>
        <input type="date" name="new-deadline" id="new-deadline">

        <button class="btn">Change</button>
        <button class="btn"><a href="/index.php">Cancel</a></button>
    </form>
</div>

<?php require __DIR__ . '/views/footer.php'; ?>
