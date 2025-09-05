<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Preguntas Frecuentes</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Lora:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
  <style>
    body{
      font-family:'Lora', serif;
      background:linear-gradient(to bottom,beige,beige);
      color:#333;
    }
    h1,h3{
      font-family:'Cinzel', serif;
    }
  
    h1{
      font-size:45px;
    }
    .contenedor_preguntas{
      max-width:1000px;
      margin:30px auto;
      padding:0px 20px;
      display:flex;
      flex-direction:column;
      gap:20px;
    }
    .pregunta_frecuente{
      background-color:beige;
      border-left:6px solid #570a0a;
      padding:20px;
      border-radius:10px;
      box-shadow:0px 2px 8px rgba(0,0,0,0.2);
      transition:transform 1.2s ease,box-shadow 1.2s ease;
      opacity:0;
    }
    .pregunta_frecuente:hover{
      transform:translateX(10px);
      box-shadow:0px 4px 14px rgba(87,10,10,0.6);
    }
    .pregunta_frecuente h3{
      color:#570a0a;
    }
    @keyframes fadeIn{
      from{
        opacity:0;
        transform:translateY(20px);
      }
      to{
        opacity:1;
        transform:translateY(0px);
      }
    }
    @media(max-width:768px){
      h1{
        font-size:30px;
      }
      .pregunta_frecuente{
        font-size:10px;
      }
    }
  </style>
</head>
<body>
  <header>
    <?php include 'cabecera.php'; ?>
  </header>

  <header>
    <h1>Preguntas Frecuentes</h1>
  </header>
  <main class="contenedor_preguntas">
    <div class="pregunta_frecuente">
      <h3>¿Cómo me registro en la plataforma?</h3>
      <p>Debes dirigirte a la sección de REGISTRO y llenar el formulario con tus datos.</p>
    </div>
    <div class="pregunta_frecuente">
      <h3>¿Dónde puedo ver el calendario escolar?</h3>
      <p>En la sección Calendario Escolar encontrarás todos los eventos y fechas importantes.</p>
    </div>
    <div class="pregunta_frecuente">
      <h3>¿Qué hacer si olvido mi contraseña?</h3>
      <p>Puedes solicitar una nueva desde la página de inicio de sesión o comunicarte con soporte.</p>
    </div>
    <div class="pregunta_frecuente">
      <h3>¿Dónde están las actividades escolares?</h3>
      <p>Se encuentran en la sección ACTIVIDADES, clasificadas por nivel educativo.</p>
    </div>
  </main> 
  <footer>
    <?php include 'piedepagina.php'; ?>
  </footer>
  <script>
    $(document).ready(function(){
      $('.pregunta_frecuente').each(function(i){
        $(this).delay(400 * i).animate({opacity:1},1200);
      });
    });
  </script>
</body>
</html>