function bifare(index) {
    var conditie = 0;
    if (document.getElementById(index).checked == true) {
        conditie = 1;
    }

    document.getElementById("id0").checked = false;
    document.getElementById("id1").checked = false;
    document.getElementById("id2").checked = false;
    document.getElementById("id3").checked = false;
    document.getElementById("id4").checked = false;
    document.getElementById("id5").checked = false;
    document.getElementById("id6").checked = false;
    document.getElementById("id7").checked = false;
    document.getElementById("id8").checked = false;
    document.getElementById("id9").checked = false;

    if (conditie == 1) {
        document.getElementById(index).checked = true;
        console.log("ASASA");
    }
    else {
        document.getElementById(index).checked = false;
        console.log("BPBPBPB");
    }
    console.log(index);
}


function filtrare(index) {
    if (index == null) {
        document.getElementById("filterresults").style.display = "none";
        document.getElementById("searchresults").style.display = "none";
        document.getElementById("MORE").style.display = "block";
        document.getElementById("show-more").style.display = "block";
    }
    else {
        document.getElementById("filterresults").style.display = "block";
        document.getElementById("MORE").style.display = "none";
        document.getElementById("searchresults").style.display = "block";
        document.getElementById("show-more").style.display = "none";
    }

    if (document.getElementById("id0").checked == false &&
        document.getElementById("id1").checked == false &&
        document.getElementById("id2").checked == false &&
        document.getElementById("id3").checked == false &&
        document.getElementById("id4").checked == false &&
        document.getElementById("id5").checked == false &&
        document.getElementById("id6").checked == false &&
        document.getElementById("id7").checked == false &&
        document.getElementById("id8").checked == false &&
        document.getElementById("id9").checked == false) {

        document.getElementById("MORE").style.display = "block";
        document.getElementById("show-more").style.display = "block";
        document.getElementById("searchresults").style.display = "none";
        document.getElementById("filterresults").style.display = "none";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("MORE").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "get.php?i=1", true);
        xmlhttp.send();
    }
    else {
        document.getElementById("filterresults").style.display = "block";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("searchresults").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "filtrare.php?index=" + index, true);
        xmlhttp.send();
    }
}

function clearcheckboxes() {
    document.getElementById("id0").checked = false;
    document.getElementById("id1").checked = false;
    document.getElementById("id2").checked = false;
    document.getElementById("id3").checked = false;
    document.getElementById("id4").checked = false;
    document.getElementById("id5").checked = false;
    document.getElementById("id6").checked = false;
    document.getElementById("id7").checked = false;
    document.getElementById("id8").checked = false;
    document.getElementById("id9").checked = false;
}