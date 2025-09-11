<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Postulaciones-Inscripciones</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Lora&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/cabecera.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            margin: 0;
            font-family: 'Lora', serif;
            background: linear-gradient(135deg, rgb(156, 132, 132), #fff0f0);
            color: #4a0000;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1, h2, h3, h4, h5, h6, .curso, u, b {
            font-family: 'Cinzel', serif;
            color: #4a0000;
        }
        .contenedorPrincipal {
            max-width: 1300px;
            width: 95%;
            margin: 40px auto 60px;
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }
        .tablero {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: center;
        }
        .tarjeta {
            background: linear-gradient(145deg, #722828, #802828);
            border-radius: 25px;
            padding: 1.25em;
            box-shadow: 6px 6px 12px #6a0000, -6px -6px 12px #ff6f6f;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: default;
            user-select: none;
            width: 100%;
            max-width: 600px;
            margin-bottom: 30px;
        }
        .tarjeta:hover {
            transform: translateY(-8px);
            box-shadow: 12px 12px 24px #611515, -12px -12px 24px #cc6b6b, 0 0 20px 4px #ffb3b3;
        }
        .slider {
            background-image: url("https://scontent.fcbb2-2.fna.fbcdn.net/v/t39.30808-6/481323979_924292189866366_5387273247403349282_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=86c6b0&_nc_ohc=YZ5zTeMPngUQ7kNvwFgMpZ6&_nc_oc=AdlQw3e-GEDDxZCQHo0XVbVtlOtrpfm2W1k5s1xGYWgQrRalQkx33RyMCgW1Fw3s2XH0TtmNlfzEOnRcgHhcZ_rV&_nc_zt=23&_nc_ht=scontent.fcbb2-2.fna&_nc_gid=gR5gVJnJqFtgK8w4B-j93g&oh=00_AfVFwwaSAuXtr9LSgJFrcHaPSCf3WCFGmlQNyp5Ef1ghyA&oe=689B7094");
            background-size: auto;
            background-position: center;
            height: 250px;
            width: 100%;
            border-radius: 12px;
            animation: slide 10s infinite;
            margin-top: 20px;
            box-shadow: 0 4px 15px rgba(53, 1, 1, 0.833);
        }
        @keyframes slide {
            25% {
                background-image: url("https://scontent.fcbb2-2.fna.fbcdn.net/v/t39.30808-6/484052637_937380575224194_8236154157959502734_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=127cfc&_nc_ohc=iTbAQM9a2x4Q7kNvwEcOqbD&_nc_oc=AdmfZnACwuDwD0vAZcExP9bg8dT4nXZtt1rNOKvuidsgV9knzK8JFHU7-r2IjQF9DJJbHB_Kiw4dSP5ZqwZgPdzH&_nc_zt=23&_nc_ht=scontent.fcbb2-2.fna&_nc_gid=Vs2xOTf0CKMEpDWGXHexpQ&oh=00_AfUjwaQBZDVBuaA6chczncizzWyLPupvL2wBPh6D57jsmQ&oe=689B700C");
            }
            50% {
                background-image: url("https://scontent.fcbb2-2.fna.fbcdn.net/v/t39.30808-6/483901536_937999811828937_7715697115308168920_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=127cfc&_nc_ohc=WBt2cO7iWvwQ7kNvwFIcYQa&_nc_oc=AdnxFCtXFCzJLl9Go8WSN0yK23NuYCDWlW5I6IhdLmuFeTwiFRnDO-B_DPVIstPXrgA_heQ-srSJckdxsmxlXOSx&_nc_zt=23&_nc_ht=scontent.fcbb2-1.fna&_nc_gid=g_9E2J0P8ABYyU1JL2v-7Q&oh=00_AfXRTwasvb4nAfbOedccdqKSUpW6dZAEytGL61jHT_mFBA&oe=689B6F94");
            }
            75% {
                background-image: url("https://scontent.fcbb2-2.fna.fbcdn.net/v/t39.30808-6/484052637_937380575224194_8236154157959502734_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=127cfc&_nc_ohc=iTbAQM9a2x4Q7kNvwEcOqbD&_nc_oc=AdmfZnACwuDwD0vAZcExP9bg8dT4nXZtt1rNOKvuidsgV9knzK8JFHU7-r2IjQF9DJJbHB_Kiw4dSP5ZqwZgPdzH&_nc_zt=23&_nc_ht=scontent.fcbb2-2.fna&_nc_gid=Vs2xOTf0CKMEpDWGXHexpQ&oh=00_AfUjwaQBZDVBuaA6chczncizzWyLPupvL2wBPh6D57jsmQ&oe=689B700C");
            }
        }
        @media (max-width: 768px) {
            .contenidoHeader {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            .tablero {
                width: 100%;
                height: auto;
            }
            .tarjeta {
                width: 90%;
            }
            .tituloLogo h1 {
                font-size: 1.2rem;
            }
        }
        @media (max-width: 480px) {
            .elementoNavegacion {
                padding: 10px 15px;
            }
            .curso {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <?php include 'cabecera.php'; ?>
    </header>

    <div class="contenedorPrincipal">
        <section class="tablero">
            <div class="tarjeta">
                <div class="curso">Inscripciones</div>
                <div class="profesor">
                    <u>1. Etapas del Proceso de Inscripción</u><br>
                    <ul>
                        <b>Preinscripción (Estudiantes nuevos)</b>
                        <li>Completar el formulario de inscripción (disponible en línea o en la secretaría).</li>
                        <li>Realizar una entrevista de admisión (se agenda tras la preinscripción).<br></li>
                        <b>Inscripción (Estudiantes antiguos)</b>
                        <li>Actualización de datos personales.</li>
                        <li>Confirmación de vacantes y estado académico.<br></li>
                    </ul>
                    <u>2. Requisitos para la Inscripción</u><br>
                    <b>Para estudiantes nuevos:<br></b>
                    <li>Formulario de inscripción completo (en línea o en la secretaría).</li>
                    <li>Certificado de nacimiento (original o copia legalizada).</li>
                    <li>Certificado de estudios del último año escolar.</li>
                    <li>Fotocopia de cédula de identidad del estudiante o apoderado.</li>
                    <li>2 fotos tamaño carné del estudiante.</li>
                    <li>Entrevista de admisión, que se agendará tras la preinscripción.<br></li>
                    <b>Para estudiantes antiguos:<br></b>
                    <li>Actualización de datos personales.</li>
                    <li>Certificado de alumno regular (si se solicita otra institución).</li>
                    <li>Estar al día en compromisos académicos y financieros.</li>
                    <u>3. Información de Matrícula</u><br>
                    <ul>
                        <li>Modalidad: Presencial (en la secretaría del colegio).</li>
                        <li>Horario de atención: Lunes a viernes, de 08:30 a 13:00 hrs.</li>
                        <li>Valor de matrícula: [Indicar monto si aplica o señalar "gratuita"]</li>.
                    </ul>
                    <u>4. Observaciones Importantes</u><br>
                    Los cupos de matrícula se garantizan solo una vez entregada toda la documentación y realizado el pago (si corresponde).
                    La no presentación dentro de los plazos establecidos puede resultar en la pérdida del cupo.
                    Para cualquier consulta, puedes escribirnos a [correo@colegio.cl] o llamarnos al [teléfono de contacto].
                </div>
            </div>
        </section>

        <section class="tablero">
            <div class="slider"></div>
            <div class="slider"></div>
        </section>
    </div>

<footer>
    <style> 
    footer{
    width: 100%;
    }        
    </style>
    <?php include 'piedepagina.php'; ?>
    </footer>

    

    <script src="js/cabecera.js"></script>
</body>
</html>
