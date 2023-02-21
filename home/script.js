function send () {
    var mess = document.getElementById("text")
    var mess = mess.value
    if (mess != "") {
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "getsugg.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("user="+mess);
    }
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("sugg").innerHTML = this.responseText;
        }
    };
}

