// console.log('Hello World');

// const completed = document.querySelector('.btn.completed');
// const uncompleted = document.querySelector('.btn.uncompleted');
// const taskContainer = document.querySelector('.task-container');

// uncompleted.addEventListener('click', function () {
//   if (uncompleted.innerHTML === 'Uncompleted') {
//     uncompleted.innerHTML = 'Completed';
//   } else {
//     uncompleted.innerHTML = 'Uncompleted';
//   }
// });

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
