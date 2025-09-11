<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenida de la Directora</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Lora:wght@400;700&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body{
      font-family: 'Lora', serif;
      margin: 0px;
      background: linear-gradient(to bottom, #570a0a, #a02222);
      color: beige;
    }
    .contenedor_principal{
      display: grid;
      place-items: center;
      padding: 40px 20px;
    }
    .bienvenida_director{
      background-color: beige;
      color: #570a0a;
      padding: 30px;
      border-radius: 15px;
      max-width: 700px;
      width: 100%;
      text-align: center;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
      transform: scale(0.95);
      transition: all 0.6s ease;
      animation: entradaSuave 1s ease-in-out;
    }
    .bienvenida_director:hover{
      transform: scale(1.02);
      box-shadow: 0 6px 30px rgba(0, 0, 0, 0.5);
    }
    .titulo_bienvenida{
      font-family: 'Cinzel', serif;
      font-size: 32px;
      margin-bottom: 20px;
    }
    .mensaje_bienvenida{
      font-family: 'Lora', serif;
      font-size: 18px;
      line-height: 28px;
    }
    @media (max-width: 768px){
      .titulo_bienvenida{
        font-size: 24px;
      }
      .mensaje_bienvenida{
        font-size: 16px;
        line-height: 26px;
      }
    }
    @keyframes entradaSuave{
      0%{
        opacity: 0;
        transform: translateY(30px);
      }
      100%{
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

  <main class="contenedor_principal">
    <div class="bienvenida_director">
      <h2 class="titulo_bienvenida">Bienvenida del Director</h2>
      <p class="mensaje_bienvenida">
        Queridos estudiantes, padres de familia y comunidad educativa:
        <br><br>
        Es un honor para mí darles la más cordial bienvenida a este nuevo año escolar. En la Unidad Educativa Thiomoco, nuestro compromiso es brindar una educación de calidad, con valores, disciplina y amor por el conocimiento.
        <br><br>
        Juntos construiremos una comunidad fuerte, inclusiva y comprometida con el desarrollo de nuestras niñas, niños y jóvenes.
        <br><br>
        ¡Bienvenidos!
        <br><br>
        <strong>Lic. Nombre del Director<br>Director</strong>
      </p>
    </div>
  </main>

  <footer>
    <?php include 'piedepagina.php'; ?>
  </footer>

  <script>
    $(document).ready(function(){
      $('.bienvenida_director').hide().fadeIn(1500);
    });
  </script>
  <script src="js/cabecera.js"></script>
</body>
</html>
