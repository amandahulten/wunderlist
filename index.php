<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';


?>


<article class="homepage">

    <?php if (!isUserLoggedIn()) : ?>
        <div class="outlogged">
            <h2>Welcome to stress less! </h2>
            <p>This is your website for a more structured life. Start by: <br> <button class="btn"><a href="/login.php">Login</a></button> or <button class="btn"><a href="/register.php">Register</a></button></p>
        </div>
    <?php endif; ?>
    <?php if (isUserLoggedIn()) : ?>

        <h3><?= 'Welcome ' . ($_SESSION['user']['username']) . '!'; ?></h3>

        <div class="list-flex">
            <?php if (!getAllLists($database)) : ?>
                <h1>Create a list to start</h1>
            <?php else : ?>
                <h1>Lists</h1>
            <?php endif; ?>

            <?php foreach (getAllLists($database) as $list) : ?>
                <div class="list-container">
                    <ul class="list-ul">
                        <li> <a href="/individual-list.php?id=<?= $list['id']; ?>"><?= htmlspecialchars($list['title']); ?></a></li>

                        <div class="list-task-buttons">
                            <button class="edit"><a href="/change-list.php?id=<?= $list['id'] ?>"><img class="edit-png" src="/uploads/edit.png" alt="Edit button"></a></button>

                            <form action="/app/lists/delete.php" method="post">
                                <input type="hidden" name="list-id" id="list-id" value="<?= $list['id']; ?>">
                                <button type="submit" class="delete"><img class="delete-png" src="/uploads/bin.png" alt="Delete bin"></button>
                            </form>
                        </div>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="add-list-container">
            <h2>Add new list</h2>

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

            <form action="/app/lists/create.php" method="post">
                <label for="list-name">List name:</label>
                <input type="text" name="list-name" id="list-name" maxlength="18">

                <button class="btn">Add list</button>
            </form>
        </div>

        <div class="view-tasks-buttons">

            <div class="todays-task-container">
                <button class="btn today">View tasks to complete today</button>

                <div class="todays-tasks-loop">
                    <?php if (!getTodaysTasks($database)) : ?>
                        <h3 class="btn-message">No tasks to complete today!</h3>
                    <?php else : ?>
                        <?php foreach (getTodaysTasks($database) as $todayTask) : ?>
                            <div class="todays-tasks">
                                <h2 class="task-title"><?= htmlspecialchars($todayTask['title']); ?></h2>
                                <p><?= htmlspecialchars($todayTask['description']); ?></p>
                                <h3 class="task-deadline">Deadline: <?= $todayTask['completed_by']; ?></h3>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="all-tasks-container">
                <button class="btn task">View all tasks</button>

                <div class="all-tasks-loop">
                    <?php if (!getUncompletedTasks($database)) : ?>
                        <h3 class="btn-message">You don't have any tasks!</h3>
                    <?php else : ?>
                        <?php foreach (getUncompletedTasks($database) as $task) : ?>
                            <div class="all-tasks">
                                <h2 class="task-title"><?= htmlspecialchars($task['title']); ?></h2>
                                <p><?= htmlspecialchars($task['description']); ?></p>
                                <h3 class="task-deadline">Deadline: <?= $task['completed_by']; ?></h3>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

</article>

<?php require __DIR__ . '/views/footer.php'; ?>
