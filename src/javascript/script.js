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
                    alt="imagen del evento de combate profesional de boxeo entre ${pelea.boxer1} Vs ${pelea.boxer2}"
                  />
                <div class="">
                  <h3>
                    <span class="highlight">${pelea.boxer1} Vs ${pelea.boxer2}</span> <br />
                    ${pelea.description}
                  </h3>
                  <span class="article__date">${pelea.date}</span>
                  <p>
                      ${pelea.place}
                  </p>
                </div>
              </article>`
        )
        .join("");
    });

  fetch("src/javascript/Data/boxers.json")
    .then((response) => response.json())
    .then((boxers) => {
      const BOXERS = boxers.slice(0, 9);
      boxeadoresCont.innerHTML = BOXERS.map(
        (boxer) =>
          `<article class="card">
            <img
              src=${boxer.image}
              alt=""
            />
            <div class="card__content">
              <h3 class="card__title">${boxer.name}</h3>
              <span class="record">${boxer.record}</span>
             
            </div>
          </article>`
      ).join("");
    });
});

//  <p class="card__description">${boxer.bio}</p>;

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
