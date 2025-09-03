<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Proyectos Institucionales</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Lora&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/cabecera.css" />
  <style>
    body {
      margin: 0;
      font-family: 'Lora', serif;
      background-color: #f5f5f5;
    }

    .galeria {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
      max-width: 1100px;
      margin: 40px auto;
      padding: 0 20px;
    }

    .caja {
      border-radius: 15px;
      overflow: hidden;
      background-color: white;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .caja:hover {
      transform: translateY(-5px);
    }

    .caja img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      display: block;
    }

    .descripcion {
      padding: 15px;
    }

    .descripcion h3 {
      color: #7c0b0b;
      margin: 0 0 5px 0;
      font-family: 'Cinzel', serif;
    }

    .descripcion p {
      margin: 0;
      color: #555;
      font-size: 0.95rem;
      font-family: 'Lora', serif;
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
  </style>
</head>

<body>

  <header>
    <?php include 'cabecera.php'; ?>
  </header>

  <div class="galeria">
    <div class="caja">
      <img src="img/IMG-20250729-WA0007.jpg" alt="Proyecto 1" />
      <div class="descripcion">
        <h3>proyecto</h3>
        <p>descripcion del proyecto.</p>
      </div>
    </div>
    <div class="caja">
      <img src="img/IMG-20250729-WA0011.jpg" alt="Proyecto 2" />
      <div class="descripcion">
        <h3>proyecto</h3>
        <p>descripcion del proyecto</p>
      </div>
    </div>
  </div>

  <button class="boton-volver" onclick="history.back()">Volver</button>

  <footer>
    <?php include 'piedepagina.php'; ?>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/cabecera.js"></script>

</body>

</html>