<?php
header("Content-Type: text/plain");
function getRequestParameter(string $key): ?string
{
    return $_GET[$key] ?? null;
}
$info = [
    'first_name' => "",
    'last_name' => "",
    'email' => getRequestParameter('email'),
    'age' => "",
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
        $info['first_name'] = substr($infoFile[0], strpos($infoFile[0], ':') + 1);
        $info['last_name'] = substr($infoFile[1], strpos($infoFile[1], ':') + 1);
        $info['age'] = substr($infoFile[3], strpos($infoFile[3], ':') + 1);

        $infoStr = $infoStr . 'First Name: ' . $info['first_name'];
        $infoStr = $infoStr . 'Last Name: ' . $info['last_name'];
        $infoStr = $infoStr . 'Email: ' . $info['email'] . PHP_EOL;
        $infoStr = $infoStr . 'Age: ' . $info['age'];
        echo $infoStr;
    }
    else
    {
        echo "Ошибка чтения файла";
    }
}