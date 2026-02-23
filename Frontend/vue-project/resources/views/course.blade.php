<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Cursos</title>
    @vite('resources/js/app.js')

    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #1d2671, #c33764);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        #app {
            width: 100%;
            max-width: 1100px;
            background-color: #ffffff;
            border-radius: 14px;
            padding: 30px 35px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.18);
        }

        /* Componente Vue */
        course {
            display: block;
            width: 100%;
        }

        /* Títulos */
        .titulo {
            font-size: 2rem;
            margin-bottom: 25px;
            color: #2d2d2d;
            text-align: center;
            font-weight: 600;
        }

        /* Botones */
        .btn {
            background-color: #c33764;
            color: #fff;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #a72b52;
            transform: translateY(-2px);
        }

        /* Tarjetas / cursos */
        .card {
            background-color: #f7f7f7;
            border-radius: 10px;
            padding: 18px;
            margin-bottom: 18px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }

        /* Formularios */
        input, select {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 0.95rem;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #c33764;
            box-shadow: 0 0 0 2px rgba(195, 55, 100, 0.2);
        }

        /* Listas */
        ul {
            list-style: none;
        }

        li {
            padding: 10px 0;
            border-bottom: 1px solid #e0e0e0;
        }
    </style>
</head>
<body>
    <div id="app">
        <course></course>
    </div>
</body>
</html>
