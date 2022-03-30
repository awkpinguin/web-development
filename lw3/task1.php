<?php

function getRequestParameter(string $key): ?string
{
    return $_GET[$key] ?? null;
}

$identifier=getRequestParameter('identifier');

if ($identifier === null || $identifier === "")
{
    echo 'Данные введены неверно';
}
else
{
    $arr = str_split($identifier);
    if (is_numeric($arr[0]))
        echo "NO, идентификатор должен начинаться с буквы";
    else
    {
        for ($i = 1; $i < count($arr); ++$i)
        {
            if (ctype_alpha($arr[$i]) || (is_numeric($arr[$i])))
                $answer = "YES, идентификатор верный";
            else
                $answer = "NO, идентификатор неверный";
        }
        echo $answer;
    }
}