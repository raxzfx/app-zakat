//dropdown start
document.querySelectorAll(".dropdown-toggle").forEach(function (item) {
    item.addEventListener("click", function (e) {
        e.preventDefault();
        const parent = item.closest(".group");
        if (parent.classList.contains("selected")) {
            parent.classList.remove("selected");
        } else {
            document.querySelectorAll(".dropdown-toggle").forEach(function (i) {
                i.closest(".group").classList.remove("selected");
            });
            parent.classList.add("selected");
        }
    });
});
//dropdown end
