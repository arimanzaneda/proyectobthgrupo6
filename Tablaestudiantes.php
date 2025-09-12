<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personas - Aula Virtual</title>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <style>
    body{
    font-family: "Lora", serif;
    background: linear-gradient(135deg, #570a0a, #a83232);
    padding: 20px;
    }

    h2{
      margin-top: 20px;
      color:#570a0a;
    }

    .contenedor{
      max-width: 800px;
      margin: auto;
      background: white;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
      transition: transform 0.3s ease;
    }

    .contenedor:hover{
      transform: scale(1.02);
    }

    .lista{
      list-style: none;
      padding: 0;
    }

    .item{
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 1px solid #ddd;
      padding: 10px 5px;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .item:hover{
      background-color: #f5f5f5;
      transform: translateX(5px);
    }

    .circulo1{
      width: 35px;
      height: 35px;
      border-radius: 50%;
      background-color: #d3d3d3;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 10px;
      font-weight: bold;
      box-shadow: 0 2px 5px rgba(0,0,0,0.3);
    }

    .nombre{
      flex:1;
    }

    .accion a{
      text-decoration:none;

      font-size: 14px;
      color:#1a73e8;
      transition: color 0.3s ease;
    }

    .accion a:hover{
      color: #570a0a;
    }

    .seccion {
      margin-top: 20px;
    }

    .cabecera{
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }

    .cabecera span{
      font-size: 14px;
      color: gray;
    }
    .check{
      margin-right: 10px;
      transform: scale(1.2);
      cursor: pointer;
    }
    .seleccionado{
      background-color: #ffe6e6 !important;
      transition: background-color 0.5s ease;
    }
  </style>
</head>
<body>
  <div class="contenedor">
    <div class="seccion">
      <div class="cabecera">
        <h2>Profesores</h2>
        <button>Invitar profesores</button>
      </div>
      <ul class="lista">
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">D</div>
          <div class="nombre">Dania Rocio Lima Cabezas</div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">N</div>
          <div class="nombre">Narda Lara</div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">L</div>
          <div class="nombre">Liz Mónica Jaimes Cossio (Invitada)</div>
        </li>
      </ul>
    </div>
    <div class="seccion">
      <div class="cabecera">
        <h2>Alumnos</h2>
        <span>38 alumnos</span>
      </div>
      <ul class="lista">
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">A</div>
          <div class="nombre">Álvarez Mamani Paola</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">P</div>
          <div class="nombre">Pardo Quispe Lucas</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">U</div>
          <div class="nombre">Ugarte Melano Carla</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">G</div>
          <div class="nombre">Granado Choque Esteban</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
          <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">R</div>
          <div class="nombre">Rivero Cardenal Paul</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">A</div>
          <div class="nombre">Aguilar Montaño Yadira</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">M</div>
          <div class="nombre">Morales Huanca Sdenka</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">C</div>
          <div class="nombre">Colque Inturias Ian</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">Q</div>
          <div class="nombre">Quispe Mamani Ximena Kamila</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">A</div>
          <div class="nombre">Arnez Lozada Carmen Guadalupa</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">H</div>
          <div class="nombre">Hermosa Cruz Guillermo Alejandro</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">L</div>
          <div class="nombre">Lozano Molle Justin</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">H</div>
          <div class="nombre">Hidalgo Cespedes Vanesa</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">V</div>
          <div class="nombre">Villarpando Melgares Adriana</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">T</div>
          <div class="nombre">Tapia Angulo William</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">D</div>
          <div class="nombre">Delgadillo Portales Catalina</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">F</div>
          <div class="nombre">Flores Guarachi Eva</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">F</div>
          <div class="nombre">Fernandez Llanos Leonardo</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">C</div>
          <div class="nombre">Copa Nina Liliana</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">P</div>
          <div class="nombre">Paniagua Quiroga Matiu</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">C</div>
          <div class="nombre">Condori Chacon Dennis </div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">C</div>
          <div class="nombre">Canaviri Chocaita Araceli</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
        <li class="item">
          <input type="checkbox" class="check">
          <div class="circulo1">S</div>
          <div class="nombre">Shepard Grey Derek</div>
          <div class="accion"><a href="#">Invitar a padres</a></div>
        </li>
      </ul>
    </div>
  </div>
  <script>
    $(document).ready(function(){
      $(".check").change(function(){
        if($(this).is(":checked")){
          $(this).closest(".item").addClass("seleccionado");
        } else {
          $(this).closest(".item").removeClass("seleccionado");
        }
      });
    });
  </script>
</body>
</html>