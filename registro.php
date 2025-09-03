<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Registro de usuario</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background-image: url("https://i.pinimg.com/736x/ed/73/9f/ed739fd9d1b3d856cdf1be6b49dfec50.jpg");
      background-size: cover;
      background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .contenedor-registro {
      background-color: #243b21;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 20px #ffffff30;
      width: 100%;
      max-width: 800px;
      color: #fff;
    }

    .contenedor-registro h2 {
      text-align: center;
      margin-bottom: 25px;
      font-family: 'Century Gothic', sans-serif;
      font-size: 28px;
      color: #fff;
    }

    .grid-registro {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 15px;
    }

    .grupo-formulario {
      margin-bottom: 15px;
    }

    .grupo-formulario label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
      color: #fff;
    }

    .grupo-formulario input {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      background-color: #f5f5f5;
    }

    .grupo-formulario input:focus {
      outline: 2px solid #4CAF50;
      background-color: #fff;
    }

    .boton-registrar {
      width: 100%;
      background-color: white;
      color: black;
      border: none;
      padding: 15px;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      font-weight: bold;
      transition: 0.3s;
      margin-top: 10px;
    }

    .boton-registrar:hover {
      background-color: #ddd;
      transform: translateY(-2px);
    }

    .mensaje {
      margin-top: 20px;
      text-align: center;
      font-weight: bold;
      padding: 10px;
      border-radius: 8px;
    }

    .mensaje.error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }

    .mensaje.success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }

    .boton-volver {
      display: block;
      width: 100%;
      text-align: center;
      margin-top: 15px;
      padding: 12px;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 8px;
      transition: background 0.3s;
      font-weight: bold;
    }

    .boton-volver:hover {
      background-color: #0056b3;
      color: white;
    }

    .error {
      color: #ff6b6b;
      font-size: 12px;
      margin-top: 5px;
      display: block;
    }

    @media (max-width: 768px) {
      .grid-registro {
        grid-template-columns: 1fr;
      }

      .contenedor-registro {
        padding: 20px;
      }
    }
  </style>
</head>

