// Definitions from the first version of the code
var data = {
  email: '',
  password: '',
  waiting: false
};

var emailField = document.getElementById('email');
var passwordField = document.getElementById('password');
var button = document.getElementById('submit');

var watch = function(object, property, callback) {
      var value = object[property];
      delete object[property];
      Object.defineProperty(object, property, {
            configurable: false,
            enumerable: false,
            get: function() {
                  return value;
            },
            set: function(newValue) {
                  value = newValue;
                  callback(newValue);
            }
      });
};

watch(data, 'email', function(newValue) {
      emailField.value = newValue;
});

watch(data, 'password', function(newValue) {
      passwordField.value = newValue;
});

watch(data, 'waiting', function(newValue){
      if(newValue){
            button.innerHTML = '';
            var loader = document.createElement("DIV");
            loader.classList.add('loader');
            button.appendChild(loader);
      } else {
            button.innerHTML = 'Versturen';
      }
})

emailField.addEventListener('input', function() {
      data.email = emailField.value;
});

passwordField.addEventListener('input', function() {
      data.password = passwordField.value;
});

button.addEventListener('click', function(){
      data.waiting = true;
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                  data.waiting = false;
                  console.log(this.responseText);
            }
      }
      xhttp.open("POST", "validate.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("email=" + data.email + "&password=" + data.password);
})


