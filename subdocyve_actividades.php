<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Actividades complementarias</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Lora&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/cabecera.css" />
  <style>
    body {
      margin: 0;
      font-family: 'Lora', serif;
      background: #f9f5f7;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      color: #3a0e28;
    }

    header h1 {
      font-family: 'Cinzel', serif;
      font-size: 3rem;
      color: #fff;
      margin: 0;
      letter-spacing: 3px;
      text-shadow: 0 2px 5px rgba(0, 0, 0, 0.4);
      text-align: center;
      padding: 40px 20px;
      background: linear-gradient(90deg, #5d1918e4, #491028);
    }

    main {
      flex-grow: 1;
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap: 25px;
      max-width: 1200px;
      margin: 40px auto;
      padding: 0 15px;
    }

    .caja {
      background: white;
      border-radius: 16px;
      display: flex;
      flex-direction: column;
      transition: transform 0.3s ease;
    }

    .caja:hover {
      transform: translateY(-10px) scale(1.03);
    }

    .caja img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      transition: transform 0.4s ease;
    }

    .caja:hover img {
      transform: scale(1.1);
    }

    .caja-contenido {
      padding: 20px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      font-family: 'Lora', serif;
      color: #4a0b0b;
    }

    .caja-titulo {
      font-family: 'Cinzel', serif;
      font-size: 1.5rem;
      margin: 0 0 10px 0;
      color: #4a0b0b;
      text-shadow: 1px 1px 2px rgba(214, 166, 189, 0.4);
    }

    .caja-fecha {
      font-weight: 600;
      color: #4a0b0b;
      margin-bottom: 15px;
    }

    .caja-desc {
      font-size: 1rem;
      line-height: 1.4;
      flex-grow: 1;
    }

    .boton-volver {
      position: relative;
      left: 23.5cm;
      padding: 12px 28px;
      font-size: 1rem;
      background-color: #7c0b0b88;
      border: none;
      border-radius: 25px;
      width: 100px;
      font-family: 'Lora', serif;
      cursor: pointer;
      transition: transform 0.3s ease;
      color: black;
    }

    .boton-volver:hover {
      transform: scale(1.05);
    }

    footer {
      margin-top: auto;
      padding: 20px;
      font-size: 0.9rem;
      color: #555;
      text-align: center;
      font-family: 'Lora', serif;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>

  <header>
    <?php include 'cabecera.php'; ?>
  </header>

  <main>
    <article class="caja" aria-label="Concurso de Bandas">
      <img src="img/IMG-20250729-WA0009.jpg" alt="Concurso de Bandas" />
      <div class="caja-contenido">
        <h2 class="caja-titulo">Concurso de Bandas</h2>
        <p class="caja-fecha">FECHA</p>
        <p class="caja-desc">Descripcion de la actividad</p>
      </div>
    </article>

    <article class="caja" aria-label="Dia del maestro">
      <img src="img/IMG-20250729-WA0013.jpg" alt="Dia del maestro" />
      <div class="caja-contenido">
        <h2 class="caja-titulo">Dia del maestro</h2>
        <p class="caja-fecha">06 Julio 2025</p>
        <p class="caja-desc">Descripcion de la actividad</p>
      </div>
    </article>

    <article class="caja" aria-label="Campeonato de futbol mujeres">
      <img src="img/IMG-20250729-WA0014.jpg" alt="Campeonato " />
      <div class="caja-contenido">
        <h2 class="caja-titulo">Campeonato de futbol mujeres</h2>
        <p class="caja-fecha">fecha</p>
        <p class="caja-desc">Descripcion de la actividad</p>
      </div>
    </article>

    <article class="caja" aria-label="Desfile">
      <img src="img/1IMG-20250729-WA0019.jpg" alt="Desfile" />
      <div class="caja-contenido">
        <h2 class="caja-titulo">Desfile</h2>
        <p class="caja-fecha">FECHA</p>
        <p class="caja-desc">Descripcion de la actividad</p>
      </div>
    </article>
  </main>

  <button class="boton-volver" onclick="history.back()">Volver</button>

  <footer>
    <?php include 'piedepagina.php'; ?>
  </footer>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="js/cabecera.js"></script>

</body>

</html>