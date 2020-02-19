const checkRes = () => {
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
            document.getElementById("preview").innerHTML = this.responseText
            setTimeout(function() {
                checkRes()
            }, 2000)
        }
    }

    //send query to _checkPermission.php
    updateRequest.open("GET", "_checkresult.pdo.php", true)
    updateRequest.send(null)
}
checkRes()