<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACTANOS</title>
    <style>
        
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Open+Sans:wght@400;600&display=swap');

        body {
            font-family: 'Open Sans', sans-serif; 
            background-color: rgb(180, 175, 175);
            margin: 0;
            padding: 0;
            color: #2c2b2b; 
            display: flex;
            flex-direction: column; 
            align-items: center;
            min-height: 100vh;  
        }

        .info-caja {
            background-color: white;
            border-radius: 16px;
            padding: 30px; 
            max-width: 700px;
            width: 90%;
            margin: 40px 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15); 
            animation: slideIn 1s ease forwards;
        }

        .info-caja h2 {
            color: #551f16;
            font-size: 1.8rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .info-caja p {
            font-size: 1.1rem;
            margin: 10px 0;
            line-height: 1.6;
        }

        .info-caja span {
            font-weight: bold;
            color: #702828;
        }

        .mapa {
            margin-top: 20px;
            width: 100%;
            height: 300px;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1); 
        }

        .boton-volver {
           margin-top: 30px;
            padding: 12px 28px; 
            font-size: 1rem;
            background-color: #7c0b0b88;
            border: none;
            border-radius: 25px;
        }
.boton-volver:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); 
    }
        

        footer {
            margin-top: auto;
            padding: 20px; 
            font-size: 0.9rem;
            color: #555;
            text-align: center;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
<?php include ('cabecera.php'); ?>
    <section class="info-caja">
        <h2>Información de Contacto</h2>
  
        <p><span>Horario de Atención:</span> NO HAY</p>
        <p><span>Teléfonos:</span> No hay telefono porque NO NOS DAN LA INFORMACION NECESARIA PARA HACER BIEN EL PROYECTO </p>
        <p><span>Correo:</span> tampoco hay </p>
  <p><span>Dirección:</span></p>
        <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3807.3013987776503!2d-66.348385525065!3d-17.39731758349159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e3094365bc6be5%3A0x82d234e21cecb7f4!2sU.E.%20Thiomoco!5e0!3m2!1ses!2sbo!4v1754184694332!5m2!1ses!2sbo" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

    <button class="boton-volver" onclick="history.back()"> Volver</button>

        <footer>
    <style> 
    footer{
    width: 100%;
    }        
    </style>
    <?php include 'piedepagina.php'; ?>
    </footer>
</body>
</html>