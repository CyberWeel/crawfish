'use strict';

/**
 * Функция ищет элемент по селектору
 *
 * @param string selector селектор, по которому производится поиск
 * @return Element первый обнаруженный DOM-элемент
 * @author Nikita Murashov
 */
function $elem(selector)
{
    return document.querySelector(selector);
}

/**
 * Функция ищет элементы по селектору
 *
 * @param string selector селектор, по которому производится поиск
 * @return array массив DOM-элементов
 * @author Nikita Murashov
 */
function $elems(selector)
{
    return Array.from(document.querySelectorAll(selector));
}

/**
 * Функция получает значение атрибута value элемента и верно его форматирует
 *
 * @param Element elem элемент, значение атрибута которого нужно получить
 * @param string type подходящий тип данных для значения атрибута
 * @return array отформатированное значение
 * @author Nikita Murashov
 */
function $value(elem, type)
{
    const VALUE = elem.value;

    switch (type) {
        case 'int':
            return parseInt(VALUE); break;
        case 'float':
            return parseFloat(VALUE); break;
        default:
            return VALUE;
    }
}

/**
 * Встроенная функция, которая "капитализирует" строку
 *
 * @return string "капитализированная" строка
 * @author Nikita Murashov
 */
String.prototype.toCapitalCase = function()
{
    return this.charAt(0).toUpperCase() + this.slice(1).toLowerCase();
}
