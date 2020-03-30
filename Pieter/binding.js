// Definitions from the first version of the code
var data = {
  email: '',
  password: '',
  code: '',
  waiting: false,
  error: ''
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

watch(data, 'code', function(newValue) {
      document.getElementById('popup_input').value = newValue;
      console.log(data.code);
});

watch(data, 'error', function(newValue) {
      if (!document.getElementById("error_message")){
            var container = document.getElementById('container');
            var row = document.createElement("DIV");
            row.id = "error_message";
            row.classList.add('row');

            var column = document.createElement("DIV");
            column.classList.add("twelve");
            column.classList.add("wide");
            column.classList.add("rounded");
            column.classList.add("error");
            column.classList.add("column");
            column.id = "error_message_value";
            column.innerHTML = newValue;

            row.appendChild(column);
            container.appendChild(row);
      } else {
            document.getElementById("error_message_value").innerHTML = newValue;
      }
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

document.addEventListener('input', test);

function test(event){
      var element = event.target;
      if(element.tagName == 'INPUT' && element.id == "popup_input"){
            data.code = document.getElementById("popup_input").value;
        }
}

button.addEventListener('click', function(){
      data.waiting = true;
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                  data.waiting = false;
                  if(this.responseText == "true"){
                        animate();
                  } else {
                        console.log(this.responseText);
                        data.error = JSON.parse(this.responseText);
                        console.log(JSON.parse(this.responseText));
                  }
            }
      }
      xhttp.open("POST", "validation.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("email=" + data.email + "&password=" + data.password);
});

function animate(){
      pop = new popup("Twee-factor authenticatie nodig", "Er is een code naar je e-mailadres gestuurd. Gelieve deze code hier in te voeren om verder te gaan." ,"Versturen", "Verstuur code opnieuw");
      //pop.action("fade");
      pop.generate();
      pop.button.addEventListener("click", function(){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                  if(this.readyState == 4 && this.status == 200){
                        if(this.responseText == "true"){
                              pop.update("Twee-factor authenticatie nodig", "Er is een code naar je telefoon gestuurd. Gelieve deze code hier in te voeren om verder te gaan.", "Versturen", "Verstuur code opnieuw");
                              pop.swipe();
                              pop.button.addEventListener("click", function(){
                                    var xhttp = new XMLHttpRequest();
                                    xhttp.onreadystatechange = function(){
                                          if(this.readyState == 4 && this.status == 200){
                                                if(this.responseText == "true"){
                                                      pop.close();
                                                      document.location = "../dashboard/index.php";
                                                }
                                          }
                                    }
                                    xhttp.open("POST", "validation.php", true);
                                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                    xhttp.send("number=" + data.code);
                              });
                        }
                  }
            }
            xhttp.open("POST", "validation.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("code=" + data.code);
      });
}


