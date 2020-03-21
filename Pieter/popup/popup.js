class popup {

      constructor(title, description, button){
            this.title = title;
            this.description = description;
            this.button = button;
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

            var column1 = document.createElement("DIV");
            column1.classList.add("twelve", "wide", "column");
            row1.appendChild(column1);

            var header = document.createElement("H2");
            header.classList.add("lighter", "header");
            header.innerHTML = this.title;
            column1.appendChild(header);

            var row2 = document.createElement("DIV");
            row2.classList.add("row");
            cont2.appendChild(row2);

            var column2 = document.createElement("DIV");
            column2.classList.add("twelve", "wide", "column");
            row2.appendChild(column2);

            var body = document.createElement("P");
            body.classList.add("lighter");
            body.innerHTML = this.description;
            column2.appendChild(body);

            var row3 = document.createElement("DIV");
            row3.classList.add("row");
            cont2.appendChild(row3);

            var column3 = document.createElement("DIV");
            column3.classList.add("twelve", "wide", "column");
            row3.appendChild(column3);

            var input = document.createElement("INPUT");
            input.placeholder = "Code...";
            column3.appendChild(input);

            var row4 = document.createElement("DIV");
            row4.classList.add("row");
            cont2.appendChild(row4);

            var column4 = document.createElement("DIV");
            column4.classList.add("twelve", "wide", "column");
            row4.appendChild(column4);

            var button = document.createElement("BUTTON");
            button.classList.add("twelve", "wide", "red", "button");
            button.innerHTML = this.button;
            column4.appendChild(button);

            popup.appendChild(cont1);
            popup.appendChild(overlay);
            return popup;
      }
}