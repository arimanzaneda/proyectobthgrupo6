<?php 
include('db.php');
session_start();

$id = $_SESSION['ci'];
$idclase = $_GET['id'];
$nombre = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">  
<head>
  <meta charset="UTF-8">
  <title>Clase Virtual</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Georgia, serif;
    }

    body {
      display: flex;
      height: 100vh;
      overflow-x: hidden;
    }

    .barra-lateral {
      width: 60px;
      background-color: #e2e2e2;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding-top: 10px;
      z-index: 3;
    }

    .icono {
      width: 40px;
      height: 40px;
      background-color: white;
      border: 1px solid #888;
      margin: 10px 0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      text-align: center;
      line-height: 1.2;
    }

    .main-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      min-width: 0;
      height: 100vh;
      overflow: hidden;
    }

    .encabezado {
      width: calc(100% - 60px);
      background-color: #5e0d0d;
      color: white;
      padding: 28px 0 32px 0;
      font-size: 50px;
      font-weight: bold;
      position: fixed;
      top: 0;
      left: 60px;
      z-index: 10;
      letter-spacing: 2px;
      text-align: center;
    }

    .contenido-layout {
      display: flex;
      flex-direction: row;
      height: 100%;
      width: 100%;
      margin-top: 110px;
    }

    .titulo-materia {
      background-color: white;
      color: #5b0000;
      padding: 10px;
      font-size: 90px;
      font-weight: bold;
      text-align: center;
      border: 20px solid #5b0000;
      line-height: 1;
      align-self: flex-start;
    }

    .contenido {
      flex: 1;
      display: flex;
      flex-direction: column;
      min-width: 0;
    }

    .cabecera {
      padding: 36px 30px;
      display: flex;
      justify-content: space-between;
      background: #fff;
      font-size: 30px;
      gap: 40px;
      min-height: 150px;
    }

    .datos-izquierda {
      font-size: 60px;
      color: #5b0000;
      align-self: flex-start;
    }

    .datos-derecha {
      margin-top: auto;
      text-align: right;
      font-style: italic;
      font-size: 20px;
    }

    .tabs {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f6eaea;
      padding: 18px 0;
      gap: 40px;
    }

    .botones {
      flex: none;
      width: 500px;
      padding: 18px 0;
      background-color: #5e0d0d;
      color: white;
      border: none;
      font-size: 22px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.2s, color 0.2s;
      margin: 0 16px;
      letter-spacing: 1px;
      box-shadow: 0 2px 10px #0001;
      text-align: center;
    }

    .botones:hover {
      background-color: #7a1a1a;
    }

    .panel {
      display: flex;
      padding: 30px;
      gap: 30px;
      flex: 1;
      background: #fff;
    }

    .column-cajas {
      display: flex;
      flex-direction: column;
      gap: 16px;
      width: 230px;
      min-width: 180px;
    }

    .caja-p {
      border: 5px solid #5b0000;
      padding: 10px 13px;
      background-color: #f5f5f5;
      font-size: 15px;
      border-radius: 10px;
      width: 250px;
      height: 200px;
      box-shadow: 0 2px 8px #0001;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .caja-grande {
      flex: 2;
      border: 2px solid #800000;
      padding: 18px;
      background-color: white;
      border-radius: 16px;
      box-shadow: 0 2px 12px #0001;
    }

    .circulo {
      display: inline-block;
      width: 20px;
      height: 20px;
      background-color: brown;
      border-radius: 50%;
      vertical-align: middle;
      margin-right: 10px;
    }

    .texto-anuncio {
      display: inline-block;
      color: gray;
      font-size: 18px;
    }

    .linea-input {
      border: none;
      border-bottom: 1.5px solid #999;
      width: 100%;
      outline: none;
      margin-top: 10px;
      font-size: 17px;
      background: transparent;
      padding: 4px 0;
    }

    .linea-input::placeholder {
      color: #aaa;
    }

    .boton-enviar {
      margin-top: 15px;
      background-color: #5e0d0d;
      color: white;
      padding: 10px 20px;
      border: none;
      font-size: 18px;
      font-weight: bold;
      cursor: pointer;
      border-radius: 6px;
      box-shadow: 0 2px 8px #0003;
      transition: background 0.2s;
    }

    .boton-enviar:hover {
      background-color: #7a1a1a;
    }

    .titulo-caja {
      font-weight: bold;
      margin-bottom: 8px;
      font-size: 17px;
      color: #5b0000;
    }

    @media (max-width: 900px) {
      .contenido-layout {
        flex-direction: column;
        margin-top: 100px;
      }
      .titulo-materia {
        font-size: 50px;
        border-width: 10px;
      }
      .panel {
        flex-direction: column;
      }
      .column-cajas {
        flex-direction: row;
        width: 100%;
        gap: 10px;
      }
      .caja-p {
        min-width: 120px;
        min-height: 80px;
      }
      .botones {
        width: 100%;
        margin: 8px 0;
      }
      .encabezado {
        font-size: 30px;
      }
    }
  </style>

</head>
<body>

   <a href='form.crearclase.html'>crearnuevo</a>
   <?php 
     $result = $conn->query("SELECT * FROM clases WHERE idclases=$idclase");
     while ($row = $result->fetch_assoc()){
      echo '<h2>'.$row["nombre"].'</h2>';
      echo '<h2>'.$row["codigo"].'</h2>';
     }
   ?>

  <div class="barra-lateral">
    <div class="icono">Icono<br>del<br>colegio</div>
    <div class="icono">🏠</div>
    <div class="icono">📅</div>
    <div class="icono">🎓</div>
    <div class="icono">📄</div>
  </div>

  <div class="main-content">
    <div class="encabezado">NOMBRE DEL COLEGIO</div>

    <div class="contenido-layout">
      <div class="titulo-materia">M<br>A<br>T<br>E<br>R<br>I<br>A</div>

      <div class="contenido">
        <div class="cabecera">
          <div class="datos-izquierda"><strong>NOMBRE DEL DOCENTE</strong></div>
          <div class="datos-derecha">
            CÓDIGO DE LA CLASE<br>
            <span>vicmac25</span>
          </div>
        </div>

        <div class="tabs">
          <button class="botones">TABLÓN</button>
          <button class="botones">TRABAJO DE CLASE</button>
          <button class="botones">PERSONAS</button>
        </div>

        <div class="panel">
          <div class="column-cajas">
            <div class="caja-p"><div class="titulo-caja">Próximas entregas</div></div>
            <div class="caja-p"><div class="titulo-caja">Próximas evaluaciones</div></div>
          </div>

          <div class="caja-grande">
            <div>
              <span class="circulo"></span>
              <span class="texto-anuncio">Anuncia algo a tu clase</span>
            </div>
            <form method='post' action="creapublicacion.php">
              <input class="linea-input" type="text" name="anuncio" placeholder="Escribe un anuncio...">
              <input class="linea-input" type="hidden" name="idclase" value="<?=$idclase?>">
              <button class="boton-enviar" type="submit">Enviar</button>
            </form>
          </div>
          
        </div>
      </div>
    </div>
  </div>

</body>
</html>


