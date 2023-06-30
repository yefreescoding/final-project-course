// Test de informacion de peleadores

const peleas = [
  {
    boxer1: "Andre Ward",
    boxer2: "Mikael Tyson",
    date: "Martes 7 Jul, 2023.",
    description: "Pelea de peso completo",
    place: "Los Angeles California, EEUU.",
    image: "../public/images/article-images/article-fight-img.webp",
  },
  {
    boxer1: "Jackie Chan",
    boxer2: "Mera Cruz",
    date: "Martes 7 Jul, 2023.",
    description: "Pelea de pesoligreo",
    place: "Los Angeles California, EEUU.",
    image: "../public/images/article-images/fight-2.webp",
  },
  {
    boxer1: "Ruslav Molkinivking",
    boxer2: "Antonio Machado",
    description: "Pelea de pesoligreo",
    date: "Martes 7 Jul, 2023.",
    place: "Los Angeles California, EEUU.",
    image: "../public/images/article-images/article-fight-img.webp",
  },
  {
    boxer1: "Xi Xiaonj",
    boxer2: "Julio Gustico",
    description: "Pelea de pesoligreo",
    date: "Martes 7 Jul, 2023.",
    place: "Los Angeles California, EEUU.",
    image: "../public/images/article-images/article-fight-img.webp",
  },
];

const peleasContenedor = document.querySelector("#fights-container");

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
            <span class="aricle__date">${pelea.date}</span>
            <p>
                ${pelea.place}
            </p>
          </article>`;
  });
  mostrarPeleas = mostrarPeleas.join("");
  peleasContenedor.innerHTML = mostrarPeleas;
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
