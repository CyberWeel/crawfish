'use strict';

if (typeof $_elem === 'undefined') {
    var $_elem = function(selector) {
        return document.querySelector(selector);
    };
}

if (typeof $_elems === 'undefined') {
    var $_elems = function(selector) {
        return Array.from(document.querySelectorAll(selector));
    };
}

if (typeof $_value === 'undefined') {
    var $_value = function(elem, type) {
        const VALUE = elem.value;

        switch (type) {
            case 'int':
                return parseInt(VALUE); break;
            case 'float':
                return parseFloat(VALUE); break;
            default:
                return VALUE;
        }
    };
}

if (typeof String.prototype.toCapitalCase === 'undefined') {
    String.prototype.toCapitalCase = function() {
        return this.charAt(0).toUpperCase() + this.slice(1).toLowerCase();
    }
}

/*
Правила:
1) textContent вместо innerHTML
2) const вместо let и уж тем более var

Список функций:
$_elem(selector) - возвращает элемент по селектору
$_elems(selector) - возвращает массив элементов по селектору
$_value(elem, [type]) - возвращает атрибут value элемента

String.prototype.toCapitalCase() - выполняет капитализацию строки
*/
