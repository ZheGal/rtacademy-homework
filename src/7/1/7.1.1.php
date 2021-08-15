<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="utf-8">
    <title>Теги PHP</title>
</head>

<body>
    <?php
        echo ('<h1>Відобразимо цей текст в тегу h1</h1>');
    ?>
    <h2>Це буде відображено без використання PHP</h2>

    <?php
    // відобразимо час, за допомогою функції date
    // час буде змінюватися при оновленні сторінки
        echo ('Поточний час: <span id="time">' . date('d.m.Y H:i:s') . '</span>');
    ?>

    <script src="/js/7.1.1.js"></script>
</body>

</html>