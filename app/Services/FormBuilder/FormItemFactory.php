<?php

namespace App\Services\FormBuilder {


    class FormItemFactory
    {
        private $typeList = array(
            'text' => \App\Services\FormBuilder\Elements\Text::class,
            'textarea' => \App\Services\FormBuilder\Elements\TextArea::class,
            'password' => \App\Services\FormBuilder\Elements\Password::class,
            'number' => \App\Services\FormBuilder\Elements\Number::class,
            'address' => \App\Services\FormBuilder\Elements\Address::class,
            'select' => \App\Services\FormBuilder\Elements\Select::class,
            'date' => \App\Services\FormBuilder\Elements\Date::class,
            'checkbox' => \App\Services\FormBuilder\Elements\Checkbox::class,
            'radio' => \App\Services\FormBuilder\Elements\RadioButton::class,
            'file' => \App\Services\FormBuilder\Elements\File::class,
            'split' => \App\Services\FormBuilder\Elements\Split::class,
            'editor' => \App\Services\FormBuilder\Elements\Editor::class,
        );


        public function getItem($type, $param)
        {
            try {
                if ($type == 'date') {
                    //dd($param);
                }
                $className = $this->typeList[$type];
                return new $className($param);
            } catch (\Exception $exception) {
                // @TODO 默认不创建或默认创建一个文本 待定
                return new $this->typeList['text']();
            }
        }
    }
}
