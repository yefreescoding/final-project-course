// Test de informacion de peleadores
const peleasContenedor = document.querySelector("#fights-container");
const boxeadoresContenedor = document.querySelector("#fighters-container");

window.addEventListener("DOMContentLoaded", function () {
  let mostrarPeleas = peleas.map((pelea) => {
    return ` <article class="peleas__article">
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
          </article>`;
  });
  mostrarPeleas = mostrarPeleas.join("");
  peleasContenedor.innerHTML = mostrarPeleas;

  let mostrarBoxeadores = boxers.map((boxer) => {
    return `<article class="card">
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
          </article>`;
  });
  mostrarBoxeadores = mostrarBoxeadores.join("");
  boxeadoresContenedor.innerHTML = mostrarBoxeadores;
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
