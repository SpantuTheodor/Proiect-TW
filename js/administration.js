const createUserBtn = document.getElementById("create_user");
const deleteUserBtn = document.getElementById("delete_user");
const createFoodBtn = document.getElementById("create_food");
const deleteFoodBtn = document.getElementById("delete_food");
const createRestaurantBtn = document.getElementById("create_restaurant");
const deleteRestaurantBtn = document.getElementById("delete_restaurant");

const createUserArea = document.getElementById("create_user_area");
const deleteUserArea = document.getElementById("delete_user_area");
const createFoodArea = document.getElementById("create_food_area");
const deleteFoodArea = document.getElementById("delete_food_area");
const createRestaurantArea = document.getElementById("create_restaurant_area");
const deleteRestaurantArea = document.getElementById("delete_restaurant_area");


createUserBtn.addEventListener('click', function() {
    createFoodArea.style.display = 'none';
    deleteFoodArea.style.display = 'none';
    createUserArea.style.display = 'block';
    deleteUserArea.style.display = 'none';
    createRestaurantArea.style.display = 'none';
    deleteRestaurantArea.style.display = 'none';
    // ajustez spatiul suplimentar pentru text area
    let mainContent = document.getElementsByClassName("main_content")[0];
    mainContent.style.height = "800px";
});

deleteUserBtn.addEventListener('click', function() {
    createFoodArea.style.display = 'none';
    deleteFoodArea.style.display = 'none';
    createUserArea.style.display = 'none';
    deleteUserArea.style.display = 'block';
    createRestaurantArea.style.display = 'none';
    deleteRestaurantArea.style.display = 'none';
    // ajustez spatiul suplimentar pentru text area
    let mainContent = document.getElementsByClassName("main_content")[0];
    mainContent.style.height = "800px";
});

createFoodBtn.addEventListener('click', function() {
    createFoodArea.style.display = 'block';
    deleteFoodArea.style.display = 'none';
    createUserArea.style.display = 'none';
    deleteUserArea.style.display = 'none';
    createRestaurantArea.style.display = 'none';
    deleteRestaurantArea.style.display = 'none';
    // fac loc si la text area
    let mainContent = document.getElementsByClassName("main_content")[0];
    mainContent.style.height = "1100px";
});

deleteFoodBtn.addEventListener('click', function(){
    createFoodArea.style.display = 'none';
    deleteFoodArea.style.display = 'block';
    createUserArea.style.display = 'none';
    deleteUserArea.style.display = 'none';
    createRestaurantArea.style.display = 'none';
    deleteRestaurantArea.style.display = 'none';
    // ajustez spatiul suplimentar pentru text area
    let mainContent = document.getElementsByClassName("main_content")[0];
    mainContent.style.height = "800px";
});

createRestaurantBtn.addEventListener('click', function(){
    createFoodArea.style.display = 'none';
    deleteFoodArea.style.display = 'none';
    createUserArea.style.display = 'none';
    deleteUserArea.style.display = 'none';
    createRestaurantArea.style.display = 'block';
    deleteRestaurantArea.style.display = 'none';
    // ajustez spatiul suplimentar pentru text area
    let mainContent = document.getElementsByClassName("main_content")[0];
    mainContent.style.height = "800px";
});

deleteRestaurantBtn.addEventListener('click', function(){
    createFoodArea.style.display = 'none';
    deleteFoodArea.style.display = 'none';
    createUserArea.style.display = 'none';
    deleteUserArea.style.display = 'none';
    createRestaurantArea.style.display = 'none';
    deleteRestaurantArea.style.display = 'block';
    // ajustez spatiul suplimentar pentru text area
    let mainContent = document.getElementsByClassName("main_content")[0];
    mainContent.style.height = "800px";
});