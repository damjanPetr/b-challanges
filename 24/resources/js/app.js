import "./bootstrap";

const togglableItems = document.querySelectorAll(".tog");

togglableItems.forEach((element) => {
    element.addEventListener("click", () => {
        if (element.classList.contains("open")) {
            element.classList.remove("open");
        } else {
            element.classList.add("open");
        }
    });
});
