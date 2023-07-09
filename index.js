const bookArray = [
  {
    title: "Children of the Corn",
    author: "Julia Spera",
    maxPages: 931,
    onPage: 401,
  },
  {
    title: "Jellyfish (Meduzot)",
    author: "Jase Ygou",
    maxPages: 277,
    onPage: 125,
  },

  {
    title: "Horrible Dr. Hichcock, The",
    author: "Nick Matskevich",
    maxPages: 425,
    onPage: 942,
  },
  {
    title: "From the Earth to the Moon",
    author: "Timoteo Mercey",
    maxPages: 100,
    onPage: 39,
  },
  {
    title: "Final Destination 5",
    author: "Roxie Durtnal",
    maxPages: 589,
    onPage: 592,
  },
  { title: "Goal! III", author: "Viola McGlynn", maxPages: 814, onPage: 393 },
  { title: "8 Seconds", author: "Arvy Care", maxPages: 775, onPage: 335 },
  {
    title: "White, Red and Verdone",
    author: "Shanon O'Doherty",
    maxPages: 78,
    onPage: 160,
  },
  { title: "Pigs", author: "Bryna Iron", maxPages: 135, onPage: 646 },
  { title: "Faster", author: "Blondelle Semark", maxPages: 183, onPage: 292 },
  {
    title:
      "Evangelion: 1.0 You Are (Not) Alone (Evangerion shin gekijôban: Jo)",
    author: "Nelson Deyenhardt",
    maxPages: 908,
    onPage: 350,
  },
  {
    title: "Dealin' with Idiots",
    author: "Jonell Godsafe",
    maxPages: 56,
    onPage: 700,
  },
  {
    title: "Buy the Ticket, Take the Ride: Hunter S. Thompson on Film",
    author: "Revkah Larraway",
    maxPages: 109,
    onPage: 587,
  },
  {
    title: "Problem Child 2",
    author: "Jessamine Tayt",
    maxPages: 837,
    onPage: 837,
  },
  {
    title: "I'm Not There",
    author: "Archibaldo Corker",
    maxPages: 934,
    onPage: 605,
  },
  {
    title: "Nothing to Lose (a.k.a. Ten Benny)",
    author: "Caritta Greg",
    maxPages: 253,
    onPage: 253,
  },
  {
    title: "As You Like It",
    author: "Rhona Domeney",
    maxPages: 717,
    onPage: 148,
  },
  {
    title: "Direct Action",
    author: "Norby Gandrich",
    maxPages: 601,
    onPage: 801,
  },
  {
    title: "Happy Accidents",
    author: "Urbanus Yegorchenkov",
    maxPages: 880,
    onPage: 287,
  },
  {
    title: "Day After Trinity, The",
    author: "Vevay Arthars",
    maxPages: 263,
    onPage: 133,
  },
];
const bookTable = document.querySelector("tbody");

if (window.sessionStorage.getItem("newBook") !== null) {
  const newBookArray = window.sessionStorage.getItem("newBook");

  bookArray.push(JSON.parse(newBookArray));
}

const readStatus = (value) => {
  if (value.maxPages >= value.onPage) {
    return `<li class="read" >You already read ${value.title} by ${value.author}</li>`;
  } else {
    return `<li class="notread" >You still need to read ${value.title} by ${value.author}</li>`;
  }
};

bookArray.flat().forEach(function (value, index) {
  const rowList = document.createElement("tr");
  rowList.innerHTML = `<td><ul>
  <li>${value.title}</li>
  <li>${value.author}</li>
  ${readStatus(value)}
  </ul></td>`;

  const progresBar = document.createElement("progress");
  progresBar.classList.add("progress-bar");
  progresBar.animate([{ opacity: 0 }, { opacity: 1 }], {
    duration: 300,
    delay: 200,
    fill: "forwards",
    easing: "ease-in-out",
  });
  const progresBarValue = (value.onPage / value.maxPages) * 100;
  progresBar.setAttribute("value", progresBarValue);
  progresBar.setAttribute("max", "100");
  const td = document.createElement("td");
  td.appendChild(progresBar);
  rowList.appendChild(td);
  bookTable.appendChild(rowList);
});

const submitForm = document.querySelector("form");
submitForm.addEventListener("submit", function (e) {
  e.preventDefault();
  const title = document.querySelector("#bookName").value;
  const author = document.querySelector("#authorName").value;
  const maxPages = document.querySelector("#numberOfPages").value;
  const onPage = document.querySelector("#currentPage").value;

  const newBook = [
    {
      title: title,
      author: author,
      maxPages: maxPages,
      onPage: onPage,
    },
  ];
  const oldArray = () => {
    if (window.sessionStorage.getItem("newBook") !== null) {
      return JSON.parse(window.sessionStorage.getItem("newBook"));
    } else {
      return [];
    }
  };

  window.sessionStorage.setItem(
    "newBook",
    JSON.stringify([...oldArray(), newBook[0]])
  );
  window.location.reload();
});
