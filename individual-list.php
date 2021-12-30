<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php $id = $_GET['id']; ?>

<article class="list">

    <?php foreach (getAllLists($database) as $list) : ?>
        <?php if ($list['id'] == $id) : ?>
            <h1><?= $list['title']; ?>
                <hr style="width:100%">
            </h1>
        <?php endif; ?>
    <?php endforeach; ?>

    <?php if (!getUncompletedTasks($database)) : ?>
        <h2>No tasks here yet </h2>

    <?php endif; ?>

    <?php foreach (getUncompletedTasks($database) as $task) : ?>
        <?php if ($task['list_id'] == $id) : ?>
            <div class="task-container">
                <h2><?= $task['title']; ?></h2>
                <p><?= $task['description']; ?></p>
                <h3>Deadline: <?= $task['completed_by']; ?></h3>
                <div class="task-buttons">
                    <form action="/app/posts/delete.php" method="post">
                        <input type="hidden" name="task-id" id="task-id" value="<?= $task['id']; ?>">
                        <input type="hidden" name="list-id" id="list-id" value="<?= $task['list_id']; ?>">
                        <button type="submit" class="btn">Delete task</button>
                    </form>
                    <button class="btn"><a href="/change-task.php?id=<?= $id; ?>&task_id=<?= $task['id']; ?>">Edit task</a></button>
                    <form action="/app/posts/completed.php" action="post">
                        <input type="hidden" name="task-id" id="task-id" value="<?= $task['id'] ?>">
                        <input type="hidden" name="list-id" id="list-id" value="<?= $task['list_id']; ?>">
                        <button type="submit" class="btn done">Done</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>



    <div class="add-task-container">
        <h2>Add new task</h2>
        <?php if (isset($_SESSION['errors'])) : ?>
            <?php foreach ($_SESSION['errors'] as $error) : ?>
                <div class="error">
                    <?= $error; ?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['errors']) ?>
        <?php endif; ?>
        <form action="/app/posts/create-task.php?id=<?= $id; ?>" method="post">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" maxlength="20">

            <label for="description">Description:</label>
            <textarea name="description" id="description" maxlength="25"></textarea>
            <small>Max 30 characters</small>
            <br>

            <label for="deadline">Deadline:</label>
            <input type="date" name="deadline" id="deadline">

            <button class="btn">Add task</button>
        </form>
    </div>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
