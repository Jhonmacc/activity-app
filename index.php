<?php
require_once __DIR__ . '/convertArabicToRoman.php';
require_once __DIR__ . '/convertRomanToArabic.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Números</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 600px; margin: auto; }
        input, button { padding: 10px; margin: 5px; }
        .result { font-size: 18px; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Conversor de Números Arábicos e Romanos</h1>
        <h2>Arábico para Romano</h2>
        <form method="post">
            <input type="number" name="arabicNumber" placeholder="Digite um número" min="1" required>
            <button type="submit" name="convertToRoman">Converter</button>
        </form>
        <div class="result">
            <?php
            if (isset($_POST['convertToRoman'])) {
                $converter = new ArabicToRomanConverter();
                $arabicNumber = intval($_POST['arabicNumber']);
                echo 'Número Romano: ' . $converter->convert($arabicNumber);
            }
            ?>
        </div>

        <h2>Romano para Arábico</h2>
        <form method="post">
            <input type="text" name="romanNumber" placeholder="Digite um número romano" required>
            <button type="submit" name="convertToArabic">Converter</button>
        </form>
        <div class="result">
            <?php
            if (isset($_POST['convertToArabic'])) {
                $converter = new RomanToArabicConverter();
                $romanNumber = strtoupper($_POST['romanNumber']);
                $result = $converter->convert($romanNumber);
                if ($result !== null) {
                    echo 'Número Arábico: ' . $result;
                } else {
                    echo 'Número Romano inválido.';
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
