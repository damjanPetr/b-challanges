const questionsUrl = "https://opentdb.com/api.php?amount=20";
const quizContainer = document.querySelector(".quiz-container");
const startBtn = document.querySelector("#startBtn");
const wcmScreen = document.querySelector(".main__start_page");
const btns = document.querySelectorAll("button");

const body = document.querySelector("body");
let qArray = [];
let toggle = document.createElement("div");
toggle.classList.add("tog");
// toggle.innerHTML = "";
body.appendChild(toggle);

async function getData() {
  toggle.style.display = "block";
  const questions = await fetch(questionsUrl);
  response = await questions.json();
  toggle.style.display = "none";
  return response;
  // .then((response) => response.json())
  // .then((data) => (qArray = data))
  // .catch((error) => console.error(error));
}

startBtn.addEventListener("click", async (e) => {
  await getData().then((res) => {
    console.log("🚀 ~ file: main.js:24 ~ awaitgetData ~ res:", res);
    qArray = res;
  });
  if (wcmScreen !== null) {
    wcmScreen.style.display = "none";
  }
  window.location.hash = "question-1";
});

window.addEventListener("hashchange", (e) => {
  const index = render.change();
  if (index > 20) {
    render.finaly();
  } else {
    render.loadQuestions(index);
  }
});

class render {
  static id;
  static logicArray = [];

  static finaly() {
    quizContainer.innerHTML = "";
    const startAgainBtn = document.createElement("button");
    startAgainBtn.innerText = "Start Over";
    startAgainBtn.classList.add("startAgainBtn");
    startAgainBtn.addEventListener("click", () => {
      localStorage.clear();
      window.location.reload();
      window.location.replace("/");
    });

    const table = document.createElement("table");
    table.classList.add("animate__animated");
    table.classList.add("animate__fadeIn");

    const totalBar = document.createElement("progress");

    totalBar.classList.add("bar");

    totalBar.classList.add("animate__headShake");

    totalBar.setAttribute("max", 20);

    totalBar.setAttribute("min", 0);
    let numberOFCorrect = 0;
    render.logicArray.forEach((item) => {
      item.GuessCorrect ? numberOFCorrect++ : null;
    });
    totalBar.setAttribute("value", numberOFCorrect);
    const caption = document.createElement("h1");
    caption.innerText = `Total Correct answers ${numberOFCorrect}`;
    totalBar.classList.add("totalBar");
    const wrapper = document.createElement("div");
    wrapper.classList.add("wrapper");
    wrapper.append(caption, totalBar);
    const tbody = document.createElement("tbody");

    render.logicArray.forEach((item, index) => {
      const tr = document.createElement("tr");
      const questionTDNum = document.createElement("td");
      if (index > 20) {
        return;
      }
      questionTDNum.innerText = `#${index + 1}`;

      item.GuessCorrect
        ? tr.classList.add("GuessCorrect")
        : tr.classList.add("GuessIncorrect");
      const incorectTD = document.createElement("td");
      incorectTD.classList.add("incorTD");
      const correctTD = document.createElement("td");
      correctTD.classList.add("corTD");

      item.incorrect_answers.forEach((item, index) => {
        const div = document.createElement("div");
        const p = document.createElement("p");
        p.innerText = item;
        div.appendChild(p);
        incorectTD.appendChild(div);
      });

      const correctP = document.createElement("p");
      correctP.innerText = item.correct_answer;
      correctTD.appendChild(correctP);
      tr.append(questionTDNum, incorectTD, correctTD);
      tbody.appendChild(tr);
    });
    const thead = document.createElement("thead");
    const th1 = document.createElement("th");
    const th2 = document.createElement("th");
    th1.innerText = "Wrong Answers";
    th2.innerText = "Correct Answer";
    thead.append(th1, th2);
    table.append(thead, tbody);
    quizContainer.append(wrapper, table, startAgainBtn);
  }
  static handleSubmit(arg) {
    render.logicArray.push(arg);
    const dataForStorage = JSON.stringify(render.logicArray);
    localStorage.setItem("data", dataForStorage);
    window.location.hash = `question-${parseInt(render.change()) + 1}`;
  }

  static change() {
    const hash = window.location.hash;
    const questionNumber = hash.split("-")[1];
    return questionNumber;
  }

  static loadQuestions(questionIndex) {
    const question = qArray.results[questionIndex - 1];
    quizContainer.innerHTML = "";
    const qSubCategory = document.createElement("h3");
    const qTitle = document.createElement("h2");

    const barText = `Completed ${questionIndex - 1}/20`;
    const cAnswer = document.createElement("p");
    const barTitle = document.createElement("p");

    const qDiv = document.createElement("div");
    qDiv.classList.add("btnDiv");
    const allQuestionsArary = [
      ...question.incorrect_answers,
      question.correct_answer,
    ];

    for (let index = 0; index < allQuestionsArary.length; index++) {
      const questionString = allQuestionsArary[index];
      const btn = document.createElement("button");
      btn.classList.add("animate__animated");
      btn.classList.add("animate__pulse");

      btn.innerText = questionString;
      qDiv.appendChild(btn);

      btn.addEventListener("click", (event) => {
        const chosen_answer = btn.innerText;

        const result = question.correct_answer === btn.innerText ? true : false;
        render.handleSubmit({
          incorrect_answers: question.incorrect_answers,
          correct_answer: question.correct_answer,
          chosen_answer: chosen_answer,
          GuessCorrect: result,
        });
      });
    }

    const barDiv = document.createElement("div");
    barDiv.classList.add("barDiv");
    const bar = document.createElement("progress");
    bar.classList.add("bar");
    bar.setAttribute("max", qArray.results.length);
    bar.setAttribute("min", 0);
    bar.setAttribute("value", questionIndex - 1);

    barDiv.append(bar, barTitle);
    qTitle.innerText = decodeHTML(question.question);
    qSubCategory.innerText = `Category: ${question.category}`;
    barTitle.innerText = barText;
    cAnswer.innerText = question.correct_answer;

    quizContainer.append(qTitle, qSubCategory, qDiv, barDiv);
    quizContainer.style.display = "flex";
  }
}

function decodeHTML(text) {
  var textArea = document.createElement("textarea");
  textArea.innerHTML = text;
  return textArea.value;
}
