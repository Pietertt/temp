class popup {

      constructor(title, description, button, subscription){
            this.title = title;
            this.description = description;
            this.buttonText = button;
            this.subscription = subscription
      }

      set image(image){
            this.image = image;
      }

      generate(){
            var popup = document.createElement("DIV");

            var overlay = document.createElement("DIV");
            overlay.classList.add("popup_overlay");
            this.overlay = overlay;

            var cont1 = document.createElement("DIV");
            cont1.classList.add("four", "wide", "white", "rounded", "popup", "container");
            this.container = cont1;

            var cont2 = document.createElement("DIV");
            cont2.classList.add("ten", "wide", "white", "rounded", "container");
            cont1.appendChild(cont2);

            var row1 = document.createElement("DIV");
            row1.classList.add("row");
            cont2.appendChild(row1);

            var header = document.createElement("H2");
            header.classList.add("lighter", "header");
            header.innerHTML = this.title;
            row1.appendChild(header);

            var row2 = document.createElement("DIV");
            row2.classList.add("row");
            cont2.appendChild(row2);

            var body = document.createElement("DIV");
            body.classList.add("lighter");
            body.innerHTML = this.description;
            row2.appendChild(body);

            var row3 = document.createElement("DIV");
            row3.classList.add("row");
            cont2.appendChild(row3);

            var input = document.createElement("INPUT");
            input.placeholder = "Code...";
            row3.appendChild(input);

            var row4 = document.createElement("DIV");
            row4.classList.add("row");
            cont2.appendChild(row4);

            var button = document.createElement("BUTTON");
            button.classList.add("twelve", "wide", "blue", "button");
            button.innerHTML = this.buttonText;
            row4.appendChild(button);
            this.button = button;

            var row5 = document.createElement("DIV");
            row5.classList.add("row");
            cont2.appendChild(row5);

            var subscription = document.createElement("A");
            subscription.classList.add("lighter");
            subscription.innerHTML = this.subscription;
            row5.appendChild(subscription);

            var row6 = document.createElement("DIV");
            row6.classList.add("row");
            cont2.appendChild(row6);

            var dot1 = document.createElement("DIV");
            dot1.classList.add("dot", "selected");
            row6.appendChild(dot1);

            var dot2 = document.createElement("DIV");
            dot2.classList.add("dot");
            row6.appendChild(dot2);

            popup.appendChild(cont1);
            popup.appendChild(overlay);

            button.addEventListener("click", function(){
                  overlay.remove();
                  cont1.remove();
            });

            return popup;
      }

      kill(){
      } 
}