<?php
if (!isset($_COOKIE['test'])) {
    setcookie('test', 'azazazazazaz');
    header("Location:{$_SERVER['REQUEST_URI']}");
} else {
    setcookie('test', null, time() - 86400);
}

print_r($_COOKIE);