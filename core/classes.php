<?php

class Form {
    private $formAction;
    private $formClass;
    private $formMethod;
    private $formEnctype;
    private $maxFileSize;
    private $elements = [];

    /**
     * Функция присваивает основные параметры формы объекту
     *
     * @param string $action содержит атрибут action формы
     * @param string $class содержит атрибут class формы
     * @param string $method содержит атрибут method формы
     * @param bool $withFiles если указано значение true, то атрибуту формы
     * enctype указывается значение 'multipart/form-data'
     * @param int $size устанавливает максимальный размер загружаемого файла
     * @author Nikita Murashov
     */
    public function __construct(
        string $action,
        string $class = '',
        string $method = 'POST',
        bool $withFiles = false,
        int $size = 0
    ) {
        $this->formAction = $action;
        $this->formClass = $class;
        $this->formMethod = $method;

        if ($withFiles) {
            $this->formEnctype = 'multipart/form-data';

            if ($size !== 0) {
                $this->maxFileSize = $size;
            } else {
                # -1 означает, что форма подразумевает загрузку файла, но при этом
                # программист забыл указать максимальный размер файла
                $this->maxFileSize = -1;
            }
        } else {
            $this->formEnctype = '';
            # false означает, что форма точно не подразумевает загрузку файла
            $this->maxFileSize = false;
        }
    }

    /**
     * @param string $name атрибуты name и id у элемента, а также атрибут for у
     * элемента label
     * @param string $label содержимое элемента label
     * @param string $class класс элемента
     * @param string $placeholder содержимое атрибута placeholder
     * @param string $element тип элемента - input или textarea
     * @param string $type тип элемента input
     * @param string $value значение атрибута value
     * @author Nikita Murashov
     */
    public function addElement(
        string $name,
        string $label,
        string $class = '',
        string $placeholder = '',
        string $element = 'input',
        string $type = 'text',
        string $value = ''
    )
    {
        array_push(
            $this->elements,
            [
                'name' => $name,
                'label' => $label,
                'class' => $class,
                'placeholder' => $placeholder,
                'element' => $element,
                'type' => $type,
                'value' => $value
            ]
        );
    }

    /**
     * Функция выводит форму
     *
     * @author Nikita Murashov
     */
    public function writeForm()
    {
        echo `<form class="$this->formClass" action="$this->formAction" method="$this->formMethod"`;

        if (!empty($this->formEnctype)) {
            echo `
                enctype="$this->formEnctype">
                <input type="hidden" name="MAX_FILE_SIZE" value="$this->maxFileSize">
            `;
        } else {
            echo `>`;
        }

        if (!empty($this->elements)) {
            foreach ($this->elements as $element) {
                echo `<label for="{$element['name']}">{$element['label']}</label>`;

                if ($element['element'] === 'input') {
                    echo `<input type="{$element['type']}" `;
                } else if ($element['element'] === 'textarea') {
                    echo `<textarea `;
                }

                if (!empty($element['class'])) {
                    echo `class="{$element['class']} "`;
                }

                if (!empty($element['placeholder'])) {
                    echo `placeholder="{$element['placeholder']} "`;
                }

                if (!empty($element['value'])) {
                    echo `value="{$element['value']} "`;
                }

                echo `id="{$element['name']}" name="{$element['name']}">`;

                if ($element['element'] === 'textarea') {
                    echo `</textarea>`;
                }
            }
        }

        echo `</form>`;
    }
}
