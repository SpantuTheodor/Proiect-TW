function deleteJS(id) {
    document.getElementById(id).style.display="none";
}

function deleteFrom(index) {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "deleteFrom.php?index=" + index, true);
    xmlhttp.send();
}

function deleteFromList(index) {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "deleteFromList.php?index=" + index, true);
    xmlhttp.send();
}