function toggleUserMenu() {
    document.addEventListener("mouseup", function(e) {
        let element = document.getElementById("user_menu");
        if(!element.contains(e.target)) {
            element.focus();
        }
    });

    document.getElementById("user_menu").classList.toggle("toggle");
}

