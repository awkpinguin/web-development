<?php
    header("Content-Type: text/plain");
    $text = trim($_GET['text']);
    while (strpos($text, '  ') == true)
    {
        $text = str_replace('  ',' ', $text);
    }
    echo $text;
?>