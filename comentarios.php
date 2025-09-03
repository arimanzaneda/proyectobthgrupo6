<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comentarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 30px;
        }
        form {
            background: white;
            padding: 20px;
            max-width: 400px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            margin-top: 15px;
            padding: 10px 15px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Enviar Consulta o Comentario</h2>

<form id="formConsulta">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre">

    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" id="email">

    <label for="mensaje">Mensaje:</label>
    <textarea name="mensaje" id="mensaje" rows="4"></textarea>

    <button type="submit">Enviar</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script>
$(document).ready(function(){
    $("#formConsulta").validate({
        rules: {
            nombre: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            mensaje: {
                required: true,
                minlength: 10
            }
        },
        messages: {
            nombre: {
                required: "Por favor ingrese su nombre",
                minlength: "El nombre debe tener al menos 3 caracteres"
            },
            email: {
                required: "Por favor ingrese su correo",
                email: "Ingrese un correo válido"
            },
            mensaje: {
                required: "Por favor escriba su mensaje",
                minlength: "El mensaje debe tener al menos 10 caracteres"
            }
        },
        submitHandler: function(form) {
            alert("Formulario enviado correctamente");
            form.submit();
        }
    });
});
</script>

</body>
</html>
