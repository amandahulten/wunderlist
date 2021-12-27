<?php
require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

// $todaysDate = ("SELECT * FROM tasks WHERE completed_by >= CURRENT_DATE()");

?>

<!-- ändra alla echo -->
<article class="homepage">

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


    <?php if (!getAllLists($database)) : ?>
        <h1>Create a list to start</h1>
    <?php else : ?>
        <h1>Lists</h1>
    <?php endif; ?>

    <?php if (isUserLoggedIn()) : ?>

        <?php foreach (getAllLists($database) as $list) : ?>
            <div class="list-container">
                <ul>
                    <li><a href="/individual-list.php?id=<?= $list['id']; ?>"><?php echo $list['title']; ?></a></li>

                    <div class="task-buttons">
                        <form action="/app/posts/delete.php" method="post">
                            <input type="hidden" name="list-id" id="list-id" value="<?php echo $list['id']; ?>">
                            <button type="submit" class="btn">Delete</button>
                        </form>
                        <button class="btn"><a href="/change-list.php?id=<?= $list['id'] ?>">Edit</a></button>

                    </div>
                </ul>
            </div>
        <?php endforeach; ?>

        <div class="add-list-container">
            <h2>Add new list</h2>
            <form action="/app/posts/create-list.php" method="post">
                <label for="list-name">List name:</label>
                <input type="text" name="list-name" id="list-name" maxlength="20">

                <button class="btn">Add list</button>
            </form>
        </div>
    <?php endif; ?>

</article>

<?php require __DIR__ . '/views/footer.php'; ?>
