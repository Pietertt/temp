//document.getElementById("submit").addEventListener("click", createerror);

function createerror() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("errorfield").classList.remove('invisible');
            console.log("Fuckyou");
        }
    };
    xhttp.open("GET", "", true);
    xhttp.send();

};
