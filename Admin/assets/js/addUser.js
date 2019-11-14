var id = document.getElementById.bind(document);

const update = () => {
    var updateRequest
    try {
        updateRequest = new XMLHttpRequest()
    } catch (e) {
        try {
            updateRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                updateRequest = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("Your browser Does not supports Ajax");
                return false
            }
        }
    }
    updateRequest.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // alert(this.responseText)
            console.log(this.responseText)
            id("registeredUsers").innerHTML = this.responseText;
        }
    }
    updateRequest.open("GET", "showcontest.php", true)
    updateRequest.send(null)
}

const addUser = () => {
    // var id = document.getElementById.bind(document);
    var names, number;
    names = document.myform.constname.value
    number = document.myform.constnumber.value
    console.log(names)
        // alert(names)
        // var tag = id('tag').value
    if ((names == null || names == "") && (number == null || number == "")) {
        document.myform.constname.style.border = "1px solid red"
        document.myform.constname.style.border = "1px solid red"
        return false
    }
    if (names == null || names == undefined || names == "") {
        document.myform.constname.style.border = "1px solid red"
        return false
    }
    if (number == null || number == undefined || number == "") {
        document.myform.constnumber.style.border = "1px solid red"
        return false
    }
    var ajaxRequest
    try {
        ajaxRequest = new XMLHttpRequest()
    } catch (e) {
        try {
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP")
            } catch (e) {
                alert("Your browser broke")
                return false
            }
        }
    }

    ajaxRequest.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            names = '';
            number = '';
            update()

        }

    }
    var queryString = "?Name=" + names;
    queryString += "&Number=" + number;

    ajaxRequest.open("GET", "addcontest.php" + queryString, true);
    ajaxRequest.send(null)
}