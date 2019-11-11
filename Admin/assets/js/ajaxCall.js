const checkPerm = () => {
    //var tag = id('tag').value
    var updateRequest
    try {
        updateRequest = new XMLHttpRequest()
    } catch (e) {
        try {
            updateRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                updateRequest = new ActiveXObject("Microsoft.XMLHTTP")
            } catch (e) {
                alert("Your browser broke")
                return false
            }
        }
    }
    updateRequest.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == 0) {
                document.write("Loading------")
            } else window.location = 'http://localhost/MyQuiz/online.php';
        }
    }
    var updateString = "?table=_checkmode1";
    //send query to _checkPermission.php
    updateRequest.open("GET", "Admin/_checkPerm.php" + updateString, true)
    updateRequest.send(null)
}