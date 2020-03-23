class popup {

      constructor(title, description, button, subscription){
            this.titleText = title;
            this.descriptionText = description;
            this.buttonText = button;
            this.subscriptionText = subscription

            this.button;
      }

      set image(image){
            this.image = image;
      }

      generate(){
            var overlay = document.createElement("DIV");
            overlay.classList.add("popup_overlay");

            var popup = document.createElement("DIV");

            var wrapper = document.createElement("DIV");
            wrapper.classList.add("four", "wide", "white", "rounded", "popup", "container");

            var container = document.createElement("DIV");
            container.classList.add("ten", "wide", "white", "rounded", "container");

            var elements = [["H2", ["header"], "popup_header", this.titleText], ["DIV", ["lighter"], "popup_description", this.descriptionText], ["BUTTON", ["twelve", "wide", "blue", "button"], "popup_button", this.buttonText], ["DIV", ["lighter"], "popup_subscription", this.subscriptionText]];
            
            for(var i = 0; i < elements.length; i++){
                  var row = document.createElement("DIV");
                  row.classList.add("row");

                  var element = document.createElement(elements[i][0]);
                  element.id = elements[i][2];
                  element.innerHTML = elements[i][3];
                  for(var j = 0; j < elements[i][1].length; j++){
                        element.classList.add(elements[i][1][j]);
                  }
                  row.appendChild(element);
                  container.appendChild(row);
            }
            wrapper.appendChild(container);
            popup.appendChild(wrapper);
            document.body.appendChild(overlay);
            document.body.appendChild(popup);

            this.header = document.getElementById("popup_header");
            this.description = document.getElementById("popup_description");
            this.button = document.getElementById("popup_button");
            this.subscription = document.getElementById("popup_subscription");
      }

      action(action){
            switch(action){
                  case "fade":
                        this.button.addEventListener("click", this.fade);
                        break;
                  case "close":
                        this.button.addEventListener("click", this.close);
                        break;
                  default:
                        alert("Default");
                        break;
            }
      }

      update(title, description, button, subscription){
            this.titleText = title;
            this.descriptionText = description;
            this.buttonText = button;
            this.subscriptionText = subscription;
      }

      fade(){
            this.header.innerHTML = this.titleText;
            this.description.innerHTML = this.descriptionText;
            this.button.innerHTML = this.buttonText;
            this.subscription.innerHTML = this.subscriptionText;
      }




      close(){
            this.overlay.remove();
            this.container.remove();
      }
}