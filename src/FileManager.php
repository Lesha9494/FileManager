<?php

namespace Alexey\Files;

class FileManager
{

    function readFile($filename): void
    {
        $fd = fopen($filename, 'r') or die("Не удалось открыть файл");
        while (!feof($fd)) {
            $str = htmlentities(fgets($fd));
            echo $str;
        }
        fclose($fd);
    }

    function writeFile($filename, $data): void
    {
        $fd = fopen($filename, 'w') or die("Не удалось создать файл");
        fwrite($fd, $data);
        fclose($fd);
    }

    function deleteFile($filename): void
    {
        if (unlink($filename)) {
            echo "Файл был успешно удален";
        } else {
            echo "Ошибка при удалении файла";
        }
    }

    function filesList($catalog): void
    {
        if (is_dir($catalog)) {
            if ($dh = opendir($catalog)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file == '.' || $file == '..') {
                        continue;
                    }
                    if (is_file($catalog . '/' . $file)) {
                        echo "Файл: $file" . PHP_EOL;
                    }
                }
                closedir($dh);
            }
        }
    }
}
