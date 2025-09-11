<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Portada Docentes</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Lora&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/cabecera.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      background: linear-gradient(135deg, #a44a4a, #f3d2d2);
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      animation: fadeIn 2000ms ease-in;
      font-family: 'Lora', serif;
      color: #570a0a;
    }

    h1, h2, h3, h4, h5, h6 {
      font-family: 'Cinzel', serif;
      color: #570a0a;
      text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
      margin-bottom: 40px;
    }

    .botones {
      display: flex;
      gap: 30px;
      flex-wrap: wrap;
      justify-content: center;
    }

    .boton {
      background: linear-gradient(to right, #751c1c, #570a0a);
      border: none;
      color: white;
      padding: 20px 40px;
      font-size: 18px;
      border-radius: 12px;
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
      cursor: pointer;
      transition: transform 300ms ease, box-shadow 300ms ease;
      position: relative;
      overflow: hidden;
      font-family: 'Lora', serif;
    }

    .boton:hover {
      transform: scale(1.08);
      box-shadow: 0px 12px 20px rgba(0, 0, 0, 0.3);
    }

    @keyframes fadeIn {
      0% { opacity: 0; transform: translateY(-30px); }
      100% { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

  <header>
    <?php include 'cabecera.php'; ?>
  </header>

  <main>
    <h1>PLANTEL DOCENTE - UNIDAD EDUCATIVA THIOMOCO</h1>
    <div class="botones">
      <button class="boton" onclick="window.location.href='subplanteldocentegeneral_iniprim.php'">
        Docentes de Inicial y Primaria
      </button>
      <button class="boton" onclick="window.location.href='subplanteldocentegeneral_sec.php'">
        Docentes de Secundaria
      </button>
    </div>
  </main>

<br><br><br><br><br><br><br><br><br><br><br><br><br>><br><br><br><br><br><br>
    <footer>
      <style>
      footer{
             width:100%;   ;
            }        
      </style>
    <?php include 'piedepagina.php'; ?>
</footer>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="js/cabecera.js"></script>

  <script>
    $(document).ready(function(){
      $('.boton').hover(function(){
        $(this).animate({ opacity: 0.85 }, 200).animate({ opacity: 1 }, 200);
      });
    });
  </script>

</body>
</html>
