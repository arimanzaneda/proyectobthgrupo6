<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title> Historia </title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/cabecera.js"></script>
  <link rel="stylesheet" href="css/cabecera.css" />

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Lora&display=swap');

    body {
      margin: 0;
      background-color: #420000;
      font-family: 'Lora', serif;
      padding: 20px;
    }

    header,
    footer {
      margin: 0;
      padding: 0;
    }

    .contenedor {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    section {
      background: #d1c8c1;
      border-radius: 14px;
      padding: 18px 20px;
      box-shadow: 5px 2px 10px rgb(0, 0, 0);
      transition: 0.4s ease;
      animation: animacionentrada 0.8s ease-in;
      color: #0c0000;
    }

    section:hover {
      transform: scale(1.02);
      box-shadow: 8px 4px 8px rgb(0, 0, 0);
      background: #d1c8c1d8;
      z-index: 9;
    }

    h2 {
      margin-top: 0;
      margin-bottom: 12px;
      font-size: 30px;
      font-weight: 600;
      text-align: center;
      font-family: 'Cinzel', serif;
    }

    p {
      margin: 0 0 10px 0;
      text-align: justify;
      font-size: 18px;
      font-family: 'Lora', serif;
    }

    img {
      max-width: 100%;
      border-radius: 12px;
      display: block;
      margin: 0 auto;
    }

    @keyframes animacionentrada {
      0% {
        opacity: 0;
        transform: translateY(10px) scale(0.8);
      }

      50% {
        opacity: 0.5;
        transform: translateY(5px) scale(1.02);
      }

      100% {
        opacity: 1;
        transform: translateY(0) scale(1);
      }
    }

    
    @media (min-width: 850px) {
      .fila {
        display: flex;
        gap: 20px;
      }

      .fila>section {
        flex: 1;
      }
    }
  </style>
</head>

<body>

<header>
  <?php include 'cabecera.php'; ?>
</header>

  <main class="contenedor">

    <section id="uno">
      <h2>HISTORIA DEL COLEGIO</h2>
      <p>El establecimiento fue creada y fundada el 23 de junio de 1972 a consecuencia del constante crecimiento escolar de niñas y niños en la región; fundación que se realizó bajo el cargo del Director Lucio García y el profesor Mario Rivera Soria, a la fecha cuenta con 53 años de servicio a la niñez y juventud de la región del Distrito Escolar de Vinto.</p>
      <p>En la Unidad Educativa de Thiomoco con el paso del tiempo surge la necesidad de la ampliar el nivel secundario que es necesario para la continuación de sus estudios de los estudiantes del nivel primario primaria. El año 2015 gracias el apoyo de las autoridades se consolidó la ampliación del nivel secundario cuya resolución ministerial salió el 24 de agosto de 2015 que permite el funcionamiento con los niveles de inicial, primario y secundario.</p>
      <p>Actualmente la Unidad Educativa THIOMOCO cuenta con 720 estudiantes distribuidos en los tres niveles inicial, primaria y secundaria, 1 Directora, 36 maestros, 1 secretaria, 1 portera. La creación de esta Institución Educativa se debió específicamente a la necesidad imperante que vivía la población rural como es el Cantón Machajmarca que cada año se ve el crecimiento poblacional en sus diferentes niveles.</p>
    </section>

    <div class="fila">
      <section id="dos">
        <img src="img/IMG-20250729-WA0028.jpg" alt="Imagen Caja 2" />
      </section>

      <section id="tres">
        <img src="img/IMG-20250729-WA0024.jpg" alt="Imagen Caja 3" />
      </section>
    </div>

    <div class="fila">
      <section id="cuatro">
        <img src="img/IMG-20250729-WA0020.jpg" alt="Imagen Caja 4" />
      </section>

      <section id="cinco">
        <h2>OBJETIVO DE LA UNIDAD EDUCATIVA</h2>
        <p>Desarrollar condiciones educativas de infraestructura y equipamiento accesibles, a los procesos educativos y gestión pedagógica institucional, acordes al Modelo Educativo Socio Comunitario Productivo, que contribuyan a una educación de calidad y desarrollo integral de las personas en toda la comunidad educativa.</p>
      </section>
    </div>

    <div class="fila">
      <section id="seis">
        <h2>MISIÓN</h2>
        <p>Desarrollar el Modelo Socio Comunitario Productivo de la Nueva Ley Educativa 070 Avelino Siñani – Elizardo Pérez en los procesos de enseñanza y aprendizaje humanística, tecnológica y productiva de acuerdo a los principios que propone el enfoque descolonización, comunitaria, productiva, intercultural y plurilingüe en complementariedad recíproca entre la sabiduría propia y los conocimientos universales, en estrecha relación al proyecto Socio Comunitario Productivo, en sus dimensiones del ser, saber, hacer y decidir y conseguir una verdadera revolución educativa en la Unidad Educativa.</p>
      </section>

      <section id="siete">
        <h2>VISIÓN</h2>
        <p>Lograr el desarrollo integral de los estudiantes con capacidades cognitivas (científicas y tecnológicos) y habilidades técnicas de procedimientos de vocación productiva y con actitudes socioafectivas de valores éticos de respeto e intereses de superar y mejorar las condiciones de vida personal y familiar/social a través del desarrollo económico, cultural, social, científico y tecnológico, para vivir bien, con contenidos extraídos del currículo base, currículo regionalizado y currículo diversificado.</p>
      </section>
    </div>

  </main>

    <?php include 'piedepagina.php';     ?>

  <script src="js/cabecera.js"></script>
</body>

</html>
