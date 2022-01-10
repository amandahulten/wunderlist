<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (isUserLoggedIn()) : ?>

    <?php $id = $_GET['id']; ?>

    <article class="list">

        <?php if (isset($_SESSION['completed'])) : ?>
            <?php foreach ($_SESSION['completed'] as $completed) : ?>
                <div class="message">
                    <?= $completed; ?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['completed']) ?>
        <?php endif; ?>

        <div class="list-title-flex">
            <?php foreach (getAllLists($database) as $list) : ?>
                <div class="back-img">
                    <a href="/index.php"><img class="back-png" src="/uploads/back.png" alt="Back button"></a>
                </div>
                <?php if ($list['id'] == $id) : ?>
                    <h1><?= htmlspecialchars($list['title']); ?>
                    </h1>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <?php if (!getUncompletedTasks($database)) : ?>
            <h2>No tasks created yet </h2>
        <?php endif; ?>

        <div class="add-task-container">

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

            <button class="btn add">Add new task</button>
            <div class="add-task-query">
                <form action="/app/tasks/create.php?id=<?= $id; ?>" method="post">
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
        </div>

        <?php foreach (getUncompletedTasks($database) as $task) : ?>
            <?php if ($task['list_id'] == $id) : ?>
                <div class="task-container">
                    <h2 class="task-title"><?= htmlspecialchars($task['title']); ?></h2>
                    <p><?= htmlspecialchars($task['description']); ?></p>
                    <h3 class="task-deadline">Deadline: <?= $task['completed_by']; ?></h3>
                    <div class="task-buttons">

                        <button class="edit-btn"><a href="/change-task.php?id=<?= $id; ?>&task_id=<?= $task['id']; ?>"><img class="edit-png" src="/uploads/edit.png" alt="Edit image"></a></button>

                        <form action="/app/tasks/completed.php" method="post">
                            <input type="hidden" name="task-id" id="task-id" value="<?= $task['id'] ?>">
                            <input type="hidden" name="list-id" id="list-id" value="<?= $task['list_id']; ?>">
                            <button type="submit" class="done-btn"><img class="done-png" src="/uploads/done.png" alt="Done png"></button>
                        </form>

                        <form action="/app/tasks/delete.php" method="post">
                            <input type="hidden" name="task-id" id="task-id" value="<?= $task['id']; ?>">
                            <input type="hidden" name="list-id" id="list-id" value="<?= $task['list_id']; ?>">
                            <button type="submit" class="delete-btn"><img class="delete-png" src="/uploads/bin.png" alt="Delete bin"></button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <hr style="width: 100%;">

        <div class="completed-tasks-container">

            <button class="btn completed">View completed tasks</button>

            <div class="completed-tasks-loop">
                <?php if (!getCompletedTasks($database)) : ?>
                    <h3 class="btn-message">No completed tasks yet.</h3>
                <?php else : ?>
                    <?php foreach (getCompletedTasks($database) as $task) : ?>
                        <div class="completed-tasks">

                            <h2 class="task-title"><?= htmlspecialchars($task['title']); ?></h2>
                            <p><?= htmlspecialchars($task['description']); ?></p>
                            <h3 class="task-completed">Completed at: <br><?= $task['completed_at']; ?></h3>


                            <div class="task-buttons">

                                <form action="/app/tasks/uncompleted.php" method="post">
                                    <input type="hidden" name="task-id" id="task-id" value="<?= $task['id'] ?>">
                                    <input type="hidden" name="list-id" id="list-id" value="<?= $task['list_id']; ?>">
                                    <button type="submit" class="btn undone">Regret</button>
                                </form>
                                <form action="/app/tasks/delete.php" method="post">
                                    <input type="hidden" name="task-id" id="task-id" value="<?= $task['id']; ?>">
                                    <input type="hidden" name="list-id" id="list-id" value="<?= $task['list_id']; ?>">
                                    <button type="submit" class="delete-btn"><img class="delete-png" src="/uploads/bin.png" alt="Delete bin"></button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="specification">
            <div class="specification-items">
                <img class="edit-png" src="/uploads/edit.png" alt="Edit button">
                <h3> = edit task</h3>
            </div>
            <div class="specification-items">
                <img class="done-png" src="/uploads/done.png" alt="Done button">
                <h3> = task completed</h3>
            </div>
            <div class="specification-items">
                <img class="delete-png" src="/uploads/bin.png" alt="Bin button">
                <h3> = delete task</h3>
            </div>
        </div>
    </article>
<?php endif; ?>

<?php require __DIR__ . '/views/footer.php'; ?>
