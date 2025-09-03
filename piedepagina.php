<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pie de página</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Lora&display=swap" rel="stylesheet" />
  <style>
    footer{
      background: linear-gradient(to right,#7c0b0b,#a32929);
      color: white;
      padding: 40px 30px;
      box-shadow: 0px -4px 10px rgba(0,0,0,0.3);
      margin-top: 50px;
      font-family: 'Lora', serif;
    }
    .contenedor_pie_pagina{
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 30px;
      max-width: 1200px;
      margin: auto;
    }
    .seccion_pie{
      flex:1 1 250px;
    }
    .seccion_pie h3,
    .seccion_pie h4{
      margin-bottom: 10px;
      font-size: 32px;
      font-family: 'Cinzel', serif;
    }
    .seccion_pie p{
      margin: 6px 0px;
      font-size: 15px;
    }
    .iconos_redes{
      margin-top: 10px;
    }
    .iconos_redes a img{
      width: 35px;
      height: 35px;
      margin-right: 10px;
      transition: transform 0.3s ease;
      border-radius: 50%;
      background-color: white;
      padding: 5px;
    }
    .iconos_redes a img:hover{
      transform: scale(1.1);
      background-color: #f0f0f0;
    }
    @media(max-width: 768px){
      .contenedor_pie_pagina{
        flex-direction: column;
        text-align: center;
      }
      .iconos_redes a img{
        margin-right: 0px;
        margin-bottom: 10px;
      }
    }
  </style>
</head>
<body>
  <footer>
    <div class="contenedor_pie_pagina">
      <div class="seccion_pie">
        <h3>Unidad Educativa Thiomoco</h3>
      </div>
      <div class="seccion_pie">
        <h4>Contacto</h4>
        <p>📞 Teléfono: +591 65500463</p>
      </div>
      <div class="seccion_pie">
        <h4>Redes sociales</h4>
        <div class="iconos_redes">
          <a href="https://www.facebook.com/share/1BEMekugsu/?mibextid=wwXIfr" target="_blank" rel="noopener noreferrer">
            <img src="124010.png" alt="Facebook" />
          </a>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
