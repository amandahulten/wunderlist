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

const taskContainers = document.querySelectorAll('.all-tasks');
const allTaskButton = document.querySelector('.task');

taskContainers.forEach((taskContainer) => {
  allTaskButton.addEventListener('click', () => {
    taskContainer.classList.toggle('active');
  });
  console.log(taskContainer);
});
