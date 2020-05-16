const createUserBtn = document.getElementById("create_user");
const deleteUserBtn = document.getElementById("delete_user");
const createFoodBtn = document.getElementById("create_food");
const deleteFoodBtn = document.getElementById("delete_food");

const createUserArea = document.getElementById("create_user_area");
const deleteUserArea = document.getElementById("delete_user_area");
const createFoodArea = document.getElementById("create_food_area");
const deleteFoodArea = document.getElementById("delete_food_area");


createUserBtn.addEventListener('click', function() {
    createFoodArea.style.display = 'none';
    deleteFoodArea.style.display = 'none';
    createUserArea.style.display = 'block';
    deleteUserArea.style.display = 'none';
});

deleteUserBtn.addEventListener('click', function() {
    createFoodArea.style.display = 'none';
    deleteFoodArea.style.display = 'none';
    createUserArea.style.display = 'none';
    deleteUserArea.style.display = 'block';
});

createFoodBtn.addEventListener('click', function() {
    createFoodArea.style.display = 'block';
    deleteFoodArea.style.display = 'none';
    createUserArea.style.display = 'none';
    deleteUserArea.style.display = 'none';
});

deleteFoodBtn.addEventListener('click', function(){
    createFoodArea.style.display = 'none';
    deleteFoodArea.style.display = 'block';
    createUserArea.style.display = 'none';
    deleteUserArea.style.display = 'none';
});
