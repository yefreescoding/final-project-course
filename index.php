<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Linked fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap"
      rel="stylesheet"
    />
    <!-- Link styles -->
    <link rel="stylesheet" href="src/estilos/global.css" />
    <!-- Link script -->
    <script src="src/javascript/script.js" defer></script>
    <title>BOXING MATCH | HOME</title>
    <?php
      include "./database/funciones.php";
    ?>
  </head>
  <body>
    <header class="header">
      <nav class="header__nav nav">
        <img
          class="icons"
          src="public/icons/rating.avif"
          alt="Iconos de estrellas"
        />
        <a href="#inicio" class="nav__link">Inicio</a>
        <a href="#fights" class="nav__link">peleas</a>
        <a href="#fighters" class="nav__link">boxeadores</a>
        <a href="#ranking" class="nav__link">ranking</a>
        <a href="index.html" class="nav__link">sobre nosotros</a>
        <img
          class="icons"
          src="public/icons/rating.avif"
          alt="Iconos de estrellas"
        />
      </nav>
      <div class="header__sponsor">
        <div class="header__ads">
          <h2>Yokohoma Arena</h2>
          <p>Yokohama, Japon.</p>
        </div>
        <div class="header__ads">
          <h2>CMB y OMB</h2>
          <p>supergallo</p>
        </div>
        <div class="header__ads">
          <h2>SAB. MAYO 7</h2>
          <p>En vivo por PPV</p>
        </div>
      </div>
      <div id="inicio" class="header__logo" aria-label="Logo de la pagina">
        <h1 class="header__h1">BOXING MATCH</h1>
      </div>
    </header>
    <main class="main">
      <section
        class="section main__cover"
        aria-label="Portada del proximo combate"
      >
        <!-- <div class="main__images">
        </div> -->
        <div class="main__text">
          <h2>Aquí encontraras lo ultimo del mundo del boxeo.</h2>
          <p>
            Peleas, boxeadores, ranking, etc... Toda la informacion de todo lo
            relacionado al boxeo esta aqui. Adelante se parte de la comunidad,
            no te pierdas nada.
          </p>
          <div class="main__actions">
            <a class="btn principal" href="https://www.espn.com/espnplus/player/_/id/4b3e3840-b3ba-4cea-a101-3e0ddf410280#bucketId=1" target="_blank">Ver combate</a>
            <a class="btn secondary" href="/">info boxeadores</a>
          </div>
        </div>
      </section>
      <div class="carousel">
        <span class="carousel__span"> Naoya Inoue</span>
        <span class="carousel__span"> VS </span>
        <span class="carousel__span"> Stephen Fulton </span>
      </div>
      <section
        id="fights"
        class="section peleas"
        aria-label="Proximos combates"
      >
        <h2>PRÓXIMAS GRANDES PELEAS</h2>
        <p>
          Las peleas mas destacadas de los proximos meses. ¡Las que no te puedes perder!
        </p>
        <div id="fights-container" class="peleas__container">
          <!-- Peleas -->
        </div>
        <h2>PELEAS EN JULIO</h2>
        <div id="next-month" class="peleas__container">
          <?php
            $conexion = conectar();
            $sql = "SELECT b1.name AS fighter1, b2.name AS fighter2
                    FROM fights
                    INNER JOIN boxers b1 ON fights.boxer1_id = b1.id
                    INNER JOIN boxers b2 ON fights.boxer2_id = b2.id";
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
                <img
                  src=${pelea.image}
                  alt=""
                />
                <h3>
                  <span class="highlight"> <?php echo $pelea["fighter1"], ' Vs ', $pelea["fighter2"]; ?></span><br />
                  000 lbs
                </h3>
                <span class="article__date">00.00.0000</span>
                <p>
                    ABCDEF, USA. DEFGHJ.
                </p>
              </article>
            <?php
            }
          ?>
        </div>
      </section>
      <section id="fighters" class="section" aria-label="Peleadores destacados">
        <h2>BOXEADORES DESTACADOS</h2>
        <p>
          ¿Quienes son los boxeadores mas destacados del momento? Aqui los
          encontraras a todos. Hechale un vistazo!
        </p>
        <div id="fighters-container" class="peleas__container">
          <!-- boxers -->
        </div>
      </section>
      <section
        id="ranking"
        class="section"
        aria-label="Ranking de los mejores boxeadores"
      >
 
        <h2>Ranking P4P.</h2>
        <table id="ranking-p4p" class="table">
          <caption>
            La lista de los 20 mejores peleadores libra por libra
          </caption>
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Pais</th>
              <th>Categoria</th>
              <th>Record</th>
            </tr>
          </thead>
          <tbody id="ranking-container">
            <!-- ranking displayed js -->
             <?php
            foreach ( $boxeadores as $boxeador ) {
        ?>
        <tr class="">
            <td data-cell="rank"><?php echo $boxeador["p4p_ranking"]; ?></td>
            <td data-cell="name"><?php echo $boxeador["name"] ?></td>
            <td data-cell="country"><?php echo $boxeador["country"]; ?></td>
            <td data-cell="categoria"><?php echo $boxeador["weight"]; ?> lbs</td>
            <td data-cell="record"><?php echo $boxeador["record"] ?></td>
        </tr>
        <?php
    }
    ?>
          </tbody>
        </table>
      </section>
    </main>
    <footer class="footer">
      <header class="footer__top">
        <div class="footer__info">
          <div class="footer__logo">LOGO BOXINGMATCH</div>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita,
            quos? Ex quidem iusto veniam quasi reiciendis deserunt architecto.
          </p>
          <div class="footer__socials">
            <a href="index.html" class="footer__socials--link">
              <img
                src="public/icons/signo-de-twitter.png"
                alt="Social media icon"
                class="footer__icons icons"
              />
            </a>
            <a href="index.html" class="footer__socials--link">
              <img
                src="public/icons/instagram.png"
                alt="Social media icon"
                class="footer__icons icons"
              />
            </a>
            <a href="index.html" class="footer__socials--link">
              <img
                src="public/icons/facebook.png"
                alt="Social media icon"
                class="footer__icons icons"
              />
            </a>
            <a href="./database/index.php" class="footer__socials--link">
              <img
                src="public/icons/guante-de-boxeo.png"
                alt="Social media icon"
                class="footer__icons icons"
              />
            </a>
          </div>
        </div>
        <div class="footer__action">
          <ul class="footer__ul">
            <li><h3>titulo</h3></li>
            <li><a href="index.html">link</a></li>
            <li><a href="index.html">link</a></li>
            <li><a href="index.html">link</a></li>
          </ul>
          <ul class="footer__ul">
            <li><h3>titulo</h3></li>
            <li><a href="index.html">link</a></li>
            <li><a href="index.html">link</a></li>
            <li><a href="index.html">link</a></li>
          </ul>
          <ul class="footer__ul">
            <li><h3>titulo</h3></li>
            <li><a href="index.html">link</a></li>
            <li><a href="index.html">link</a></li>
            <li><a href="index.html">link</a></li>
          </ul>
        </div>
      </header>
      <div class="copyright">
        &copy; 2023 Boxing Match. Todos los derechos reservados.
      </div>
    </footer>
  </body>
</html>
