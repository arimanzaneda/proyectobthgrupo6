<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ferias Científicas</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Lora:ital,wght@0,400;1,400&display=swap" rel="stylesheet" />
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
      padding: 0px 20px;
    }

    .imagen {
      position: relative;
      overflow: hidden;
      border-radius: 15px;
      box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
    }

    .imagen img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      display: block;
      transition: transform 0.3s ease;
    }

    .imagen:hover img {
      transform: scale(1.05);
    }

    .descripcion {
      padding: 15px;
      background-color: white;
      color: #333;
    }

    .descripcion h3 {
      color: #7c0b0b;
      margin: 0px 0px 10px 0px;
      font-family: 'Cinzel', serif;
    }

    .descripcion p {
      font-family: 'Lora', serif;
      font-size: 15px;
      margin: 0px;
    }

    .boton-volver {
      display: block;
      margin: 50px auto 20px auto;
      padding: 12px 28px;
      font-size: 16px;
      background-color: #7c0b0b88;
      color: rgb(0, 0, 0);
      border: none;
      border-radius: 25px;
      cursor: pointer;
    }

    .boton-volver:hover {
      transform: scale(1.05);
      box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0px);
      }
    }
  </style>
</head>

<body>

  <header>
    <?php include 'cabecera.php'; ?>
  </header>

  <div class="galeria">
    <div class="imagen">
      <img src="img/IMG-20250729-WA0011.jpg" alt="Feria" />
      <div class="descripcion">
        <h3>Feria</h3>
        <p>Descripción breve de la feria.</p>
      </div>
    </div>
    <div class="imagen">
      <img src="img/IMG-20250729-WA0026.jpg" alt="Feria" />
      <div class="descripcion">
        <h3>Feria</h3>
        <p>Descripción de la feria realizada en el establecimiento.</p>
      </div>
    </div>
  </div>

  <button class="boton-volver" onclick="history.back()">Volver</button>

  <footer>
    <style>
      footer{
      position: relative;
      top:60px
    }
    </style>
    <?php include 'piedepagina.php'; ?>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/cabecera.js"></script>
  <script>
    $(document).ready(function() {
      $('.imagen').css('opacity', 0).each(function(i) {
        $(this).delay(300 * i).animate({
          opacity: 1
        }, 800);
      });
    });
  </script>

</body>

</html>
