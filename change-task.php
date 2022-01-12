<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (isUserLoggedIn()) : ?>
    <?php
    $listId = $_GET['id'];
    $taskId = $_GET['task_id'];
    ?>



    <div class="change-task-container">
        <h1>Change task
            <hr style="width:100%">
        </h1>


        <form action="/app/tasks/update.php?id=<?= $listId ?>&task_id=<?= $taskId ?>" method="post">

            <label for="new-title">New title:</label>
            <input type="text" name="new-title" id="new-title">

            <label for="new-description">New description:</label>
            <textarea name="new-description" id="new-description" cols="30" rows="10"></textarea>

            <label for="new-deadline">New deadline:</label>
            <input type="date" name="new-deadline" id="new-deadline">

            <button class="btn">Change</button>
            <button class="btn"><a href="individual-list.php?id=<?= $listId ?>">Cancel</a></button>
        </form>
    </div>
<?php endif; ?>

<?php require __DIR__ . '/views/footer.php'; ?>
