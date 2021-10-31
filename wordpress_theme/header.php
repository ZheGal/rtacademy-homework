<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= get_bloginfo( 'name' ) ?></title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo"><a href="#"><?= get_bloginfo( 'name' ) ?></a></div>
            <ul class="nav">
                <li><a href="#">Головна</a></li>
                <li><a href="#">Про нас</a></li>
                <li><a href="#">Елементи</a></li>
                <li><a href="#">Контакти</a></li>
                <li><a href="#">Автори</a></li>
                <li><a href="#">Теги</a></li>
                <li><a href="#">Вхід</a></li>
                <li><a href="#" class="red_button">Реєстрація</a></li>
                <li><a href="#"><i class="far fa-moon"></i></a></li>
                <li><a href="#"><i class="fas fa-search"></i></a></li>
            </ul>
        </div>
    </header>
    <main>
