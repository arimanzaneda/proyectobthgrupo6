<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Perfil del Estudiante</title>
  <style>
    body {
      font-family: "Lora", serif;
      background-color: #4a0000;
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
      gap: 20px;
    }

    .header-info {
      flex: 1;
    }

    .header-info h2 {
      margin: 0;
      color: #333;
      font-size: 1.8rem;
    }

    .header-info p {
      margin: 2px 0;
      color: #7e5454;
      font-size: 1.1rem;
    }

    .header img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 50%;
      border: 2px solid #ddd;
    }

    .section {
      margin-bottom: 20px;
    }

    .section h3 {
      color: #460202;
      margin-bottom: 10px;
      border-bottom: 1px solid #916c6c;
      padding-bottom: 5px;
      font-size: 1.4rem;
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

    .item .letra {
      display: block;
      font-weight: bold;
      color: #2c0a0a;
      margin-bottom: 4px;
    }

    .item p {
      margin: 0;
      color: #000000;
    }

  
    @media (max-width: 600px) {
      body {
        padding: 10px;
        top: 1.5cm;
      }
      .header {
        flex-direction: column;
        align-items: center;
        text-align: center;
      }
      .header-info {
        flex: none;
      }
      .header img {
        width: 80px;
        height: 80px;
        margin-top: 10px;
      }
      .section-content {
        grid-template-columns: 1fr;
      }
    }

  
    @media (min-width: 601px) and (max-width: 900px) {
      .contenedor {
        padding: 15px;
      }
      .header-info h2 {
        font-size: 1.5rem;
      }
      .header-info p {
        font-size: 1rem;
      }
      .section h3 {
        font-size: 1.2rem;
      }
      .header img {
        width: 90px;
        height: 90px;
      }
      .section-content {
        grid-template-columns: 1fr 1fr;
      }
    }

    @media (min-width: 901px) {
      .contenedor {
        padding: 30px;
      }
      .header-info h2 {
        font-size: 2rem;
      }
      .header-info p {
        font-size: 1.2rem;
      }
      .section h3 {
        font-size: 1.5rem;
      }
      .header img {
        width: 100px;
        height: 100px;
      }
      .section-content {
        grid-template-columns: 1fr 1fr;
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
      <img src="https://st.depositphotos.com/1724125/1954/v/450/depositphotos_19547537-stock-illustration-cartoon-student.jpg" alt="Foto Estudiante" />
    </div>

    <div class="section">
      <h3>Datos Básicos</h3>
      <div class="section-content">
        <div class="item"><span class="letra">CI:</span><p>12345678</p></div>
        <div class="item"><span class="letra">Correo:</span><p>sdjsuhsz@gmail.com</p></div>
        <div class="item"><span class="letra">Teléfono:</span><p>76543210</p></div>
        <div class="item"><span class="letra">Dirección:</span><p>ubicacion</p></div>
      </div>
    </div>

    <div class="section">
      <h3>Datos Personales</h3>
      <div class="section-content">
        <div class="item"><span class="letra">Fecha de Nacimiento:</span><p>15/05/2007</p></div>
        <div class="item"><span class="letra">Curso:</span><p>6to B</p></div>
        <div class="item"><span class="letra">Rude:</span><p>71474834</p></div>
      </div>
    </div>
  </div>

</body>
</html>
