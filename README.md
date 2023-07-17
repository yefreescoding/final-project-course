# Proyecto final de curso

Este es un sitio web creado para presentar como proyecto final. Boxing-match es el nombre del sitio, espacio dedicado para las personas que se quieren mantener al dia con los mas recientes combates.

## Tabla de contenidos

- [General](#general)
  - [El proyecto](#the-challenge)
  - [Links](#links)
- [Mi proceso](#mi-proceso)
  - [Herramientas](#herramientas-que-he-utilizado)
  - [Recursos](#recursos)
- [Autor](#autor)

## General

### El proyecto.

Crear un sitio web desde cero, utilizando las herramientas de programación aprendidas durante el curso.

Los usuarios que visiten el sitio web deberán de:

- Poder navegar a traves de la pagina con relativa facilidad. Y leer de manera correcta el contenido mostrado.
- Ver el contenido de la pagina, independientemente del dispositivo que utilicen. Smartphone, tablet, o pc de escritorio.
- Poder interactuar con los elementos clickable del sitio.

### Links

- Repositorio donde se guardan los archivos: [Github](git@github.com:yefreescoding/final-project-course.git)
- Este es el link del sitio web: [boxing-match](https://proyecto-final-colon.000webhostapp.com/index.php)

## Mi proceso

### Herramientas que he utilizado.

- HTML5
- CSS
- Flexbox
- CSS Grid
- JavaScript
- PHP
- MySQL
- Mobile-first workflow
- XAMPP
- PhPmyadmin

### ¿Qué he aprendido?

Las cosas mas importantes que he aprendido mientras realizaba este proyecto:

#### 1. Comunicación de mi aplicación con la base de datos, para mostrar contenido dinámico en la pagina:

```php
<?php
  $conexion = conectar();
  $sql = "SELECT b1.name AS fighter1, b2.name AS fighter2, date, place
          FROM fights
          INNER JOIN boxers b1 ON fights.boxer1_id = b1.id
          INNER JOIN boxers b2 ON fights.boxer2_id = b2.id
          WHERE fights.date BETWEEN '2023-07-01' AND '2023-07-31'
          ORDER BY date";
  $resultado = consultar($conexion, $sql);
  $peleas = array();
  while ( $registro = mysqli_fetch_assoc($resultado) ) {
      array_push($peleas, $registro);
  }
  cerrar($conexion);
  ?>
<?php
  foreach ( $peleas as $pelea ) {
?>
<article class="peleas__article">
  <h3>
    <span class="highlight">
      <?php echo $pelea["fighter1"], ' Vs ', $pelea["fighter2"]; ?></span
    ><br />
  </h3>
  <p>
    <span class="article__date" style="display: block;"
      ><?php echo $pelea["date"]; ?></span
    >
    <?php echo $pelea["place"]; ?>
  </p>
</article>
<?php
            }
          ?>
```

#### 2. Un sin numero de formas de seleccionar elementos para poder estilarlos con CSS, aquí algunos ejemplos:

```css
.peleas-video > * {
  flex-basis: 20em;
  flex-grow: 1;
}
```

#### 3. Variables en CSS:

```css
:root {
  --fs--2: clamp(0.78rem, calc(0.77rem + 0.03vw), 0.8rem);
  --fs--1: clamp(0.94rem, calc(0.92rem + 0.11vw), 1rem);
  --fs-0: clamp(1.13rem, calc(1.08rem + 0.22vw), 1.25rem);
  --fs-1: clamp(1.35rem, calc(1.28rem + 0.37vw), 1.56rem);
  --fs-2: clamp(1.4rem, calc(1.2rem + 0.58vw), 1.95rem);
  --fs-3: clamp(2rem, calc(1rem + 1.7vw), 4rem);
  --fs-4: clamp(2.5rem, calc(1rem + 3vw), 5rem);
  --fs-5: clamp(2rem, calc(1rem + 15vw), 18rem);
  --ff-boxing: 'fighter';
  --ff-boxing: 'Boxing';

  --text: hsl(0, 0%, 100%);
  --text-2: hsl(0, 0%, 10%);
  --background: #080707;
  --background-2: #cfc8c8;
  --primary-button: #858893;
  --secondary-button: #000000;
  --accent: hsl(7, 70%, 49%);
}
```

#### 4. Como utilizar JavaScript para modificar los elementos del DOM:

```js
const nav = document.querySelector('.nav');

window.addEventListener('scroll', function () {
  const scrollHeight = window.pageYOffset;
  const navHeight = nav.getBoundingClientRect().height;
  if (scrollHeight > navHeight) {
    nav.classList.add('fixed-nav');
  } else {
    nav.classList.remove('fixed-nav');
  }
});
```

#### 5. También, como obtener datos de un documento externo para de esta manera crear componentes HTML de manera dinámica con los datos obtenidos:

```js
fetch('src/javascript/Data/boxers.json')
  .then((response) => response.json())
  .then((boxers) => {
    const BOXERS = boxers.slice(0, 6);
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
    ).join('');
  });
```

### Cosas que quiero añadir en un futuro

Me gustaría añadir una especie de Wikipedia, pero de los boxeadores. Una biografía de cada uno de ellos y su record profesional. Cada boxeador con su propia pagina.

También un registro donde los usuarios que quieran, puedan registrarse con sun correo y de esta manera hacerles llegar mails, con las ultimas noticias.

### Recursos

- [Example resource 1](https://www.example.com) - This helped me for XYZ reason. I really liked this pattern and will use it going forward.
- [Example resource 2](https://www.example.com) - This is an amazing article which helped me finally understand XYZ. I'd recommend it to anyone still learning this concept.

## Author

Yefree De Los Santos Valdez

- Portfolio - [Mi portfolio](https://yefreevaldezdev.vercel.app)
- Cuenta de Github - [yefreescoding](https://github.com/yefreescoding)
