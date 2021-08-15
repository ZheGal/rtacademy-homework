<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Завдання 7.3</title>
</head>

<body>
    <pre>
    <?php
    $str = 'Hello World';

    echo "\n";
    $startTime = hrtime(1);
    echo 'Start time: ' . $startTime ."\n\n\n";
    echo "\n";
    echo "\n" . printTime( $str, 'str_shuffle' );
    echo "\n\n=========\n\n";
    echo "\n" . printTime( $str, 'myStrShuffle' );
    echo "\n\n=========\n\n";
    echo "\n" . printTime( $str, 'myStrShuffleTwo' );
    echo "\n\n\n\n";
    $endTime = hrtime(1);
    echo 'End time: ' . $endTime ."\n";
    echo "Difference:" . ($endTime - $startTime);

    function myStrShuffle(string $str): string
    {
        $array = str_split($str);
        shuffle($array);
        return implode('', $array);
    }

    function myStrShuffleTwo(string $str): string
    {
        $array = str_split($str);
        $count = count($array);
        $result = '';
        for ($i = 0; $i < $count; $i++) {
            $randId = rand(0, count($array) - 1);
            $result .= $array[$randId];
            unset($array[$randId]);
            $array = array_values($array);
        }
        return $result;
    }

    function printTime(string $str, string $func): string
    {
        $start = hrtime(1);
        $result = $func( $str );
        $end = hrtime(1);
        $diff = (int)($end - $start);

        var_dump($result);
        $final[] = "Function {$func}:";
        $final[] = "Result: \"{$result}\"";
        $final[] = "Start time: {$start}";
        $final[] = "End time: {$end}";
        $final[] = "Differenct: {$diff}";

        return implode("\n", $final);
    }

    ?>
</pre>
</body>

</html>