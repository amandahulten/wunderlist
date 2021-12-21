<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

$todaysDate = ("SELECT * FROM tasks WHERE completed_by >= CURRENT_DATE()");

?>




<article class="homepage">
    <h1>To do</h1>
    <hr style="width: 100%;">

    <?php if (isset($_SESSION['errors'])) : ?>
        <?php foreach ($_SESSION['errors'] as $error) : ?>
            <div class="error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['errors']) ?>
    <?php endif; ?>

    <?php if (!isUserLoggedIn()) : ?>
        <p>Welcome to stress less! This is your website for a more structured life. Start by: <br> <button class="btn"><a href="/login.php">Login</a></button> or <button class="btn"><a href="/register.php">Register</a></button></p>
    <?php endif; ?>




    <?php if (isUserLoggedIn()) : ?>
        <?php if (!getAllTasks($_SESSION['user']['id'], $database)) : ?>
            <h2>Wihoo, you're free!! </h2>

        <?php endif; ?>

        <?php foreach (getAllTasks($_SESSION['user']['id'], $database) as $task) : ?>
            <div class="task-container">
                <h2><?php echo $task['title']; ?></h2>
                <p><?php echo $task['description']; ?></p>
                <h3>Deadline: <?php echo $task['completed_by']; ?></h3>
                <div class="task-buttons">
                    <form action="/app/posts/delete.php" method="post">
                        <input type="hidden" name="task-id" id="task-id" value="<?php echo $task['id']; ?>">
                        <button type="submit" class="btn">Delete task</button>
                    </form>
                    <button class="btn"><a href="/change-task.php">Edit task</a></button>
                    <button class="btn completed">Completed</button>
                    <button class="btn uncompleted">Uncompleted</button>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- <form action="/app/posts/tasks-today.php" action="post">

            <button type="submit" class="btn" name="today">Show only today's tasks</button>
        </form> -->

        <div class="add-task-container">
            <h2>Add new task</h2>
            <form action="/app/posts/store.php" method="post">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" maxlength="20">

                <label for="description">Description:</label>
                <textarea name="description" id="description" maxlength="30"></textarea>
                <small>Max 30 characters</small>
                <br>

                <label for="deadline">Deadline:</label>
                <input type="date" name="deadline" id="deadline">

                <button class="btn">Add task</button>
            </form>
        </div>

    <?php endif; ?>

</article>

<?php require __DIR__ . '/views/footer.php'; ?>
