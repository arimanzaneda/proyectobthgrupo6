<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AMBIENTES</title>
  <link rel="stylesheet" href="css/cabecera.css" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Lora&display=swap" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    body {
      font-family: 'Lora', serif;
      background: #f5f5f5;
      margin: 0;
      padding: 0;
    }

    .encabezado {
      font-family: 'Cinzel', serif;
      width: 100%;
      padding: 50px 0;
      font-size: 2rem;
      font-weight: 700;
      text-align: center;
      letter-spacing: 3px;
      user-select: none;
      box-shadow: 0 4px 8px rgba(114, 40, 32, 0.616);
      margin-bottom: 30px;
      background-color: #61231c;
      color: white;
    }

    .galeria {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      max-width: 1200px;
      margin: 0 auto 40px auto;
      padding: 0 15px;
    }

    .cajita {
      position: relative;
      overflow: hidden;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
      background: #fff;
    }

    .cajita img {
      width: 100%;
      height: 250px;
      object-fit: cover;
      display: block;
      transition: transform 0.4s ease;
    }

    .cajita:hover img {
      transform: scale(1.1);
      filter: brightness(0.6);
    }

    .texto-hover {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 15px;
      color: white;
      font-weight: 600;
      font-size: 1.1rem;
      background: rgba(0, 0, 0, 0.4);
      opacity: 0;
      transition: opacity 0.4s ease;
      pointer-events: none;
      font-family: 'Cinzel', serif;
    }

    .cajita:hover .texto-hover {
      opacity: 1;
      pointer-events: auto;
    }

    .boton-volver {
      display: block;
      margin: 30px auto 0 auto;
      padding: 12px 28px;
      font-size: 1rem;
      background-color: #7c0b0b88;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      font-family: 'Lora', serif;
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

    @keyframes slideIn {
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

  <div class="encabezado">Ambientes</div>

  <div class="galeria">
    <div class="cajita">
      <img src="img/IMG-20250729-WA0012.jpg" alt="Aulas" />
      <div class="texto-hover">Aulas</div>
    </div>
    <div class="cajita">
      <img src="img/IMG-20250729-WA0027.jpg" alt="Entrada" />
      <div class="texto-hover">Entrada</div>
    </div>
    <div class="cajita">
      <img src="img/IMG-20250729-WA0010.jpg" alt="Cancha" />
      <div class="texto-hover">Cancha</div>
    </div>
    <div class="cajita">
      <img src="img/IMG-20250729-WA0028.jpg" alt="Cancha" />
      <div class="texto-hover">Cancha</div>
    </div>
  </div>

  <button class="boton-volver" onclick="history.back()"> Volver</button>

 <Br><br><br><br><Br><br><br><br>
    <?php include 'piedepagina.php'; ?>
  

  <script src="js/cabecera.js"></script>

</body>

</html>