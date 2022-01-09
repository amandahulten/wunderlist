// Hamburger-menu

const hamburger = document.querySelector('.hamburger');
const navMenu = document.querySelector('.navbar-nav');

function mobileMenu() {
  hamburger.classList.toggle('active');
  navMenu.classList.toggle('active');
}

hamburger.addEventListener('click', mobileMenu);

// Add-list button

const addListContainers = document.querySelectorAll('.add-list-query');
const addListBtn = document.querySelector('.list');

addListContainers.forEach((addListContainer) => {
  addListBtn.addEventListener('click', () => {
    addListContainer.classList.toggle('active');
  });
});

// View tasks dued today

const todaysTaskContainers = document.querySelectorAll('.todays-tasks-loop');
const todaysTaskBtn = document.querySelector('.today');

todaysTaskContainers.forEach((todaysTaskContainer) => {
  todaysTaskBtn.addEventListener('click', () => {
    todaysTaskContainer.classList.toggle('active');
  });
  console.log(todaysTaskContainer);
});

// View all tasks

const taskContainers = document.querySelectorAll('.all-tasks-loop');
const allTaskBtn = document.querySelector('.task');

taskContainers.forEach((taskContainer) => {
  allTaskBtn.addEventListener('click', () => {
    taskContainer.classList.toggle('active');
  });
});

// Add-task button

const addTaskContainers = document.querySelectorAll('.add-task-query');
const addTaskBtn = document.querySelector('.add');

addTaskContainers.forEach((addTaskContainer) => {
  addTaskBtn.addEventListener('click', () => {
    addTaskContainer.classList.toggle('active');
  });
});

//View completed tasks

const completedTaskContainers = document.querySelectorAll(
  '.completed-tasks-loop'
);
const completedTaskBtn = document.querySelector('.completed');

completedTaskContainers.forEach((completedTaskContainer) => {
  completedTaskBtn.addEventListener('click', () => {
    completedTaskContainer.classList.toggle('active');
  });
});
