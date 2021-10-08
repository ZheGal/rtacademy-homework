<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Завдання 7.8</title>

    <style>
        body {
            font-family: sans-serif;
        }
        
        .error_message {
            background-color: red;
            color: #fff;
            font-weight: bold;
            padding: 0.5rem 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ff8484;
        }
    </style>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <?php if (!empty($error_message)) : ?>
            <div class="error_message"><?= $error_message ?></div>
        <?php endif; ?>

        <input type="hidden" name="MAX_FILE_SIZE" value="<?= MAX_FILE_SIZE ?>" />
        <label for="city">Файл з містами (CSV):</label>
        <input name="userfile" type="file" placeholder="Оберіть файл з містами у форматі CSV" />
        <button type="submit">Надіслати</button>
    </form>
</body>

</html>