<?php

require '../vendor/autoload.php';

use Alexey\Files\FileManager;

$fileManager = new FileManager();

$filename = 'test.txt';
$data = "Привет, как дела?";

$fileManager->writeFile($filename, $data);
echo "Данные записаны в файл '$filename'." . PHP_EOL;

echo "Содержимое файла '$filename':" . PHP_EOL;
$fileManager->readFile($filename);
echo PHP_EOL;

echo "Список файлов в директории: " . PHP_EOL;
$fileManager->filesList('.');

$fileManager->deleteFile($filename);
