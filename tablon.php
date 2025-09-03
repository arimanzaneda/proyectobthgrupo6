<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clase Virtual Mejorada</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Lora:ital,wght@0,400;1,400&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Lora', serif;
      display: flex;
      min-height: 100vh;
      overflow-x: hidden;
      background: linear-gradient(to right, #fff5f5, #fbeaea);
    }

    .barra-lateral {
      width: 60px;
      background: #f4dada;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding-top: 10px;
      box-shadow: 2px 0 8px rgba(0,0,0,0.1);
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
      font-size: 14px;
      font-family: 'Cinzel', serif;
      transition: all 0.3s ease;
    }

    .icono:hover {
      transform: scale(1.1);
      box-shadow: 0 0 10px #aaa;
    }

    .main-content {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .encabezado {
      font-family: 'Cinzel', serif;
      background-color: #5e0d0d;
      color: white;
      padding: 30px 20px;
      font-size: 40px;
      text-align: center;
      position: sticky;
      top: 0;
      z-index: 10;
      box-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    .contenido-layout {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      margin: 20px;
      gap: 20px;
    }

    .titulo-materia {
      background-color: white;
      color: #5b0000;
      padding: 20px;
      font-size: 50px;
      font-weight: bold;
      text-align: center;
      border: 5px solid #5b0000;
      border-radius: 15px;
      flex: 1 1 200px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      font-family: 'Cinzel', serif;
    }

    .contenido {
      flex: 3 1 600px;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .cabecera {
      padding: 30px;
      background: white;
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      flex-wrap: wrap;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      border-radius: 10px;
    }

    .datos-izquierda {
      font-size: 32px;
      color: #5b0000;
      font-family: 'Cinzel', serif;
    }

    .datos-derecha {
      font-size: 18px;
      font-style: italic;
      color: #333;
      text-align: right;
    }

    .tabs {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
      background: #fff3f3;
      padding: 15px;
      border-radius: 10px;
    }

    .botones {
      background-color: #5e0d0d;
      color: white;
      border: none;
      padding: 12px 30px;
      border-radius: 8px;
      font-size: 18px;
      cursor: pointer;
      font-weight: bold;
      transition: all 0.3s ease;
    }

    .botones:hover {
      background-color: #7a1f1f;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .panel {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      padding: 20px;
      background: #ffffff;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .column-cajas {
      display: flex;
      flex-direction: column;
      gap: 16px;
      min-width: 220px;
    }

    .caja-p {
      border: 3px solid #5b0000;
      padding: 15px;
      background-color: #fff9f9;
      border-radius: 12px;
      font-size: 16px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      min-height: 100px;
    }

    .titulo-caja {
      font-family: 'Cinzel', serif;
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 5px;
      color: #5b0000;
    }

    .caja-grande {
      flex: 1;
      padding: 20px;
      border: 2px solid #800000;
      border-radius: 16px;
      background-color: white;
      min-width: 280px;
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
      border-bottom: 2px solid #999;
      width: 100%;
      font-size: 16px;
      padding: 10px 0;
      outline: none;
      margin-top: 10px;
      background: transparent;
    }

    footer {
      text-align: center;
      padding: 20px;
      font-size: 16px;
      background: #f3dede;
      color: #333;
      margin-top: 40px;
      font-style: italic;
    }

    @media (max-width: 900px) {
      .contenido-layout {
        flex-direction: column;
      }
      .titulo-materia {
        font-size: 36px;
      }
      .cabecera {
        flex-direction: column;
        align-items: flex-start;
      }
      .tabs {
        flex-direction: column;
      }
      .panel {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>

  <div class="barra-lateral">
    <div class="icono">🏫</div>
    <div class="icono">🏠</div>
    <div class="icono">📅</div>
    <div class="icono">🎓</div>
    <div class="icono">📄</div>
  </div>

  <div class="main-content">
    <div class="encabezado">
      UNIDAD EDUCATIVA THIOMOCO
    </div>

    <div class="contenido-layout">
      <div class="titulo-materia">M<br>A<br>T<br>E<br>R<br>I<br>A</div>

      <div class="contenido">
        <div class="cabecera">
          <div class="datos-izquierda">
            <strong>NOMBRE DEL DOCENTE</strong>
          </div>
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
            <div class="caja-p">
              <div class="titulo-caja">Próximas entregas</div>
              <p>No hay tareas próximas.</p>
            </div>
            <div class="caja-p">
              <div class="titulo-caja">Evaluaciones</div>
              <p>No hay evaluaciones asignadas.</p>
            </div>
          </div>

          <div class="caja-grande">
            <div>
              <span class="circulo"></span>
              <span class="texto-anuncio">Anuncia algo a tu clase</span>
            </div>
            <input class="linea-input" type="text" placeholder="Escribe tu anuncio aquí...">
          </div>
        </div>
      </div>
    </div>
    <footer>
      © 2025 - Plataforma Virtual - Thiomoco
    </footer>
  </div>

</body>
</html>