<body>
  <form id="registroForm" action="guardar.php" method="post">
    <input type="hidden" name="rol" value="estudiante">
    <div class="contenedor-registro">
      <h2>Crear cuenta</h2>

      <div class="grid-registro">
        <div class="grupo-formulario">
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" placeholder="Nombre">
        </div>

        <div class="grupo-formulario">
          <label for="apellidoPaterno">Apellido paterno</label>
          <input type="text" id="apellidoPaterno" name="apellidoPaterno" placeholder="Apellido paterno">
        </div>

        <div class="grupo-formulario">
          <label for="apellidoMaterno">Apellido materno</label>
          <input type="text" id="apellidoMaterno" name="apellidoMaterno" placeholder="Apellido materno">
        </div>

        <div class="grupo-formulario">
          <label for="CI">CI</label>
          <input type="text" id="CI" name="CI" placeholder="CI" required>
        </div>

        <div class="grupo-formulario">
          <label for="celular">Número de celular</label>
          <input type="tel" id="celular" name="celular" placeholder="Ej: 71234567">
        </div>

        <div class="grupo-formulario">
          <label for="contrasena">Contraseña</label>
          <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña">
        </div>

        <div class="grupo-formulario">
          <label for="fechadenacimiento">Fecha de nacimiento</label>
          <input type="date" id="fechadenacimiento" name="fechadenacimiento">
        </div>

        <div class="grupo-formulario">
          <label for="direccion">Dirección</label>
          <input type="text" id="direccion" name="direccion" placeholder="Dirección" required>
        </div>

        <div class="grupo-formulario">
          <label for="RUDE">RUDE</label>
          <input type="text" id="RUDE" name="rude" placeholder="RUDE" required>
        </div>

        <div class="grupo-formulario"></div>
      </div>

      <button class="boton-registrar" id="botonRegistrar">Registrarse</button>
      <a href="logueo.php" class="boton-volver">← Volver al login</a>

      <div class="mensaje" id="mensaje"></div>
    </div>
  </form>
  <script>
    $.validator.addMethod('direccionValida', function(value, element) {
      return this.optional(element) || /^[a-zA-Z0-9\s\.,\-#]+$/.test(value);
    }, 'La dirección contiene caracteres inválidos');

    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');

    if (error) {
      let mensajeDiv = document.createElement('div');
      mensajeDiv.className = 'mensaje error';

      switch (error) {
        case 'campos_requeridos':
          mensajeDiv.textContent = '❌ Por favor completa todos los campos requeridos';
          break;
        case 'ci_existente':
          mensajeDiv.textContent = '❌ Ya existe una cuenta con este CI';
          break;
        case 'rude_existente':
          mensajeDiv.textContent = '❌ Ya existe una cuenta con este RUDE';
          break;
        case 'rude_invalido':
          mensajeDiv.textContent = '❌ Este campo tiene que ser llenado';
          break;
        case 'error_registro':
          mensajeDiv.textContent = '❌ Error al registrar. Intenta nuevamente';
          break;
        default:
          mensajeDiv.textContent = '❌ Error: ' + error;
      }

      document.querySelector('.contenedor-registro').insertBefore(mensajeDiv, document.querySelector('.contenedor-registro').firstChild);

      setTimeout(() => {
        mensajeDiv.remove();
      }, 5000);
    }
    $("form").validate({
      rules: {
        nombre: {
          required: true,
          minlength: 3,
          maxlength: 50
        },
        apellidoPaterno: {
          required: true,
          minlength: 2,
          maxlength: 50
        },
        apellidoMaterno: {
          required: true,
          minlength: 2,
          maxlength: 50
        },
        CI: {
          required: true,
          digits: true,
          minlength: 5,
          maxlength: 20
        },
        celular: {
          required: true,
          digits: true,
          minlength: 7,
          maxlength: 15
        },
        contrasena: {
          required: true,
          minlength: 6,
          maxlength: 20
        },
        fechadenacimiento: {
          required: true,
          date: true
        },
        direccion: {
          required: true,
          minlength: 5,
          maxlength: 100,
          direccionValida: true
        },
        rude: {
          required: true,
          digits: true,
          minlength: 5,
          maxlength: 11
        }
      },
      messages: {
        nombre: {
          required: "El nombre es obligatorio",
          minlength: "Debe tener al menos 3 caracteres",
          maxlength: "No puede superar los 50 caracteres"
        },
        apellidoPaterno: {
          required: "El apellido paterno es obligatorio",
          minlength: "Debe tener al menos 2 caracteres",
          maxlength: "No puede superar los 50 caracteres"
        },
        apellidoMaterno: {
          required: "El apellido materno es obligatorio",
          minlength: "Debe tener al menos 2 caracteres",
          maxlength: "No puede superar los 50 caracteres"
        },
        CI: {
          required: "El CI es obligatorio",
          digits: "Sólo se permiten dígitos",
          minlength: "Debe tener al menos 5 dígitos",
          maxlength: "No puede superar los 20 dígitos"
        },
        celular: {
          required: "El número de celular es obligatorio",
          digits: "Sólo se permiten dígitos",
          minlength: "Debe tener al menos 7 dígitos",
          maxlength: "No puede superar los 15 dígitos"
        },
        contrasena: {
          required: "La contraseña es obligatoria",
          minlength: "Debe tener al menos 6 caracteres",
          maxlength: "No puede superar los 20 caracteres"
        },
        fechadenacimiento: {
          required: "La fecha de nacimiento es obligatoria",
          date: "Formato de fecha inválido"
        },
        direccion: {
          required: "La dirección es obligatoria",
          minlength: "Debe tener al menos 5 caracteres",
          maxlength: "No puede superar los 100 caracteres"
        },
        rude: {
          required: "El RUDE es obligatorio",
          digits: "Sólo se permiten dígitos",
          minlength: "Debe tener al menos 5 dígitos",
          maxlength: "No puede superar los 11 dígitos"
        }
      }
    });
  </script>
</body>

</html>