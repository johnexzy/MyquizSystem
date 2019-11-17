var running = false
var endTime = null
var timerID = null
var id = document.getElementById.bind(document)
const startTimer = () => {
    running = true
    now = new Date();
    now = now.getTime()
    endTime = now + (1000 * 20 * 1)
    showCountDown()
}
const showCountDown = () => {
    var now = new Date()
    now = now.getTime()
    if (endTime - now <= 0) {
        stopTimer()
    } else {
        var delta = new Date(endTime - now)
        var theMin = delta.getMinutes()
        var theSec = delta.getSeconds()
        var theTime = theMin;
        theTime += ((theSec < 10) ? ":0" : ":") + theSec
        id("timerView").innerHTML = theTime
        if (running) {
            timeriD = setTimeout(function() {
                showCountDown()
            }, 1000)
        }
    }

}
const stopTimer = () => {
    clearTimeout(timerID)
    running = false
        //alert("time is Up")
    id("timerView").innerHTML = "<b style='color:red'>TIME IS UP</b>"
    setTimeout(function() {
        $("#submit").click()
    }, 1000)


}
startTimer()