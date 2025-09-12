<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil del Estudiante</title>
  <style>
    body {
      font-family: "Lora", serif;
      background-color: #570a0a;
      margin: 0;
      padding: 20px;
      position: relative;
      top: 3.5cm;
    }

    .contenedor {
      max-width: 900px;
      margin: auto;
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 2px solid #eee;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }

    .header-info {
      flex: 1;
    }

    .header-info h2 {
      margin: 0;
      color: #333;
    }

    .header-info p {
      margin: 2px 0;
      color: #7e5454;
    }

    .header img {
      width: 100px;
      border-radius: 50%;
      border: 2px solid #ddd;
    }

    .section {
      margin-bottom: 20px;
    }

    .section h3 {
      color: #570a0a;
      margin-bottom: 10px;
      border-bottom: 1px solid #916c6c;
      padding-bottom: 5px;
    }

    .section-content {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
    }

    .item {
      background: #ccafaf;
      padding: 10px;
      border-radius: 6px;
    }

    .item letra {
      display: block;
      font-weight: bold;
      color: #2c0a0a;
    }

    .item p {
      margin: 5px 0 0;
      color: #000000;
    }

    @media (max-width: 600px) {
      .section-content {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>

  <div class="contenedor">
    <div class="header">
      <div class="header-info">
        <h2>NOMBRE COMPLETO DEL ESTUDIANTE</h2>
        <p>Estudiante</p>
      </div>
      <img src="https://st.depositphotos.com/1724125/1954/v/450/depositphotos_19547537-stock-illustration-cartoon-student.jpg" alt="Foto Estudiante">
    </div>


    <div class="section">
      <h3>Datos Básicos</h3>
      <div class="section-content">
        <div class="item"><letra>CI:</letra><p>12345678</p></div>
        <div class="item"><letra>Correo:</letra><p>sdjsuhsz@gmail.com</p></div>
        <div class="item"><letra>Teléfono:</letra><p>76543210</p></div>
        <div class="item"><letra>Dirección:</letra><p>ubicacion</p></div>
      </div>
    </div>


    <div class="section">
      <h3>Datos Personales</h3>
      <div class="section-content">
        <div class="item"><letra>Fecha de Nacimiento:</letra><p>15/05/2007</p></div>
        <div class="item"><letra>Curso:</letra><p>6to B</p></div>
        <div class="item"><letra>Rude:</letra><p>71474834</p></div>
      </div>
    </div>
  </div>

</body>
</html>