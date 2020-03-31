var residence = document.getElementById("residence");
var phone_number = document.getElementById("phone_number");
var email_adress = document.getElementById("email_adress");

phone_number.addEventListener("click", function(){
      var json = JSON.parse(phone_number.getAttribute("data-popup"));
      var pop = new popup(json);
      pop.generate();
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