<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver tareas entregadas</title>
  <link rel="stylesheet" href="css/cabecera.css" media="all" />
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Lora&display=swap" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/cabecera.js" defer></script>
  <style>
    body{
      font-family:'Cinzel',serif;
      background-color:#570a0a;
      margin:0;
      padding:20px;
    }
    header h1{
      color:#5e1a1a;
    }
    table{
      width:100%;
      border-collapse:collapse;
      background-color:#fff6f0;
      box-shadow:0 0 10px rgba(0,0,0,0.1);
    }
    th,td{
      padding:15px;
      text-align:left;
      border-bottom:1px solid #e0cfc0;
      vertical-align:middle;
    }
    th{
      background-color:#8b2e2e;
      color:white;
    }
    .avatar{
      width:35px;
      height:35px;
      border-radius:50%;
      background-color:#5e1a1a;
      color:white;
      display:inline-flex;
      align-items:center;
      justify-content:center;
      font-weight:bold;
      margin-right:10px;
    }
    .fila{
      display:flex;
      align-items:center;
    }
    .nota{
      color:#5e1a1a;
      font-weight:bold;
    }
    input[type="checkbox"]{
      transform:scale(1.2);
    }
    .ordenar{
      margin-bottom:20px;
    }
    .ordenar select{
    
      font-family:'Cinzel',serif;
      font-size:16px;
      padding:6px 12px;
      border:1px solid #ffffffff;
      border-radius:4px;
      background-color:#fff6f0;
      color:#5e1a1a;
    }
  </style>
</head>
<body>

<main>
  <header>
    <?php include 'cabecera.php'; ?>
  </header>

  <section>
    <div class="ordenar">
      <label for="orden">Ordenar por:</label>
      <select id="orden" name="orden">
        <option value="apellido">Apellido</option>
        <option value="nombre">Nombre</option>
        <option value="estado">Estado</option>
        <option value="grupo">Grupo</option>
      </select>
    </div>

    <table>
      <thead>
        <tr>
          <th><input type="checkbox"></th>
          <th>Entregado</th>
          <th>Calificación</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="checkbox"></td>
          <td>
            <article class="fila">
              <div class="avatar">M</div>
              MANZANEDA NUÑEZ ARIADNA VALENTINA
            </article>
          </td>
          <td class="nota">___/100</td>
        </tr>
        <tr>
          <td><input type="checkbox"></td>
          <td>
            <article class="fila">
              <div class="avatar">P</div>
              PONCE ANDRADE VICTORIA
            </article>
          </td>
          <td class="nota">___/100</td>
        </tr>
        <tr>
          <td><input type="checkbox"></td>
          <td>
            <article class="fila">
              <div class="avatar">P</div>
              POZO RIVERA MARIANA HELEN
            </article>
          </td>
          <td class="nota">___/100</td>
        </tr>
        <tr>
          <td><input type="checkbox"></td>
          <td>
            <article class="fila">
              <div class="avatar">Q</div>
              QUIROGA SAAVEDRA JHOELMA CRISTIANY
            </article>
          </td>
          <td class="nota">___/100</td>
        </tr>
        <tr>
          <td><input type="checkbox"></td>
          <td>
            <article class="fila">
              <div class="avatar">T</div>
              TORRICO PINTO CAMILA ISABEL
            </article>
          </td>
          <td class="nota">___/100</td>
        </tr>
        <tr>
          <td><input type="checkbox"></td>
          <td>
            <article class="fila">
              <div class="avatar">M</div>
              MANZANEDA NUÑEZ ARIADNA VALENTINA
            </article>
          </td>
          <td class="nota">___/100</td>
        </tr>
        <tr>
          <td><input type="checkbox"></td>
          <td>
            <article class="fila">
              <div class="avatar">P</div>
              PONCE ANDRADE VICTORIA
            </article>
          </td>
          <td class="nota">___/100</td>
        </tr>
        <tr>
          <td><input type="checkbox"></td>
          <td>
            <article class="fila">
              <div class="avatar">P</div>
              POZO RIVERA MARIANA HELEN
            </article>
          </td>
          <td class="nota">___/100</td>
        </tr>
        <tr>
          <td><input type="checkbox"></td>
          <td>
            <article class="fila">
              <div class="avatar">Q</div>
              QUIROGA SAAVEDRA JHOELMA CRISTIANY
            </article>
          </td>
          <td class="nota">___/100</td>
        </tr>
        <tr>
          <td><input type="checkbox"></td>
          <td>
            <article class="fila">
              <div class="avatar">T</div>
              TORRICO PINTO CAMILA ISABEL
            </article>
          </td>
          <td class="nota">___/100</td>
        </tr>
      </tbody>
    </table>
  </section>
</main>

<footer>
  <?php include 'piedepagina.php'; ?>
</footer>

</body>
</html>
