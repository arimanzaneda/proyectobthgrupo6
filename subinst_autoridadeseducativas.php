<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Autoridades educativas</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Lora&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/cabecera.css" />
    <style>
        body {
            font-family: 'Lora', serif;
            background: linear-gradient(to right, #fdfbfb, #ebedee);
            color: #333;
            padding: 40px 20px;
            /*display: flex;
            flex-direction: column;*/
            align-items: center;
        }
        h1 {
            font-family: 'Cinzel', serif;
            text-align: center;
            color: #8B0000;
            margin-bottom: 30px;
            font-size: 2.5rem;
            position: relative;
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
            margin-left:450px;
        }
        th {
            background-color: #8B0000;
            color: white;
            padding: 16px;
            font-size: 1rem;
            letter-spacing: 0.5px;
        }
        footer{
            widht:100%;
         
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
            margin-top: 30px;
            padding: 12px 28px;
            font-size: 1rem;
            background-color: #7c0b0b88;
            border: none;
            border-radius: 25px;
            color: white;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-left:850px;
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

    <h1>AUTORIDADES</h1>

    <table>
        <thead>
            <tr>
                <th>Nº</th>
                <th>NOMBRES COMPLETOS</th>
                <th>CARGO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>LIC. ROSE MARY FLORES ARRATIA</td>
                <td class="cargo">DIRECTORA</td>
            </tr>
            <tr>
                <td>2</td>
                <td>CASTILLO VARGAS ABIGAIL</td>
                <td class="cargo">SECRETARIA</td>
            </tr>
            <tr>
                <td>3</td>
                <td>JHANET CHACON MAMANI</td>
                <td class="cargo">PORTERA</td>
            </tr>
        </tbody>
    </table>

    <button class="boton-volver" onclick="history.back()">Volver</button>

<br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php include 'piedepagina.php'; ?>
    

    <script src="js/cabecera.js"></script>
</body>
</html>
