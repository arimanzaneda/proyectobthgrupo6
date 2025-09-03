<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
  <title>Document</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background-image: url("https://i.pinimg.com/736x/a4/24/cf/a424cff2471dcd24c59a069b3c4a6545.jpg");
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .caja1 {
      background-color: #4f7553;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 0 20px #9c090930;
      width: 350px;
      color: #fff;
    }

    .caja1 h2 {
      text-align: center;
      margin-bottom: 25px;
      font-family: 'Century Gothic', sans-serif;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 8px;
      font-size: 14px;
    }

    .go {
      width: 100%;
      margin: 20px 0;
      text-align: center;
    }

    .go button {
      width: 100%;
      background: linear-gradient(45deg, #007bff, #0056b3);
      color: #fff;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .go button:hover {
      background: linear-gradient(45deg, #0056b3, #007bff);
    }

    .error-message {
      background: #f44336;
      color: #fff;
      margin-bottom: 15px;
      padding: 10px;
      border-radius: 8px;
      text-align: center;
    }

    .cuenta {
      display: inline-block;
      margin: 20px auto 0;
      background: #ffc107;
      color: #000;
      padding: 10px 20px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 16px;
      font-weight: bold;
      transition: background 0.3s ease;
    }

    .cuenta:hover {
      background: #e0a800;
    }
  </style>
</head>

<body>
  <form action="autenticaciónlogueo.php" method="post">
    <div class="caja1">
      <h2>Iniciar Sesión</h2>
      <div class="form-group">
        <label for="username">Nombre de Usuario o CI</label>
        <input type="text" id="username" name="usuario">
      </div>
      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="contraseña">
      </div>
      <div class="go">
        <button type="submit" id="go">Enviar</button>
      </div>
      <a class="cuenta" href="registro.php">¿No tienes una cuenta?</a>
      <a class="cuenta" href="index.php" style="display: inline-block; margin-top: 10px;">Volver al inicio</a>
    </div>
  </form>
  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');
    const mensaje = urlParams.get('mensaje');
    const success = urlParams.get('success');

    if (error || mensaje || success) {
      let mensajeDiv = document.createElement('div');
      mensajeDiv.className = 'error-message';

      if (error) {
        switch (error) {
          case 'campos_vacios':
            mensajeDiv.textContent = '❌ Por favor completa todos los campos';
            break;
          case 'credenciales_incorrectas':
            mensajeDiv.textContent = '❌ Usuario o contraseña incorrectos';
            break;
          case 'usuario_no_encontrado':
            mensajeDiv.textContent = '❌ Usuario no encontrado';
            break;
          case 'cuenta_bloqueada':
            mensajeDiv.textContent = '❌ Tu cuenta está bloqueada. Contacta al administrador';
            break;
          case 'no_autenticado':
            mensajeDiv.textContent = '❌ Debes iniciar sesión para acceder';
            break;
          default:
            mensajeDiv.textContent = '❌ Error: ' + error;
        }
      } else if (mensaje === 'sesion_cerrada') {
        mensajeDiv.textContent = '✅ Sesión cerrada exitosamente';
        mensajeDiv.style.background = '#d4edda';
        mensajeDiv.style.color = '#155724';
      } else if (success === 'registro_exitoso') {
        mensajeDiv.textContent = '✅ Registro exitoso. Ahora puedes iniciar sesión';
        mensajeDiv.style.background = '#d4edda';
        mensajeDiv.style.color = '#155724';
      }

      document.querySelector('.caja1').insertBefore(mensajeDiv, document.querySelector('.caja1').firstChild);

      setTimeout(() => {
        mensajeDiv.remove();
      }, 5000);
    }

    $("form").validate({
      rules: {
        usuario: {
          required: true,
          minlength: 4,
          maxlength: 20
        },
        contraseña: {
          required: true,
          minlength: 2,
          maxlength: 8
        }
      },
      messages: {
        usuario: {
          required: "Este campo tiene que ser llenado",
          minlength: "El minimo de letras es 4",
          maxlength: "El maximo de letras es 20"
        },
        contraseña: {
          required: "Este campo tiene que ser llenado",
          minlength: "El minimo de letras es 2",
          maxlength: "El maximo de letras es 8"
        }
      },
    });
  </script>
</body>

</html>