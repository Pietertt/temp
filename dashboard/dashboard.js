var residence = document.getElementById("residence");
var phone_number = document.getElementById("phone_number");
var email_adress = document.getElementById("email_adress");

phone_number.addEventListener("click", function(){
      var json = JSON.parse(phone_number.getAttribute("data-popup"));
      var pop = new popup(json);
      pop.generate();
      pop.button.addEventListener("click", function(){
            for(var i = 0; i < pop.inputs.length; i++){
                  var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200){
                              console.log(this.responseText);
                        }
                  }

                  xhttp.open("POST", "../requests/user/update.php", true);
                  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                  xhttp.send("field=tnumber&value=" + pop.inputs[i].value);
            }
      });
});

residence.addEventListener("click", function(){
      var json = JSON.parse(residence.getAttribute("data-popup"));
      var pop = new popup(json);
      pop.generate();
});

email_adress.addEventListener("click", function(){
      var json = JSON.parse(email_adress.getAttribute("data-popup"));
      var pop = new popup(json);
      pop.generate();
});