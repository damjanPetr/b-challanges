const questionsUrl = "https://opentdb.com/api.php?amount=20";

const startBtn = document.querySelector("#startBtn");

function getData() {
  const quizData = new Promise((res, req) => {});
  const questions = fetch(questionsUrl)
    .then((response) => response.json())
    .then((data) => data)
    .then((data) => {
      console.log(data);
    })
    .catch((error) => console.error(error));
  quizData.then((data) => {}).catch((error) => console.error(error));
}

startBtn.addEventListener("click", (e) => {
  window.location.hash = "question1";
});
