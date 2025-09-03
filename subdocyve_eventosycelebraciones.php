<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eventos y celebraciones</title>
  <link rel="stylesheet" href="css/cabecera.css" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Lora&display=swap" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/cabecera.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/cabecera.js"></script>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Lora', serif;
      background-color: #f5f5f5;
    }

    .contenedor {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 30px;
      max-width: 1200px;
      margin: 40px auto;
      padding: 0 20px;
    }

    .grande,
    .pequeno {
      background-color: white;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .grande:hover,
    .pequeno:hover {
      transform: translateY(-5px);
    }

    .grande img,
    .pequeno img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      display: block;
    }

    .contenido {
      padding: 20px;
    }

    .titulo {
      color: #7c0b0b;
      font-size: 1.4rem;
      margin-bottom: 10px;
      font-weight: bold;
      font-family: 'Cinzel', serif;
    }

    .descripcion {
      color: #555;
      font-size: 0.95rem;
      font-family: 'Lora', serif;
    }

    .lugarfecha {
      font-family: 'Lora', serif;
      font-style: italic;
      color: rgb(47, 16, 16);
      font-size: 1rem;
      margin-top: 10px;
    }

    .columna-derecha {
      display: flex;
      flex-direction: column;
      gap: 30px;
    }

    .boton-volver {
      display: block;
      margin: 50px auto 20px auto;
      padding: 12px 28px;
      font-size: 1rem;
      background-color: #7c0b0b88;
      color: rgb(0, 0, 0);
      border: none;
      border-radius: 25px;
      cursor: pointer;
    }

    .boton-volver:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
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
        transform: translateY(20px);
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
  <div class="contenedor">
    <div class="grande">
      <img src="img/IMG-20250729-WA0015.jpg" alt="Imagen grande">
      <div class="contenido">
        <div class="titulo">nombre del evento</div>
        <div class="lugarfecha">lugar | fecha</div>
        <div class="descripcion">descripcion del evento.</div>
      </div>
    </div>
    <div class="columna-derecha">
      <div class="pequeno">
        <img src="img/IMG-20250729-WA0007.jpg" alt="Imagen 1">
        <div class="contenido">
          <div class="titulo">nombre</div>
          <div class="lugarfecha">lugar | fecha</div>
          <div class="descripcion">descripcion.</div>
        </div>
      </div>
      <div class="pequeno">
        <img src="img/IMG-20250729-WA0021.jpg" alt="Imagen 2">
        <div class="contenido">
          <div class="titulo">excursion</div>
          <div class="lugarfecha">lugar | fecha</div>
          <div class="descripcion">descripcion.</div>
        </div>
      </div>
    </div>
  </div>
  <button class="boton-volver" onclick="history.back()"> Volver</button>
  <footer>
    <?php include 'piedepagina.php'; ?>
  </footer>
  <script src="js/cabecera.js"></script>
</body>

</html>