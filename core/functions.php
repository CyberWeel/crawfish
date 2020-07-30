<?php
/**
 * Функция упрощает анализ переменной или иных переданных данных
 *
 * @param mixed $var переменная или данные, переданные в функцию для анализа
 * @param bool $file необходимо ли записать лог в файл
 * @author Nikita Murashov
 */
function analyze(
    $var
    bool $file = false
) :void
{
    if ($file) {
        ob_start(NULL, 0, PHP_OUTPUT_HANDLER_FLUSHABLE);
        print_r($var);
        $result = ob_get_flush().PHP_EOL;
        file_put_contents(ROOT.'/log.txt', $result, FILE_APPEND);
    } else {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}
