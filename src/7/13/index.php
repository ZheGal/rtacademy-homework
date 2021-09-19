<?php
$link = getLink('/blog');
echo "Please go to {$link}";

function getLink(string $str)
{
    return "<a href='{$str}'>{$str}</a>";
}