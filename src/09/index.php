<?php

// Додайте форму для завантаження зображення у одному з форматів JPEG, PNG, GIF та розмірі файлу не
// більше 10МБ та мінімальних ширині і висоті не менше за 500px

// При завантаженні файла на сервер PHP-скрипт (7.9.php) має виконувати наступні дії:
    // a. Перевіряти завантажений файл на код помилки (має бути UPLOAD_ERR_OK)
    // b. Перевіряти завантажений файл коректний MIME-тип файлу
    // c. Перевіряти розмір завантаженого файлу
    // d. Використовуючи графічну бібліотеку GD, перевіряти ширину та висоту зображення
    // e. Використовуючи графічну бібліотеку GD, вирізати з центральної частини зображення прямокутник у
    // форматі 4:5 (формат Instagram).
    // f. Використовуючи графічну бібліотеку GD, зменшувати цей прямокутник до 300px по висоті та
    // зберігати у директорії (./data/) з унікальним імʼям (це може бути timestamp) у форматі JPEG
    // (незалежно від того в якому форматі його було завантажено) та дозволами 644.
    // g. Вивести на цю сторінку це зображення за допомогою елемента <img>

//

