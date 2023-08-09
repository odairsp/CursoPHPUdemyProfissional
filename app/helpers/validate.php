<?php

function validate(array $validations)
{
    $result = [];
    foreach ($validations as $field => $validate) {
        if (!str_contains($validate, '|')) {
            $result[$field] = required($field);
        } else {
            $explodePipeValidate = explode('|', $validate);
            foreach ($explodePipeValidate as $validate) {
                $result[$field] = $validate($field);
            }
        }
    }

    if (in_array(false, $result)) {
        return false;
    }

    return $result;
}


function required($field)
{
    if ($_POST[$field] === '') {
        setFlash($field, "Campo obrigatório!");
        return false;
    }
    return filter_input(INPUT_POST, $field, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

function unique($field){

}
function email($field)
{
}

function maxLen($filed)
{
}
