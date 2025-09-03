<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Galería de fotos</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Lora:wght@400;700&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Lora&display=swap');

    body {
      margin: 0;
      font-family: 'Lora', serif;
      background-color: #f0f0f0;
      color: #000;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    button {
      font-family: 'Cinzel', serif;
    }

    .galeria {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 0;
    }

    .galeria img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 8px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      will-change: transform;
    }

    .galeria img:hover {
      transform: translateY(-10px) scale(1.03);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
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
      margin-top: 40px;
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
  <link rel="stylesheet" href="css/cabecera.css" />
</head>

<body>
  <header>
    <?php include 'cabecera.php'; ?>
  </header>

  <div class="galeria">
    <img src="/img/IMG-20250729-WA0007.jpg" alt="Imagen 1">
    <img src="/img/IMG-20250729-WA0008.jpg" alt="Imagen 2">
    <img src="/img/IMG-20250729-WA0009.jpg" alt="Imagen 3">
    <img src="/img/IMG-20250729-WA0010.jpg" alt="Imagen 4">
    <img src="/img/IMG-20250729-WA0011.jpg" alt="Imagen 5">
    <img src="/img/IMG-20250729-WA0012.jpg" alt="Imagen 6">
    <img src="/img/IMG-20250729-WA0013.jpg" alt="Imagen 7">
    <img src="/img/IMG-20250729-WA0014.jpg" alt="Imagen 8">
    <img src="/img/IMG-20250729-WA0015.jpg" alt="Imagen 9">
    <img src="/img/IMG-20250729-WA0016.jpg" alt="Imagen 10">
    <img src="/img/IMG-20250729-WA0017.jpg" alt="Imagen 11">
    <img src="/img/IMG-20250729-WA0019.jpg" alt="Imagen 12">
    <img src="/img/IMG-20250729-WA0020.jpg" alt="Imagen 13">
    <img src="/img/IMG-20250729-WA0021.jpg" alt="Imagen 14">
    <img src="/img/IMG-20250729-WA0022.jpg" alt="Imagen 15">
    <img src="/img/IMG-20250729-WA0023.jpg" alt="Imagen 16">
    <img src="/img/IMG-20250729-WA0024.jpg" alt="Imagen 17">
    <img src="/img/IMG-20250729-WA0025.jpg" alt="Imagen 18">
    <img src="/img/IMG-20250729-WA0026.jpg" alt="Imagen 19">
    <img src="/img/IMG-20250729-WA0027.jpg" alt="Imagen 20">
    <img src="/img/IMG-20250729-WA0028.jpg" alt="Imagen 21">
    <img src="/img/IMG-20250729-WA0029.jpg" alt="Imagen 22">
  </div>

  <button class="boton-volver" onclick="history.back()">Volver</button>

  <footer>
    <?php include 'piedepagina.php'; ?>
  </footer>

  <script src="js/cabecera.js"></script>

</body>

</html>