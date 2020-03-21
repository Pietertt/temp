class popup {

      constructor(title, description, button, subscription){
            this.title = title;
            this.description = description;
            this.button = button;
            this.subscription = subscription
      }

      set image(image){
            this.image = image;
      }

      generate(){
            var popup = document.createElement("DIV");

            var overlay = document.createElement("DIV");
            overlay.classList.add("overlay");

            var cont1 = document.createElement("DIV");
            cont1.classList.add("four", "wide", "white", "rounded", "popup", "container");

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
            button.innerHTML = this.button;
            row4.appendChild(button);

            var row5 = document.createElement("DIV");
            row5.classList.add("row");
            cont2.appendChild(row5);

            var subscription = document.createElement("A");
            subscription.classList.add("lighter");
            subscription.innerHTML = this.subscription;
            row5.appendChild(subscription);

            popup.appendChild(cont1);
            popup.appendChild(overlay);
            return popup;
      }
}