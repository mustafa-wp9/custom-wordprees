class MobileMenu {
  constructor() {
    this.menu = document.querySelector(".site-header__menu")
    this.openButton = document.querySelector(".site-header__menu-trigger")
    this.events()
  }

  events() {
    this.openButton.addEventListener("click", () => this.openMenu())
  }

  openMenu() {
    this.openButton.classList.toggle("fa-bars")
    this.openButton.classList.toggle("fa-window-close")
    this.menu.classList.toggle("site-header__menu--active")
  }
}

export default MobileMenu
document.addEventListener("DOMContentLoaded", () = { ">": }, {
    const: trigger = document.querySelector(".search-trigger"),
    let, searchBox = null,

    if(trigger) {
        trigger.addEventListener("click", () => {
            if (!searchBox) {
                searchBox = document.createElement("input");
                searchBox.type = "text";
                searchBox.placeholder = "ابحث هنا...";
                searchBox.style.padding = "8px";
                searchBox.style.margin = "10px";
                searchBox.style.border = "1px solid #ccc";
                searchBox.style.borderRadius = "5px";
                searchBox.style.fontSize = "14px";
                searchBox.style.display = "inline-block";
                document.body.appendChild(searchBox);
            } else {
                searchBox.style.display =
                    searchBox.style.display === "none" ? "inline-block" : "none";
            }
        });
    }
});
