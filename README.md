<img src="https://media.giphy.com/media/jS27LWasgUIYrXtP83/giphy-downsized.gif" >

# Stress Less

This is an individual school assignment focusing on php-programming. We were supposed to create a To-Do application with following user stories:

<details><summary><b> User stories:</b></summary>

- As a user I should be able to create an account.
- As a user I should be able to login.
- As a user I should be able to logout.
- As a user I should be able to edit my account email and password.
- As a user I should be able to upload a profile avatar image.
- As a user I should be able to create new tasks with title, description and deadline date.
- As a user I should be able to edit my tasks.
- As a user I should be able to delete my tasks.
- As a user I should be able to mark tasks as completed.
- As a user I should be able to mark tasks as uncompleted.
- As a user I'm able to create new task lists with title.
- As a user I'm able to edit my task lists.
- As a user I'm able to delete my task lists along with all tasks.
- As a user I'm able to add a task to a list.
- As a user I'm able to view all tasks.
- As a user I'm able to view all tasks within a list.
- As a user I'm able to view all tasks which should be completed today.
    
**Extra:**
- As a user I'm able to remove a task from a list.

</details>

# Installation

To install this project follow the steps below: 

- Clone the project -> ``` https://github.com/amandahulten/wunderlist.git ```

- Start php server -> ```php -S localhost:8000```

- Open your browser and paste this link -> ```http://localhost:8000/```

# Code Review

Code review written by [Jane Doh](https://github.com/username).

1. `index.php:14` - To make the whole button clickable make sure `<button>` is inside of `<a>` tag
2. `app/users/register.php:8-74` - I'd recommend setting some username requirements, such as only letters and numbers allowed.
3. `app/users/register.php:25-29` - Users can for example create password with only lowercase letters. Maybe add password requirements so that users have to enter atleast one uppercase letter and a number when creating a password.
4. `register.php:17-38` - Since password recovery is not available, I'd suggest adding another input field to confirm the password user has entered.
5. `app/users/create-avatar:21-22` - When uploading a new profile picture, it seems like users can upload a max file size of 20MB istead of 2MB.
6. `index.php:51` - Not sure if I understand why list name has a character limit of 8.
7. `index.php:81-100` - When viewing tasks to complete today, is it possible to link it to the specific task?
8. `general` - To easily return to homepage, I'd recommend making the logo a link that directs user to index. That's also 1 click less than taking the menu route.
9. `general` - Great use of comments throughout all your files, makes it easy to read and understand your code. Keep it up! ⭐️
10. `general` - Good job splitting your code up and moving them into subfolders. Tiny detail: I think the naming could be more unique, for example I would rename `create.php` to `create-task.php`. Incase files accidentally get rearranged in the future, you should know which file is which.

# Testers

Tested by the following people:

1. Sofia Dersén
2. Sofia Rönnkvist
