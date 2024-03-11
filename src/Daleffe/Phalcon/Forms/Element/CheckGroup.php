<?php

namespace Daleffe\Phalcon\Forms\Element;

class CheckGroup extends \Phalcon\Forms\Element\AbstractElement
{
    public function render(array $attributes = NULL): string
    {
        $checked = null;
        $html = '';

        if (is_array($attributes)) {
            foreach ($attributes as $key => $value) $this->setAttribute($key, $value);
        } else { $attributes = $this->getAttributes(); }

        // Optional attribute to break line each 'n' checkboxes.
        $count = ((isset($attributes['linebreakeach']) and is_int($attributes['linebreakeach'])) ? 0 : null);

        foreach ($attributes['elements'] as $key => $value) {
            if (is_array($this->getValue())) {
                $checked = (array_search($key, $this->getValue()) === false) ? null : ' checked';
            } else {
                $checked = ($key == $this->getValue() && !is_null($this->getValue())) ? ' checked' : null;
            }

            if (!is_null($count) and $count != 0 and $count % $attributes['linebreakeach'] === 0) $html .= '<br />';

            $html .= '<input type="checkbox" id="' . $this->getName() . $key . '" name="' . $this->getName() . '[]' . '" value="' . $key . '"' . $checked . ' /> ' . $value . ' ';

            if (!is_null($count)) $count++;
        }

        return $html;
    }
}