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
        <img
          class="icons"
          src="public/icons/rating.avif"
          alt="Iconos de estrellas"
        />
      </nav>
      <div class="header__sponsor">
        <div class="header__ads">
          <h2>Yokohoma Arena</h2>
          <p>Tokyo, Japon.</p>
        </div>
        <div class="header__ads">
          <h2>WBC y WBO</h2>
          <p>supergallo</p>
        </div>
        <div class="header__ads">
          <h2>MAR. JUL 25</h2>
          <p>En vivo por ESPN</p>
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
      <div
        id="fights"
        class="section peleas"
        aria-label="Proximos combates"
      >
        <div aria-label="cabecera del contenido principal">
          <h2>PRÓXIMAS GRANDES PELEAS</h2>
          <p>
            Las peleas mas destacadas de los proximos meses. ¡Las que no te puedes perder!
          </p>
        </div>
        <section id="fights-container" class="peleas__container">
          <!-- Peleas -->
        </section>
        <section>
          <h2>PELEAS EN JULIO</h2>
          <div id="next-month" class="peleas__container">
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
                  <span class="highlight"> <?php echo $pelea["fighter1"], ' Vs ', $pelea["fighter2"]; ?></span><br />
                </h3>
                <p>
                  <span class="article__date" style="display: block;"><?php echo $pelea["date"]; ?></span>
                    <?php echo $pelea["place"]; ?>
                </p>
              </article>
            <?php
            }
          ?>
        </section>
        <section>
          <h2>PELEAS EN AGOSTO</h2>
          <div id="next-month" class="peleas__container">
            <?php
              $conexion = conectar();
              $sql = "SELECT b1.name AS fighter1, b2.name AS fighter2, date, place
                      FROM fights
                      INNER JOIN boxers b1 ON fights.boxer1_id = b1.id
                      INNER JOIN boxers b2 ON fights.boxer2_id = b2.id
                      WHERE fights.date BETWEEN '2023-08-01' AND '2023-08-31'
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
                    <span class="highlight"> <?php echo $pelea["fighter1"], ' Vs ', $pelea["fighter2"]; ?></span><br />
                  </h3>
                  <p>
                    <span class="article__date" style="display: block;"><?php echo $pelea["date"]; ?></span>
                      <?php echo $pelea["place"]; ?>
                  </p>
                </article>
              <?php
              }
            ?>
          </div>
        </section>
        <section>
          <h2>PELEAS EN SEPTIEMBRE</h2>
          <div id="next-month" class="peleas__container">
            <?php
              $conexion = conectar();
              $sql = "SELECT b1.name AS fighter1, b2.name AS fighter2, date, place
                      FROM fights
                      INNER JOIN boxers b1 ON fights.boxer1_id = b1.id
                      INNER JOIN boxers b2 ON fights.boxer2_id = b2.id
                      WHERE fights.date BETWEEN '2023-09-01' AND '2023-09-30'
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
                    <span class="highlight"> <?php echo $pelea["fighter1"], ' Vs ', $pelea["fighter2"]; ?></span><br />
                  </h3>
                  <p>
                    <span class="article__date" style="display: block;"><?php echo $pelea["date"]; ?></span>
                      <?php echo $pelea["place"]; ?>
                  </p>
                </article>
              <?php
              }
            ?>
          </div>
        </section>
      </div>
      <section class="peleas-video">
        <div>
          <iframe width="560" height="360" src="https://www.youtube.com/embed/uCr9wfxsOBY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <article>
          <h2>Las mejores peleas del 2022</h2>
          <p>
            Disfruta de una recapitulación de las mejores peleas del año pasado. ¡No hay duda de que dejaron la vara bastante alta!, y no decepcionaron a ningún fanático del boxeo.
          </p>
        </article>
      </section>
      <section id="fighters" class="section" aria-label="Peleadores destacados">
        <h2>BOXEADORES DESTACADOS DEL MES</h2>
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
      ><?php
            $conexion = conectar();
            $sql = "SELECT * FROM boxers ORDER BY p4p_ranking LIMIT 10";
            $resultado = consultar($conexion, $sql);
            $boxeadores = array();
            while ( $registro = mysqli_fetch_assoc($resultado) ) {
                array_push($boxeadores, $registro); 
            }
            cerrar($conexion);
            ?>
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
          <div class="footer__logo">BOXINGMATCH</div>
          <p>
            Toda la información que es presentada en la pagina es de su correcta utilización, y distribución.
          </p>
          <div class="footer__socials">
            <a href="https://www.twitter.com" class="footer__socials--link">
              <img
                src="public/icons/signo-de-twitter.png"
                alt="Social media icon"
                class="footer__icons icons"
              />
            </a>
            <a href="https://www.instagram.com" class="footer__socials--link">
              <img
                src="public/icons/instagram.png"
                alt="Social media icon"
                class="footer__icons icons"
              />
            </a>
            <a href="https://www.facebook.com" class="footer__socials--link">
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
            <li><h3>Redes</h3></li>
            <li><a href="index.html">Facebook</a></li>
            <li><a href="index.html">YouTube</a></li>
            <li><a href="index.html">Twitter</a></li>
          </ul>
          <ul class="footer__ul">
            <li><h3>Legales</h3></li>
            <li><a href="index.html">Copyright</a></li>
            <li><a href="index.html">Manejo de los datos</a></li>
            <li><a href="index.html">España</a></li>
          </ul>
          <ul class="footer__ul">
            <li><h3>Únete</h3></li>
            <li><a href="index.html">Correo</a></li>
            <li><a href="index.html">Posiciones</a></li>
            <li><a href="index.html">Equipo de desarrollo</a></li>
          </ul>
        </div>
      </header>
      <div class="copyright">
        &copy; 2023 Boxing Match. Todos los derechos reservados.
      </div>
    </footer>
  </body>
</html>
