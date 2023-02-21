var objDiv = document.getElementById("chat-frame");
objDiv.scrollTop = objDiv.scrollHeight;

var input = document.getElementById('text');
input.focus();

function send (target) {
    console.log(target)
    var mess = document.getElementById("text")
    var mess = mess.value
    if (mess != "") {
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "send.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("mess="+mess+"&target="+target);
    }
    setTimeout(() => {var objDiv = document.getElementById("chat-frame");objDiv.scrollTop = objDiv.scrollHeight;}, 500)
    

    document.getElementById("text").value = ""
    
}
