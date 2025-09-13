<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Perfil del Estudiante</title>
  <style>
    body {
      font-family: "Lora", serif;
      background: linear-gradient(135deg, #4a0000, #7a0000);
      margin: 0;
      padding: 20px;
      position: relative;
      top: 3.5cm;
      color: #2c0a0a;
      transition: background 0.5s ease;
    }

    .contenedor {
      max-width: 900px;
      margin: auto;
      background: linear-gradient(145deg, #fff0f0, #ffeaea);
      padding: 25px 30px;
      border-radius: 15px;
      box-shadow:
        0 8px 20px rgba(0, 0, 0, 0.25),
        0 4px 10px rgba(255, 105, 97, 0.3);
      transition: box-shadow 0.3s ease, background 0.3s ease;
    }
    .contenedor:hover {
      box-shadow:
        0 12px 30px rgba(0, 0, 0, 0.35),
        0 6px 15px rgba(255, 105, 97, 0.5);
      background: linear-gradient(145deg, #fff5f5, #ffdede);
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 3px solid #d47a7a;
      padding-bottom: 15px;
      margin-bottom: 25px;
      gap: 20px;
      background: linear-gradient(90deg, #f9d6d6, #f2baba);
      border-radius: 12px;
      box-shadow:
        inset 0 2px 5px rgba(255, 255, 255, 0.7),
        0 4px 10px rgba(196, 92, 92, 0.4);
      transition: background 0.4s ease;
    }
    .header:hover {
      background: linear-gradient(90deg, #fce3e3, #f7c7c7);
    }

    .header-info {
      flex: 1;
    }

    .header-info h2 {
      margin: 0;
      color: #4a0000;
      font-size: 1.8rem;
      text-shadow: 1px 1px 2px #b36b6b;
      transition: color 0.3s ease;
    }
    .header-info h2:hover {
      color: #7a0000;
    }

    .header-info p {
      margin: 2px 0;
      color: #7e5454;
      font-size: 1.1rem;
      font-style: italic;
    }

    .header img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid #d47a7a;
      box-shadow:
        0 4px 10px rgba(196, 92, 92, 0.6),
        0 0 15px rgba(255, 105, 97, 0.5);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
    }
    .header img:hover {
      transform: scale(1.1);
      box-shadow:
        0 6px 20px rgba(196, 92, 92, 0.8),
        0 0 25px rgba(255, 105, 97, 0.7);
    }

    .section {
      margin-bottom: 25px;
    }

    .section h3 {
      color: #460202;
      margin-bottom: 12px;
      border-bottom: 2px solid #b36b6b;
      padding-bottom: 6px;
      font-size: 1.5rem;
      text-shadow: 1px 1px 1px #d9a6a6;
      transition: color 0.3s ease;
    }
    .section h3:hover {
      color: #7a0000;
    }

    .section-content {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 15px;
    }

    .item {
      background: linear-gradient(135deg, #d9bcbc, #c78f8f);
      padding: 15px 12px;
      border-radius: 10px;
      box-shadow:
        0 6px 12px rgba(0, 0, 0, 0.15),
        inset 0 2px 5px rgba(255, 255, 255, 0.3);
      transition: box-shadow 0.3s ease, background 0.3s ease, transform 0.3s ease;
      cursor: default;
    }
    .item:hover {
      box-shadow:
        0 10px 20px rgba(0, 0, 0, 0.25),
        inset 0 3px 7px rgba(255, 255, 255, 0.5);
      background: linear-gradient(135deg, #e6c1c1, #d18a8a);
      transform: translateY(-5px);
    }

    .item .letra {
      display: block;
      font-weight: 700;
      color: #3a0a0a;
      margin-bottom: 6px;
      text-shadow: 1px 1px 1px #b36b6b;
    }

    .item p {
      margin: 0;
      color: #1a0a0a;
      font-weight: 500;
    }

    /* Media Queries */

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

