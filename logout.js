function logout() {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            xmlhttp.open("GET", "logout.php", true);
            xmlhttp.send();
        }
    };
}