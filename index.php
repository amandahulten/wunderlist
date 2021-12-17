<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

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
        <p>Welcome to stress less! This is your website for a more structured life. Start by either <button><a href="/login.php">Login</a></button> or <button><a href="/register.php">Register</a></button>.</p>
    <?php endif; ?>



    <?php if (isUserLoggedIn()) : ?>
        <?php if (!getAllTasks($_SESSION['user']['id'], $database)) : ?>
            <h2>Wihoo, you're free!! </h2>
        <?php else : ?>
            <table class="task-container">
                <tr>
                    <th>Status</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Deadline</th>
                </tr>
            <?php endif; ?>
            <?php foreach (getAllTasks($_SESSION['user']['id'], $database) as $task) : ?>
                <tr>
                    <td> <label for="completed">
                            <input type="checkbox" name="completed" class="check" id="completed"></label>
                    </td>
                    <td class="title-column"><?php echo $task['title']; ?></h2>
                    <td class="description-column"><?php echo $task['description']; ?></p>
                    <td><?php echo $task['completed_by']; ?></h3>
                    <td><button class="btn"><a href="/change-task.php"></a>Edit</button>
                        <button class="btn">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </table>

            <div class="add-task-container">
                <h2>Add new task</h2>
                <form action="/app/posts/store.php" method="post">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" maxlength="25">

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
