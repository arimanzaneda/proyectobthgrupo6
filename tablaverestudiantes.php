<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>UNIDAD EDUCATIVA THIOMOCO</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: "Cinzel", serif;
      background: #37010e;
      margin: 0;
      padding: 20px;
      color: #2c2c2c;
       animation: pulse 1s ease-in-out;
    }


    table {
      width: 100%;
      background:#e8d6c1;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0px 4px 10px rgba(0,0,0,0.15);
    }

    
     table:hover {
        background-color: #d9b892;

    }

   
    th {
      text-align: left;
      border-collapse: collapse;
      font-size: 22px;
      color: #570a0a;
      border-bottom: 2px solid #f7ebdd;
      padding: 12px;
      text-align: left;
    }


    td {
      padding: 12px;
      border-bottom: 1px solid #eee;
      vertical-align: middle;
      border-collapse: collapse;
      text-align: left;
    }

    .icono {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      font-size: 18px;
    }


    label {
      font-size: 18px;
      color: #333;
    }

     @keyframes pulse {
      0%, 100% { transform: scale(1);  }
      50% { transform: scale(1.04);  }
    }
 
    @media (max-width: 750px) {
         body {
    padding: 10px;
  }
 
  th {
    background-color:#c9a679 ;
    text-align: left;
    padding: 8px;
  }

  td {
    background-color:#d9b892;
    text-align: left;
    padding: 8px;
  }
}

  </style>

</head>
<body>


  <table>
    <tr>
      <th colspan="3">Profesores</th>
    </tr>
    <tr>
      <td><input type="checkbox" name="profesor1"></td>
      <td><div class="icono" style="background:#37010e;">P</div></td>
      <td><label>Brandon Gabriel Quiroga Gutierrez</label></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="profesor2"></td>
      <td><div class="icono" style="background:#37010e;">P</div></td>
      <td><label>Narda Lara</label></td>
    </tr>
  </table>


  <br>


  <table>
    <tr>
      <th colspan="3">Estudiantes <span style="float:right; font-size:14px; color:#666; font-style:italic;">n alumnos</span></th>
    </tr>
    <tr>
      <td><input type="checkbox"></td>
      <td><div class="icono" style="background:#37010e;">E</div></td>
      <td><label>ESTUDIANTE 1</label></td>
    </tr>
    <tr>
      <td><input type="checkbox"></td>
      <td><div class="icono" style="background:#37010e;">E</div></td>
      <td><label>ESTUDIANTE 2</label></td>
    </tr>
    <tr>
      <td><input type="checkbox"></td>
      <td><div class="icono" style="background:#37010e;">E</div></td>
      <td><label>ESTUDIANTE 3</label></td>
    </tr>
   
  </table>


</body>
</html>







