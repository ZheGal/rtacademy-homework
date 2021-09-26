<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Завдання 7.1</title>
    <style>
        iframe {
            width: 100%;
            height: 100%;
            border: 1px solid #dadada;
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .content > div {
            width: 100%;
            flex: 1;
            min-height: 45vh;
            display: flex;
            flex-direction: column;
        }

        .content > div iframe {
            flex: 1 1 auto;
        }
    </style>
</head>
<body>
    <div class="content">
        <div>
            <h2><a href="/01/7.1.1.php">7.1.1</a></h2>
            <iframe src="/01/7.1.1.php" frameborder="0"></iframe>
        </div>
        <div>
            <h2><a href="/01/7.1.2.php">7.1.2</a></h2>
            <iframe src="/01/7.1.2.php?get=info&iframe=yes" frameborder="0"></iframe>
        </div>
    </div>
</body>
</html>