<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>exercicio 19</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>exercicio 19</h1>
        <form method="post">
            <div class="mb-3">
                <label for="dias" class="form-label">Informe a quantidade de dias</label>
                <input type="number" id="dias" name="dias" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
         if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $dia = $_POST['dias'];
            $horas = $dia*24;
            $minutos = $horas*60;
            $segundos = $minutos*60;

            echo "<p>Dias: $dia</p>";
            echo "<p>Horas: $horas</p>";
            echo "<p>Minutos: $minutos</p>";
            echo "<p>Segundos: $segundos</p>";
         }

            ?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>