var residence = document.getElementById("residence");
var phone_number = document.getElementById("phone_number");
var email_adress = document.getElementById("email_adress");

phone_number.addEventListener("click", function(){
      var json = JSON.parse(phone_number.getAttribute("data-popup"));
      var pop = new popup("Aanpassen", "Verander je telefoonnummer", "Verstuur", "");
      pop.generate();
});