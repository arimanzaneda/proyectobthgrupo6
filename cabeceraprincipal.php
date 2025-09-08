<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cabecera principal</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Lora&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body{
      font-family: "Lora", serif;
      margin: 0;
      background-color: #570a0a;
    }
    header{
      background-color: #570a0a;
      color: #f7ebdd;
      padding: 1px 2px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 3px solid #f7ebdd;
      height: 99px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
    }
    .titulo_unieduthi{
      font-size: 40px;
      font-family: "Cinzel", sans-serif;
      text-shadow: 2px 2px 4px #000000;
    }
    nav{
      display: flex;
      align-items: center;
    }
    nav a{
      color: #f7ebdd;
      margin: 0px 10px;
      font-weight: bold;
      padding: 8px 12px;
      border-radius: 8px;
      transition: background-color 0.3s, transform 0.3s;
      font-family: "Cinzel", sans-serif;
      text-decoration: none;
    }
    nav a:hover{
      background-color: #a02222;
      color: white;
      transform: scale(1.05);
    }
    .menu-item{
      position: relative;
      display: inline-block;
    }
    .submenu-btn{
      background: none;
      border: none;
      color: #f7ebdd;
      font-weight: bold;
      padding: 8px 12px;
      font-family: "Cinzel", sans-serif;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s, transform 0.3s;
    }
    .submenu-btn:hover{
      background-color: #a02222;
      color: white;
      transform: scale(1.05);
    }
    .submenu{
      display: none;
      position: absolute;
      background-color: #a02222;
      border-radius: 8px;
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.3);
      z-index: 1;
      min-width: 200px;
      top: 100%;
      left: 0;
    }
    .submenu a{
      display: block;
      padding: 10px 15px;
      color: #f7ebdd;
      text-decoration: none;
      font-family: "Lora", serif;
    }
    .submenu a:hover{
      background-color: #8e1b1b;
    }
    @media screen and (max-width: 768px){
      header{
        flex-direction: column;
        height: auto;
        text-align: center;
      }
      nav{
        margin-top: 10px;
        flex-wrap: wrap;
      }
      nav a{
        margin-bottom: 8px;
      }
    }
  </style>

  <script>
    $(document).ready(function(){
      $('.submenu-btn').click(function(e) {
        e.stopPropagation(); 
        $(this).next('.submenu').slideToggle(200);
        $('.submenu').not($(this).next()).slideUp(200);
      });

      $(document).click(function() {
        $('.submenu').slideUp(200);
      });
    });
  </script>
</head>
<body>
  <header>
    <div class="titulo_unieduthi">UNIDAD EDUCATIVA THIOMOCO</div>
    <nav>
      
      <a href="portadaprincipal.php">INICIO</a>

      <div class="menu-item">
        <button class="submenu-btn">NOSOTROS ▼</button>
        <div class="submenu">
          <a href="subnos_bienvenidadirectora.php">Bienvenida del/la director/a</a>
          <a href="subnos_calendarioescolar.php">Calendario Escolar</a>
          <a href="subnos_galeriadefotos.php">Galería de fotos</a>
          <a href="subnos_ambientes.php">Ambientes</a>
        </div>
      </div>

      <div class="menu-item">
        <button class="submenu-btn">INSTITUCIÓN ▼</button>
        <div class="submenu">
          <a href="subinst_hist0ria.php">Nuestra Historia</a>
          <a href="subinst_hist0ria.php">Visión y Misión</a>
          <a href="subinst_reglamentointerno0.php">Reglamento interno</a>
          <a href="subinst_autoridadeseducativas.php">Autoridades educativas</a>
          <a href="subinst_posteinscrip.php">Postulaciones-Inscripciones</a>
        </div>
      </div>

      <div class="menu-item">
        <button class="submenu-btn">DOCENCIA Y VIDA ESCOLAR ▼</button>
        <div class="submenu">
          <a href="subdocyve_planteldocentegeneral.php">Plantel Docente</a>
          <a href="subdocyve_actividades.php">Actividades complementarias</a>
          <a href="subdocyve_feriascientificas.php">Ferias científicas</a>
          <a href="subdocyve_proyectos.php">Proyectos institucionales</a>
          <a href="subdocyve_eventosycelebraciones.php">Eventos y celebraciones</a>
        </div>
      </div>

      <a href="comentarios.php">COMENTARIOS</a>
      <a href="contacto.php">CONTÁCTANOS</a>
    </nav>
  </header>

</body>
</html>
