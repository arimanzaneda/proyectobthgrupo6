<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Docentes Inicial y Primaria</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Lora:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/cabecera.css" />
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Lora', serif;
      background: linear-gradient(135deg, #fdfbfb, #ebedee);
      color: #333;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      animation: fadeIn 1000ms ease-in-out;
    }

    h1#titulo-docentes {
      font-family: 'Cinzel', serif;
      font-size: 36px;
      color: #8b0000;
      margin-bottom: 30px;
      text-align: center;
      position: relative;
    }

    h1#titulo-docentes::after {
      content: "";
      display: block;
      width: 60px;
      height: 4px;
      background: #8b0000;
      margin: 10px auto 0;
      border-radius: 2px;
    }

    section#contenido-docentes {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 40px 20px;
    }

    table#tabla-docentes {
      width: 90%;
      max-width: 900px;
      border-collapse: collapse;
      background: #fff;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.1);
      animation: fadeIn 1500ms ease-in-out;
    }

    th {
      background-color: #8b0000;
      color: #fff;
      padding: 16px;
      font-size: 16px;
    }

    td {
      padding: 14px 16px;
      border-bottom: 1px solid #f1f1f1;
      font-size: 15px;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #ffe6e6;
      transition: background-color 300ms ease;
    }

    .cargo {
      font-weight: bold;
      color: #b22222;
    }

    button#boton-volver {
      margin: 50px auto 20px auto;
      padding: 12px 28px;
      font-size: 16px;
      background-color: #7c0b0b;
      color: white;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      transition: transform 300ms ease, box-shadow 300ms ease;
      font-family: 'Lora', serif;
    }

    button#boton-volver:hover {
      transform: scale(1.05);
      box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 600px) {
      table {
        width: 100%;
      }

      h1#titulo-docentes {
        font-size: 28px;
      }
    }
  </style>
</head>
<body>

  <header>
    <?php include 'cabecera.php'; ?>
  </header>

  <section id="contenido-docentes">
    <h1 id="titulo-docentes">DOCENTES DE INICIAL Y PRIMARIA</h1>

    <table id="tabla-docentes">
      <thead>
        <tr>
          <th>Nº</th>
          <th>NOMBRES COMPLETOS</th>
          <th>CARGO</th>
        </tr>
      </thead>
      <tbody>
        <tr><td>1</td><td>DIAZ GONZALES ALIZON DIANA</td><td class="cargo">INICIAL A</td></tr>
        <tr><td>2</td><td>VASQUEZ GUEVARA ERIKA</td><td class="cargo">INICIAL B</td></tr>
        <tr><td>3</td><td>ORELLANA GUTIERREZ ROSSEMARY</td><td class="cargo">1°A PRIMARIA</td></tr>
        <tr><td>4</td><td>SANDYBEL</td><td class="cargo">1°B PRIMARIA</td></tr>
        <tr><td>5</td><td>CHUQUIMIA SULLCATA MARIA ELIZABETH</td><td class="cargo">2°A PRIMARIA</td></tr>
        <tr><td>6</td><td>NOGALES GUTIERREZ FLORA</td><td class="cargo">2°B PRIMARIA</td></tr>
        <tr><td>7</td><td>BARBOSA VALENZUELA ROSA ANGELA</td><td class="cargo">3°A PRIMARIA</td></tr>
        <tr><td>8</td><td>APONTE JIMENEZ MANUELA</td><td class="cargo">3°B PRIMARIA</td></tr>
        <tr><td>9</td><td>ARISPE CASTELLON ELIZABETH GEOBANA</td><td class="cargo">4°A PRIMARIA</td></tr>
        <tr><td>10</td><td>LOROÑO TORREJON LILIAN ELIZABETH</td><td class="cargo">4°B PRIMARIA</td></tr>
        <tr><td>11</td><td>COCHE FLORES AMALIA SABINA</td><td class="cargo">5°A PRIMARIA</td></tr>
        <tr><td>12</td><td>ORELLANA GALINDO EDMUNDO</td><td class="cargo">5°B PRIMARIA</td></tr>
        <tr><td>13</td><td>TRIVEÑO MARIACA LAURA</td><td class="cargo">6°A PRIMARIA</td></tr>
        <tr><td>14</td><td>CONDORI TINTA FELICIDAD</td><td class="cargo">6°B PRIMARIA</td></tr>
      </tbody>
    </table>

    <button id="boton-volver" onclick="history.back()">Volver</button>
  </section>

  <footer>
    <?php include 'piedepagina.php'; ?>
  </footer>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="js/cabecera.js"></script>
  <script>
    $(document).ready(function(){
      $('#boton-volver').hover(function(){
        $(this).animate({ opacity: 0.85 }, 200).animate({ opacity: 1 }, 200);
      });
    });
  </script>

</body>
</html>
