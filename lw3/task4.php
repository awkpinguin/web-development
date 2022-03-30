<?php
header("Content-Type: text/plain");
function getRequestParameter(string $key): ?string
{
    return $_GET[$key] ?? null;
}
$info = [
    'first_name' => getRequestParameter('first_name'),
    'last_name' => getRequestParameter('last_name'),
    'email' => getRequestParameter('email'),
    'age' => getRequestParameter('age'),
];
if ($info['email'] === null || $info['email'] === "")
{
    echo 'Введите значение email';
}
else
{
    $fileName = './data/' . $info['email'] . '.txt';
    if (file_exists($fileName))
    {
        $infoFile = file($fileName);
        if ($info['first_name'] === null || $info['first_name'] === "")
        {
            $info['first_name'] = trim(substr($infoFile[0], strpos($infoFile[0], ':') + 1));
        }
        if ($info['last_name'] === null || $info['last_name'] === "")
        {
            $info['last_name'] = trim(substr($infoFile[1], strpos($infoFile[1], ':') + 1));
        }
        if ($info['age'] === null || $info['age'] === "")
        {
            $info['age'] = trim(substr($infoFile[3], strpos($infoFile[3], ':') + 1));
        }
    }
    $infoStr = $infoStr . 'First Name: ' . $info['first_name'] . PHP_EOL;
    $infoStr = $infoStr . 'Last Name: ' . $info['last_name'] . PHP_EOL;
    $infoStr = $infoStr . 'Email: ' . $info['email'] . PHP_EOL;
    $infoStr = $infoStr . 'Age: ' . $info['age'] . PHP_EOL;
    $success = file_put_contents($fileName, $infoStr);
    if ($success)
    {
        echo 'Данные записаны в файл ' . $fileName;
    }
    else
    {
        echo 'Ошибка записи в файл ' . $fileName;
    }
}