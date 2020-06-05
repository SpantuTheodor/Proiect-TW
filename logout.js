function logout() {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {

        xmlhttp.open("GET", "logout.php", true);
        xmlhttp.send();

    };

}