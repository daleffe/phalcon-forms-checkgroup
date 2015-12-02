<?php

namespace Daleffe\Phalcon\Forms\Element;

class CheckGroup extends \Phalcon\Forms\Element
{
    public function render($attributes = [])
    {
        $checked = null;
        $html = '';

        if (is_array($attributes)) {
            foreach ($attributes as $key => $value) {
                $this->setAttribute($key, $value);
            }
        } else {
            $attributes = $this->getAttributes();
        }

        foreach ($attributes['elements'] as $key => $value) {
            if (is_array($this->getValue())) {
                $checked = (array_search($key, $this->getValue()) === false) ? null : ' checked';
            } else {
                $checked = ($key == $this->getValue() && !is_null($this->getValue())) ? ' checked' : null;
            }

            $html .= '<input type="checkbox" id="' . $this->getName() . $key . '" name="' . $this->getName() . '[]' . '" value="' . $key . '"' . $checked . ' /> ' . $value . ' ';
        }

        return $html;
    }
}