<?php

function cityNameCapitalize(string $string): string
{
    $string = trim($string);
    $firstUpper = mb_substr(mb_strtoupper($string), 0, 1);
    $allLower = mb_substr(ucfirst(mb_strtolower($string)), 1);
    return $firstUpper . $allLower;
}

$value = (isset($_GET['city'])) ? htmlspecialchars($_GET['city']) : '';
$city = (isset($_GET['city'])) ? cityNameCapitalize(strip_tags($_GET['city'])) : '';

?>
<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Завдання 7.5</title>
    <style>
        body {
            font-family: sans-serif;
        }

        form {
            margin: 1.5em auto;
            display: flex;
            width: fit-content;
            flex-direction: column;
        }

        form>* {
            margin: 0.5em 1em;
        }
    </style>
</head>

<body>

    <form>
        <div>
            <label for="cityname">Назва міста:</label>
            <input type="text" name="city" id="cityname" value="<?=$value?>">
        </div>
        <div><button type="submit">Надіслати</button></div>
    </form>

    <?php if (isset($city) && !empty($city)) : ?>
        <hr />
        <div style="width:100%;max-width:500px;margin:0 auto;">
            <h2>Результат:</h2>
            <p><?=$city?></p>
        </div>
    <?php endif; ?>

</body>

</html>