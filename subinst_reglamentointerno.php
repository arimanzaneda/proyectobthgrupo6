<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Reglamento interno</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Lora:wght@400;700&display=swap" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/cabecera.css" />

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
        h1, h2, h3, h4, h5, h6 {
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
        .curso {
            font-size: 1.8rem;
            margin-bottom: 5px;
        }
        .slider {
            background-image: url("https://scontent.fcbb2-2.fna.fbcdn.net/v/t39.30808-6/481323979_924292189866366_5387273247403349282_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=86c6b0&_nc_ohc=YZ5zTeMPngUQ7kNvwFgMpZ6&_nc_oc=AdlQw3e-GEDDxZCQHo0XVbVtlOtrpfm2W1k5s1xGYWgQrRalQkx33RyMCgW1Fw3s2XH0TtmNlfzEOnRcgHhcZ_rV&_nc_zt=23&_nc_ht=scontent.fcbb2-2.fna&_nc_gid=gR5gVJnJqFtgK8w4B-j93g&oh=00_AfVFwwaSAuXtr9LSgJFrcHaPSCf3WCFGmlQNyp5Ef1ghyA&oe=689B7094");
            background-size: cover;
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
            .tablero {
                width: 100%;
                height: auto; 
            }
            .tarjeta {
                width: 90%;
            }
        }
        ul li {
            margin-bottom: 0.5em;
        }
    </style>
</head>
<body>
    <header>
        <?php include 'cabecera.php'; ?>
    </header>
    <main class="contenedorPrincipal">
        <section class="tablero">
            <article class="tarjeta">
                <div class="curso">Reglamento Interno</div>
                <div class="profesor">
                    <u>Nuestra Misión</u>
                    <p>En el Colegio Thio Moco trabajamos para formar estudiantes íntegros, responsables y solidarios, capaces de contribuir positivamente 
                    a su comunidad, guiándonos por el respeto, la honestidad y la excelencia académica.</p>
                    <u>Principios que Nos Guían</u>
                    <ul>
                        <li>Respeto mutuo</li>
                        <li>Puntualidad y responsabilidad</li>
                        <li>Inclusión y no discriminación</li>
                        <li>Cuidado de los bienes y espacios comunes</li>
                        <li>Trabajo en equipo y solidaridad</li>
                    </ul>
                    <u>Derechos y Deberes de la Comunidad Educativa</u>
                    <b>Estudiantes</b>
                    <ul>
                        <li>✔ Derecho a una educación de calidad, inclusiva y segura.</li>
                        <li>✔ Participar en actividades académicas, culturales y deportivas.</li>
                        <li>✔ Ser escuchados con respeto.</li>
                        <li>💡 Deberes: Asistir puntualmente, cumplir tareas, usar el uniforme, respetar a todos y cuidar las instalaciones.</li>
                    </ul>
                    <b>Docentes</b>
                    <ul>
                        <li>✔ Derecho a ejercer su labor con respeto y apoyo institucional.</li>
                        <li>💡 Deberes: Cumplir horarios, planificar clases, evaluar con justicia y fomentar un ambiente de respeto.</li>
                    </ul>
                    <b>Padres de Familia</b>
                    <ul>
                        <li>✔ Derecho a recibir información sobre el progreso de sus hijos.</li>
                        <li>💡 Deberes: Garantizar asistencia puntual, cumplir compromisos económicos y respetar las normas institucionales.</li>
                    </ul>
                    <u>Normas de Convivencia</u>
                    <ul>
                        <li>Prohibido el lenguaje ofensivo y las agresiones.</li>
                        <li>No se permite portar objetos peligrosos o sustancias prohibidas.</li>
                        <li>El uso de dispositivos electrónicos solo está permitido con autorización.</li>
                        <li>Mantener la limpieza y cuidado de todos los espacios.</li>
                        <li>Las salidas durante el horario escolar requieren autorización de la Dirección.</li>
                    </ul>
                    <u>Faltas y Sanciones</u>
                    <b>Faltas Leves</b>
                    <ul>
                        <li>✔ Llegadas tarde reiteradas</li>
                        <li>✔ Incumplimiento de tareas</li>
                    </ul>
                    <b>Faltas Graves</b>
                    <ul>
                        <li>✔ Agresiones físicas o verbales</li>
                        <li>✔ Daño intencional a bienes del colegio</li>
                        <li>✔ Porte o consumo de sustancias prohibidas</li>
                    </ul>
                    <u>Posibles Sanciones</u>
                    <ul>
                        <li>✔ Amonestación verbal o escrita</li>
                        <li>✔ Citación a padres</li>
                        <li>✔ Suspensión temporal</li>
                        <li>✔ Expulsión en casos graves</li>
                    </ul>
                </div>
            </article>
        </section>
        <section class="tablero">
            <div class="slider"></div>
            <div class="slider"></div>
        </section>
    </main>
    <footer>
        <?php include 'piedepagina.php'; ?>
    </footer>
    <script src="js/cabecera.js"></script>
</body>
</html>
