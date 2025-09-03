<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>DOCENTES SECUNDARIA</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Lora&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/cabecera.css" />
    <style>
        body {
            font-family: 'Lora', serif;
            background: linear-gradient(to right, #fdfbfb, #ebedee);
            color: #333;
            margin: 0;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            font-family: 'Cinzel', serif;
            text-align: center;
            color: #8B0000;
            margin-bottom: 30px;
            font-size: 2.5rem;
            position: relative;
            letter-spacing: 2px;
            font-weight: bold;
        }

        h1::after {
            content: "";
            display: block;
            width: 60px;
            height: 4px;
            background: #8B0000;
            margin: 10px auto 0;
            border-radius: 2px;
        }

        table {
            width: 90%;
            max-width: 900px;
            border-collapse: collapse;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        th {
            background-color: #8B0000;
            color: white;
            padding: 16px;
            font-size: 1rem;
            letter-spacing: 0.5px;
        }

        td {
            padding: 14px 16px;
            border-bottom: 1px solid #f1f1f1;
            font-size: 0.95rem;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #ffe6e6;
            transition: background-color 0.3s ease;
        }

        .cargo {
            font-weight: bold;
            color: #B22222;
        }

        .boton-volver {
            display: block;
            margin: 50px auto 20px auto;
            padding: 12px 28px;
            font-size: 1rem;
            background-color: #7c0b0b88;
            color: rgb(0, 0, 0);
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-family: 'Lora', serif;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .boton-volver:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<header>
    <?php include 'cabecera.php'; ?>
</header>

<h1>DOCENTES SECUNDARIA</h1>

<table>
    <thead>
        <tr>
            <th>Nº</th>
            <th>NOMBRES COMPLETOS</th>
            <th>CARGO</th>
        </tr>
    </thead>
    <tbody>
        <tr><td>1</td><td>QUISPE RAMIREZ MARCOS</td><td class="cargo">LENGUAJE - 1°A SEC.</td></tr>
        <tr><td>2</td><td>GUZMAN ASCUI LIZETH SANDRA</td><td class="cargo">MATEMÁTICAS - 1°B SEC.</td></tr>
        <tr><td>3</td><td>TAPIA ROJAS VANESA</td><td class="cargo">ARTES PLÁSTICAS - 2°A SEC.</td></tr>
        <tr><td>4</td><td>ANTEZANA CABALLERO OLIVER</td><td class="cargo">E. FÍSICA - 2°B SEC.</td></tr>
        <tr><td>5</td><td>MAYTA CUELLAR SILVIA</td><td class="cargo">2°B SEC.</td></tr>
        <tr><td>6</td><td>PEÑARRIETA LAIME ANANIAS</td><td class="cargo">BIO-GEO - 3°A SEC.</td></tr>
        <tr><td>7</td><td>MAYTA CUELLAR SILVIA</td><td class="cargo">2°B SEC.</td></tr>
        <tr><td>8</td><td>PUENTE MORALES YBLIN JUDITH</td><td class="cargo">FÍSICA – QUÍMICA</td></tr>
        <tr><td>9</td><td>ALCOCER ARROYO FERNANDO MIGUEL</td><td class="cargo">3°B SEC.</td></tr>
        <tr><td>10</td><td>ACHU MAMANI EUFENIA TICLA</td><td class="cargo">LENGUAJE - 3°B SEC.</td></tr>
        <tr><td>11</td><td>MARCA QUISPE GROVER</td><td class="cargo">E. MUSICAL - 4°A SEC.</td></tr>
        <tr><td>12</td><td>FLORES CABRERA JOSE MIGUEL</td><td class="cargo">VALORES ESPIRITUALES - 4°A SEC.</td></tr>
        <tr><td>13</td><td>MALDONADO RODRIGUEZ DAVID NERY</td><td class="cargo">MATEMÁTICAS - 4°B SEC.</td></tr>
        <tr><td>14</td><td>CONDE SIACARA WILVER</td><td class="cargo">LENG. CASTELLANA - 5°A SEC.</td></tr>
        <tr><td>15</td><td>DULIA GUZMAN MALDONADO</td><td class="cargo">C.S - T.T.G - 5°B SEC.</td></tr>
        <tr><td>16</td><td>ALICIA PEÑAFIEL QUISPE</td><td class="cargo">TTE. AGROPECUARIA - 5°B SEC.</td></tr>
        <tr><td>17</td><td>EDWIN PILLCO</td><td class="cargo">TTE. AGROPECUARIA</td></tr>
        <tr><td>18</td><td>FLORES MANCILA CHRISTIAN</td><td class="cargo">MATEMÁTICAS - 6°A SEC.</td></tr>
        <tr><td>19</td><td>TRIVEÑO MARIACA REBECA</td><td class="cargo">BIO - GEOGRAFÍA - 6°B SEC.</td></tr>
        <tr><td>20</td><td>PINTO HERNAN JIMENA</td><td class="cargo">E. FÍSICA - 6°B SEC.</td></tr>
        <tr><td>21</td><td>VALDIVIA ARANIBAR MONICA</td><td class="cargo">TÉCNICA TECNOLÓGICA</td></tr>
        <tr><td>22</td><td>RAMOS ROSMERY MAURA</td><td class="cargo">COSMOVISIÓN</td></tr>
    </tbody>
</table>

<button class="boton-volver" onclick="history.back()">Volver</button>

<footer>
    <?php include 'piedepagina.php'; ?>
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="js/cabecera.js"></script>

<script>
    $(document).ready(function(){
        $('.boton-volver').hover(function(){
            $(this).animate({ opacity: 0.85 }, 200).animate({ opacity: 1 }, 200);
        });
    });
</script>

</body>
</html>
