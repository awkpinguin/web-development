<?php
header("Content-Type: text/plain");
function getRequestParameter(string $key): ?string
{
    return $_GET[$key] ?? null;
}

$password = getRequestParameter('password');

if ($password === null || $password === "")
{
    echo 'Данные введены неверно';
}

else
{
    if (!(ctype_alnum($password)))
    {
        echo "Введенные данные не являются паролем";
    }
    else
    {
        $length = strlen($password);
        $security = 4*$length;
        for ($i = 0; $i < $length; $i++)
        {
            if (is_numeric($password[$i]))
            {
                $point++;
            }
        }
        if ($point != 0)
        {
            $security += $point*4;
            $point = 0;
        }
        for ($i = 0; $i < $length; $i++)
        {
            if (ctype_upper($password[$i]))
            {
                $point++;
            }
        }
        if ($point != 0)
        {
            $security += ($length - $point) * 2;
            $point = 0;
        }
        for ($i = 0; $i < $length; $i++)
        {
            if (ctype_lower($password[$i]))
            {
                $point++;
            }
        }
        if ($point != 0)
        {
            $security += ($length - $point) * 2;
            $point = 0;
        }
        if (ctype_alpha($password)) || (ctype_digit($password))
        {
            $security -= $length;
        }

        $character = count_chars($password);
        foreach($character as $rep)
        {
            if ($rep > 1)
            {
                $security -= $rep;
            }
        }
        echo "Надежность пароля: " .$security;
    }
}