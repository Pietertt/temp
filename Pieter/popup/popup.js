class popup {

      constructor(title, button){
            this.title = title;
            this.button = button;
      }

      set image(image){
            this.image = image;
      }

      generate(){
            var popup = document.createElement("DIV");

            var overlay = document.createElement("DIV");
            overlay.classList.add("overlay");

            var cont = document.createElement("DIV");
            cont.classList.add("four", "wide", "white", "rounded", "popup", "container");
            cont.innerHTML = this.title;

            popup.appendChild(cont);
            popup.appendChild(overlay);
            return popup;
      }
}