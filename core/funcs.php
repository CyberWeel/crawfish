<?php
/**
 * Функция упрощает анализ переменной или иных переданных данных
 *
 * @param mixed $var переменная или данные, переданные в функцию для анализа
 * @param bool $file необходимо ли записать лог в файл
 * @author Nikita Murashov
 */
function analyze(
    $var,
    bool $file = false
) :void
{
    if ($file) {
        ob_start();
        echo date('d.m.Y H:i:s').PHP_EOL;
        var_dump($var);
        $result = ob_get_clean().PHP_EOL;
        file_put_contents(ROOT.'/log.txt', $result, FILE_APPEND);
    } else {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
}

/**
 * Функция совершает переход на другую страницу. При её вызове ничего не должно
 * быть выведено на текущей странице
 *
 * @param string $url абсолютный URL-путь страницы, на которую необходимо перейти
 * @author Nikita Murashov
 */
function march(
    string $url
)
{
    header('Location: '.$url);
    exit;
}

/**
 * Функция очищает строку от вредоносных и пустых символов
 *
 * @param string $str строка для очистки
 * @return string очищенная строка
 * @author Nikita Murashov
 */
function purgeString(
    string $str
) :string
{
    return htmlspecialchars(trim($str));
}

/**
 * Функция выполняет указанный SQL-запрос, используя неименованные псевдопеременные
 *
 * @param string $query SQL-запрос
 * @param array $params массив, содержащий набор параметров, указанных через запятую
 * @return объект PDOStatement
 * @author Nikita Murashov
 */
function sqlQuery(
    string $query,
    array $params = []
)
{
    global $conn;

    $sqlData = $conn->prepare($query);
    $sqlData->execute($params);

    return $sqlData;
}
