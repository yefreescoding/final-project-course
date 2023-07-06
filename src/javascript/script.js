// import data from "../data/boxers.json";

// Test de informacion de peleadores
const peleasCont = document.querySelector("#fights-container");
const boxeadoresCont = document.querySelector("#fighters-container");
const rankingCont = document.querySelector("#ranking-container");

window.addEventListener("DOMContentLoaded", function () {
  fetch("src/javascript/Data/fights.json")
    .then((response) => response.json())
    .then((fights) => {
      const firstThreeElements = fights.slice(0, 3);
      peleasCont.innerHTML = firstThreeElements
        .map(
          (pelea) =>
            ` <article class="peleas__article">
            <img
              src=${pelea.image}
              alt=""
            />
            <h3>
              <span class="highlight">${pelea.boxer1} Vs ${pelea.boxer2}</span> <br />
              ${pelea.description}
            </h3>
            <span class="article__date">${pelea.date}</span>
            <p>
                ${pelea.place}
            </p>
          </article>`
        )
        .join("");
    });

  fetch("src/javascript/Data/boxers.json")
    .then((response) => response.json())
    .then((boxers) => {
      const firstThreeBoxers = boxers.slice(0, 4);
      boxeadoresCont.innerHTML = firstThreeBoxers
        .map(
          (boxer) =>
            `<article class="card">
            <img
              src=${boxer.image}
              alt=""
            />
            <div class="card__content">
              <h3 class="card__title">${boxer.name}</h3>
              <span class="record">${boxer.record}</span>
              <p class="card__description">
                ${boxer.bio}
              </p>
            </div>
          </article>`
        )
        .join("");
    });

  // fetch("src/javascript/Data/boxers.json")
  //   .then((response) => response.json())
  //   .then((boxers) => {
  //     const ranked = boxers.sort((a, b) => a.ranking - b.ranking);
  //     rankingCont.innerHTML = ranked
  //       .map(
  //         (boxer) =>
  //           `<tr>
  //             <td data-cell="rank">${boxer.ranking}</td>
  //             <td data-cell="name">${boxer.name}</td>
  //             <td data-cell="country">${boxer.country}</td>
  //             <td data-cell="record">${boxer.record}</td>
  //           </tr>`
  //       )
  //       .join("");
  //   });
});

const nav = document.querySelector(".nav");

window.addEventListener("scroll", function () {
  const scrollHeight = window.pageYOffset;
  const navHeight = nav.getBoundingClientRect().height;
  if (scrollHeight > navHeight) {
    nav.classList.add("fixed-nav");
  } else {
    nav.classList.remove("fixed-nav");
  }
});

// console.log(navHeight);
const icons = document.querySelectorAll(".icons");

const darkModeQuery = window.matchMedia("(prefers-color-scheme: light)");

function toggleDarkMode(event) {
  if (event.matches) {
    icons.forEach((icon) => icon.classList.add("icons-light"));
  } else {
    icons.forEach((icon) => icon.classList.remove("icons-light"));
  }
}

darkModeQuery.addEventListener("change", toggleDarkMode);
toggleDarkMode(darkModeQuery);
