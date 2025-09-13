<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Calendario Escolar</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Lora&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <style>
    body{
      font-family: 'Lora', serif;
      background-color: beige;
      color: #570a0a;
      margin: 0;
      padding: 0;
    }
    footer{
      background-color: #570a0a;
      color: beige;
      text-align: center;
      padding: 30px 20px;
      box-shadow: 0px 4px 10px rgba(0,0,0,0.3);
      font-family: 'Cinzel', serif;
      font-size: 28.8px;
      user-select: none;
    }
    .contenedor_imagen_calendario{
      display: flex;
      justify-content: center;
      margin: 50px auto;
      padding: 0px 10px;
    }
    .contenedor_imagen_calendario_img{
      width: 90%;
      max-width: 800px;
      border-radius: 15px;
      box-shadow: 0px 8px 25px rgba(87,10,10,0.25);
      transition: transform 0.8s ease, box-shadow 0.8s ease;
      cursor: pointer;
    }
    .contenedor_imagen_calendario_img:hover{
      transform: scale(1.05) rotate(1deg);
      box-shadow: 0px 12px 40px rgba(87,10,10,0.5);
    }
    .contenedor_eventos{
      max-width: 1000px;
      margin: 50px auto;
      padding: 20px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 40px;
      opacity: 0;
    }
    .tarjeta_evento{
      background: linear-gradient(135deg, #f7f0e8 0%, #e7d7c1 100%);
      border: 2px solid #570a0a;
      border-radius: 15px;
      padding: 30px 25px;
      box-shadow: 0px 10px 25px rgba(87,10,10,0.3);
      transform: translateY(30px);
      transition: transform 0.5s ease, box-shadow 0.5s ease;
      font-family: 'Lora', serif;
      color: #570a0a;
    }
    .tarjeta_evento:hover{
      transform: translateY(30px) scale(1.03);
      box-shadow: 0px 15px 35px rgba(87,10,10,0.6);
    }
    .fecha_evento{
      font-family: 'Cinzel', serif;
      font-size: 25.6px;
      margin-bottom: 15px;
      user-select: none;
    }
    .descripcion_evento{
      font-size: 17.6px;
      line-height: 27.2px;
    }
    @media (max-width: 768px){
      footer{
        font-size: 22.4px;
        padding: 25px 10px;
      }
      .fecha_evento{
        font-size: 20.8px;
      }
      .descripcion_evento{
        font-size: 16px;
      }
      .contenedor_eventos{
        padding: 10px;
        gap: 30px;
      }
    }
  </style>
  <link rel="stylesheet" href="css/cabecera.css"/>
</head>
<body>
  <header>
    <?php include 'cabecera.php'; ?>
  </header>
  <div class="contenedor_imagen_calendario">
    <img class="contenedor_imagen_calendario_img" src="https://glowmess.com/wp-content/uploads/2024/12/calendarios-anuales-2025-para-imprimir.jpg" alt="Calendario Escolar 2025" />
  </div>

  <section class="contenedor_eventos">
    <article class="tarjeta_evento">
      <h3 class="fecha_evento">1 Enero</h3>
      <p class="descripcion_evento">Año Nuevo - Feriado nacional.</p>
    </article>
    <article class="tarjeta_evento">
      <h3 class="fecha_evento">12 Febrero</h3>
      <p class="descripcion_evento">Inicio de clases escolares en todos los niveles educativos.</p>
    </article>
    <article class="tarjeta_evento">
      <h3 class="fecha_evento">18 Marzo</h3>
      <p class="descripcion_evento">Feria de Ciencias y Tecnología - Primaria y Secundaria.</p>
    </article>
    <article class="tarjeta_evento">
      <h3 class="fecha_evento">1 Mayo</h3>
      <p class="descripcion_evento">Día del Trabajo - Suspensión de actividades escolares.</p>
    </article>
    <article class="tarjeta_evento">
      <h3 class="fecha_evento">21 Junio</h3>
      <p class="descripcion_evento">Año Nuevo Andino - Descanso académico.</p>
    </article>
    <article class="tarjeta_evento">
      <h3 class="fecha_evento">15 Julio</h3>
      <p class="descripcion_evento">Vacaciones de Invierno - 2 semanas.</p>
    </article>
    <article class="tarjeta_evento">
      <h3 class="fecha_evento">6 Agosto</h3>
      <p class="descripcion_evento">Día de la Independencia - Actos cívicos y feriado nacional.</p>
    </article>
    <article class="tarjeta_evento">
      <h3 class="fecha_evento">30 Noviembre</h3>
      <p class="descripcion_evento">Finalización del año escolar y entrega de libretas.</p>
    </article>
    <article class="tarjeta_evento">
      <h3 class="fecha_evento">25 Diciembre</h3>
      <p class="descripcion_evento">Navidad - Feriado nacional.</p>
    </article>
  </section>

  <footer>
    <?php include 'piedepagina.php'; ?>
  </footer>

  <script>
    $(document).ready(function(){
      $('.contenedor_eventos').css('opacity', 1);
      $('.tarjeta_evento').each(function(i){
        $(this).css({opacity:0, transform:'translateY(30px)'}).delay(500 * i).animate({opacity:1, top:0}, 900);
      });
    });
  </script>
  <script src="js/cabecera.js"></script>
</body>
</html>
