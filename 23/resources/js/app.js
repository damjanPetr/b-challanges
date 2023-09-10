import "./bootstrap";

let progressColor = 0;

const header = document.querySelector("#head");
window.addEventListener("scroll", (e) => {
    // progressColor = progressColor + 0.01;
    progressColor = window.scrollY / window.innerHeight;

    header.style.backgroundColor = `rgba(0, 0,0,${progressColor})`;
});

console.log(header);
