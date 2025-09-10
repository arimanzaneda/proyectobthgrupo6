<?php 
require "universal.php";
session_start();

if (!isset($_SESSION["id"])){
  header ("Location: indexx.php ");
  exit();
}

$rol= $_SESSION ["rol"];
$id= $_SESSION ["rol"];
$id= $_GET ["rol"];



?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear tarea</title>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">


  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Cinzel', serif;
    }


    body {
      background: #f7ebdd;
      color: #57010e;
     
    }


    .container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      margin: 40px auto;
      gap: 20px;
      width: 90%;
      max-width: 1200px;
    }


    .form-tarea {  /*el formulario de la izquierda*/
      flex: 2;
      background: #57010e;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 5px 5px 15px rgba(0,0,0,0.2);
      color: #f7ebdd;
    }




    .form-tarea input[type="text"],
    .form-tarea textarea,
    .form-tarea input[type="file"] {
      width: 100%;
      padding: 10px;
      border-radius: 6px;
      margin-bottom: 15px;
      font-size: 16px;
    }


    .form-tarea textarea {
      resize: none;
      height: 100px;
    }


    .form-tarea label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
      color: #f7ebdd;
    }


    .adjuntar {
      padding: 10px;
      border: 1px solid #cbb89c;
      border-radius: 6px;
      color: rgb(255, 255, 255);
      cursor: pointer;
      margin-bottom: 15px;
    }


    .adjuntar:hover {
      background:#43020c;
    }


 
    .paneldere { /*formulario de la derecha*/
      flex: 1;
      background: #57010e;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 5px 5px 15px rgba(0,0,0,0.2);
      color: #f7ebdd;
    }


    .paneldere label {
      font-weight: bold;
      font-size: 14px;
      margin-top: 10px;
      display: block;
    }


    .paneldere input, .paneldere select {
      width: 100%;
      padding: 8px;
      margin: 8px 0 15px;
      border-radius: 6px;
      border: 1px solid #cbb89c;
    }


   
    .form-tarea, .paneldere {
          animation: animacionentrada 1s ease-in;
    }


    .botones {
      margin-top: 20px;
      display: flex;
      gap: 10px;
    }


    .botones input {
      flex: 1;
      padding: 10px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
    }


    .crear {
      background: #f7ebdd;
      color: #57010e;
      padding: 10px;
    }


    .cancelar {
      background: #cbb89c;
      color: #57010e;
    }


    .crear:hover {
      background: #cbb89c;
    }


    .cancelar:hover {
      background: #f7ebdd;
      color: #57010e;
    }




     @keyframes animacionentrada {
        0% {
    opacity: 0;
    transform: translateY(30px) scale(0.95);
    box-shadow: 0 0 0 rgba(87, 1, 14, 0);
  }
  60% {
    opacity: 0.7;
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 5px 15px rgba(87, 1, 14, 0.3);
  }
  100% {
    opacity: 1;
    transform: translateY(0) scale(1);
    box-shadow: 0 5px 15px rgba(87, 1, 14, 0.4);
  }
}
  </style>
</head>
<body>


  <form id="form-tarea">  
    <div class="container">
     
      <section class="form-tarea">
        <label for="titulo">Título*</label>
        <input type="text" id="titulo" name="titulo" placeholder="Ingrese el título de la tarea" >


        <label for="instrucciones">Instrucciones (opcional)</label>
        <textarea id="instrucciones" name="instrucciones" placeholder="Ingrese instrucciones de la tarea (este paso es opcional)"></textarea>


        <label for="adjuntar" class="adjuntar">📎 Adjuntar archivo</label>
        <input type="file" id="adjuntar" name="adjuntar" accept=".pdf,.txt,.docx,.jpg,.png" >


        <button type="submit" class="crear">SUBIR</button>
      </section>


      <aside class="paneldere">
        <label for="para">Para</label> <!--Para quién va la tarea-->
        <select id="para" name="para">
          <option value="curso">Curso 1</option>
          <option value="curso">Curso 2</option>
          <option value="curso">Curso 3</option>
          <option value="curso">Curso 4</option>
        </select>


        <label for="asignar">Asignar a</label> <!--A que estudiantes va-->
        <input type="text" id="asignar" name="asignar" placeholder="Alumno">


        <label for="puntos">Puntos</label>
        <input type="number" id="puntos" name="puntos" placeholder="Puntaje de la tarea ">


        <label for="fecha">Fecha de entrega</label>
        <input type="date" id="fecha" name="fecha">


        <label for="tema">Tema</label>
        <select id="tema" name="tema">
          <option value="sin">Sin tema</option>
          <option value="temanum">Tema 1</option>
          <option value="temanum">Tema 2</option>
        </select>


        <label for="rubrica">Rúbrica</label>
        <input type="text" id="rubrica" name="rubrica" placeholder="+ Rúbrica">


        <div class="botones">
          <input type="submit" class="crear" value="CREAR">
          <input type="reset" class="cancelar" value="CANCELAR">
        </div>
      </aside>
    </div>
  </form>


  <script>
    $("#form-tarea").validate({
      rules: {
        titulo: {
          required: true,
          minlength: 4
        },
        asignar: {
          required: true,
          minlength: 3
        },
        puntos: {
          required: true,
          number: true,
          min: 1
        },
        fecha: {
          required: true,
        },
      },
      messages: {
        titulo: {
          required: "Debe ingresar un título para la tarea",
          minlength: "El título debe tener al menos 4 caracteres"
        },
        asignar: {
          required: "Debe asignar esta tarea a alguien",
          minlength: "Debe tener al menos 3 caracteres"
        },
        puntos: {
          required: "Debe ingresar un puntaje",
          number: "Solo se permiten números",
          min: "El puntaje debe ser mayor que 0"
        },
        fecha: {
          required: "Debe seleccionar una fecha de entrega",
         
        },
      }
    });
  </script>
</body>
</html>



