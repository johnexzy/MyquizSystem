const checkPerm = (table, path) => {
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
                document.write("Please Wait for Admins Approval")
            } else window.location = 'online.php';
        }
    }
    var updateString = table;
    //send query to _checkPermission.php
    updateRequest.open("GET", path + updateString, true)
    updateRequest.send(null)
}