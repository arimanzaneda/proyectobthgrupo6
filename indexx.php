<!DOCTYPE html>
<html lang="es">
qwertyu
<head>
    <meta charset="UTF-8">
    <title>UNIDAD EDUCATIVA THIOMOCO</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: "Lora", serif;
            background-color: #570a0a;
            color: #000000;
            margin: 0;
            padding: 0px 20px;
        }

        .caja_bienvenida {
            display: grid;
            grid-template-rows: auto;
            gap: 20px;
            padding: 20px 0px;
        }

        .bienvenida {
            background: url("colegio.png") center/cover no-repeat;
            color: #f7ebdd;
            text-align: center;
            padding: 100px 20px;
            border-radius: 15px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.3);
        }

        .bienvenida h1 {
            color: #ffffff;
            font-size: 60px;
            margin-bottom: 10px;
            font-family: "Cinzel", serif;
            animation: entrada 2s ease-out;
        }

        @keyframes entrada {
            0% {
                transform: translateY(-50px);
                opacity: 0;
            }

            100% {
                transform: translateY(0px);
                opacity: 1;
            }
        }

        .bienvenida p {
            font-size: 24px;
            font-style: italic;
        }

        .bloque {
            background-color: #f7ebdd;
            border-radius: 15px;
            padding: 30px;
            font-family: "Cinzel", serif;
            box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .bloque:hover {
            transform: scale(1.01);
        }

        .bloque h2 {
            color: #a02222;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .bloque ul {
            list-style: none;
            padding-left: 0px;
        }

        .bloque ul li::before {
            content: "✅";
            margin-right: 10px;
            color: green;
        }

        .contacto li::before {
            content: none;
        }

        .mision-vision {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .mision-vision .bloque {
            margin: 0px;
        }

        .boton-aula {
            background-color: #570a0a;
            color: #f7ebdd;
            font-size: 20px;
            padding: 12px 20px;
            border-radius: 15px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-top: 20px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .boton-aula:hover {
            background-color: #a02222;
            transform: scale(1.05);
        }

        .pie-de-pagina {
            text-align: center;
            padding: 30px;
            color: #f7ebdd;
            background: linear-gradient(to right, #570a0a, #a02222);
            box-shadow: 0px -4px 8px rgba(0, 0, 0, 0.3);
            margin-top: 40px;
        }

        @media screen and (max-width: 768px) {
            .mision-vision {
                grid-template-columns: 1fr;
            }

            header {
                flex-direction: column;
                height: auto;
                text-align: center;
            }

            nav {
                margin-top: 10px;
                flex-wrap: wrap;
            }

            nav a {
                margin-bottom: 8px;
            }
        }
    </style>
    <link rel="stylesheet" href="css/cabecera.css" />
</head>

<body>
    <header>
        <?php include 'cabecera.php'; ?>
    </header>
    <div class="caja_bienvenida">
        <section class="bienvenida">
            <h1>¡Bienvenidos!</h1>
            <p>"Educando con valores, formando el futuro de nuestra comunidad"</p>
        </section>
        <section class="bloque">
            <h2>OBJETIVO INSTITUCIONAL</h2>
            <p>Desarrollar condiciones educativas de infraestructura y equipamiento accesibles, a los procesos educativos y gestión pedagógica institucional, acordes al Modelo Educativo Socio Comunitario Productivo, que contribuyan a una educación de calidad y desarrollo integral de las personas en toda la comunidad educativa.</p>
        </section>
        <section class="bloque">
            <h2>NUESTRA HISTORIA</h2>
            <p>El establecimiento fue <strong>creada y fundada el 23 de junio de 1972</strong> a consecuencia del constante crecimiento escolar de niñas y niños en la región; fundación que se realizó <em>bajo el cargo del Director Lucio García y el profesor Mario Rivera Soria</em>, a la fecha cuenta con <strong>53 años de servicio</strong> a la niñez y juventud de la región del Distrito Escolar de Vinto. En la Unidad Educativa de Thiomoco con el paso del tiempo surge la necesidad de la ampliar el nivel secundario que es necesario para la continuación de sus estudios de los estudiantes del nivel primario primaria. El año 2015 gracias el apoyo de las autoridades se consolido la ampliación del nivel secundario cuya resolución ministerial salió el 24 de agosto de 2015 que permite el funcionamiento con los niveles de inicial, primario y secundario. Actualmente la Unidad Educativa THIOMOCO cuenta con 720, estudiantes distribuidos en los tres niveles inicial, primaria y secundaria,1 Directora, 36 maestros, 1 secretaria, 1 portera. La creación de esta Institución Educativa se debió específicamente a la necesidad imperante que vivía la población rural como es el Cantón Machajmarca que cada año se ve el crecimiento poblacional en sus diferentes niveles.</p>
        </section>
        <section class="mision-vision">
            <div class="bloque">
                <h2>VISION</h2>
                <p>Lograr el desarrollo integral de los estudiantes con capacidades cognitivas (científicas y tecnológicos) y habilidades técnicas de procedimientos de vocación productiva y con actitudes socioafectivas de valores éticos de respeto e intereses de superar y mejorar las condiciones de vida personal y familiar/social a través del desarrollo económico, cultural, social, científico y tecnológico, para vivir bien, con contenidos extraídos del currículo base, currículo regionalizado y currículo diversificado.</p>
            </div>
            <div class="bloque">
                <h2>MISION</h2>
                <p>Desarrollar el Modelo Socio Comunitario Productivo de la Nueva Ley Educativa 070 Avelino Siñani – Elizardo Pérez en los procesos de enseñanza y aprendizaje humanística, tecnológica y productiva de acuerdo a los principios que propone el enfoque descolonización, comunitaria, productiva, intercultural y plurilingüe en complementariedad recíproca entre la sabiduría propia y los conocimientos universales, en estrecha relación al proyecto Socio Comunitario Productivo, en sus dimensiones del ser, saber, hacer y decidir y conseguir una verdadera revolución educativa en la Unidad Educativa.</p>
            </div>
        </section>
        <section class="bloque">
            <h2>Servicios Disponibles</h2>
            <ul>
                <li>Educación en niveles primario y secundario</li>
                <li>Actividades extracurriculares (deportivas, artísticas, culturales)</li>
                <li>Atención psicológica y pedagógica</li>
                <li>Soporte educativo virtual</li>
                <li>Entre otros</li>
            </ul>
        </section>
        <section class="bloque contacto">
            <h2>CONTACTANOS</h2>
            <ul>
                <li>Dirección: JM33+3MG, Quillacollo</li>
                <li>Teléfono: 65500463</li>
                <li>Correo electronico: <a href="mailto:colegiothiomoco@thiomoco.edu.bo">colegiothiomoco@thiomoco.edu.bo</a></li>
                <li>Atención: Lunes a Viernes de 08:00 a 13:00</li>
            </ul>
        </section>
    </div>
    <footer class="pie-de-pagina">
        &copy; DERECHOS RESERVADOS - UET 2025
    </footer>
    <script src="js/cabecera.js"></script>
</body>

</html>