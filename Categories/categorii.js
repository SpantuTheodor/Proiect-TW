var popup = document.getElementById("pop-up");

var btn = document.getElementById("pop-up-button");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
    popup.style.display = "block";
}

span.onclick = function() { //click pe (x)
    popup.style.display = "none";
}

window.onclick = function(event) { //click inafara popup ului
    if (event.target == popup) {
        popup.style.display = "none";
    }
}

function jsFunction() {
    console.log("SAVAG");
}