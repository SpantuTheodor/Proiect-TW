const dropDownArrow = document.getElementById("login_menu_icon");
const dropDownMenu  = document.getElementById("login_menu"); 

const mainMenuArrow = document.getElementById("menu");
const mainMenu      = document.getElementById("main_menu");
const closeMainMenu = document.getElementById("close");

dropDownArrow.addEventListener('click', function() {
    if (dropDownMenu.style.display === 'none') {
        dropDownMenu.style.display = 'block';
    } else {
        dropDownMenu.style.display = 'none';
    }
});

mainMenuArrow.addEventListener('click', function() {
    mainMenu.style.display = 'block';
});

closeMainMenu.addEventListener('click', function() {
    mainMenu.style.display = 'none';
});