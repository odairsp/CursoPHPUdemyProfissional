<?php

function validate(array $validations)
{
    $result = [];
    $param = '';

    foreach ($validations as $field => $validate) {
        if (!str_contains($validate, '|')) {
            if (str_contains($validate, ':')) {
                [$validade, $param] = explode(':', $validate);
            }
            $result[$field] = $validate($field, $param);
        } else {
            $result[$field] = multipleValidations($field, $validate, $param);
        }
    }

    if (in_array(false, $result)) {
        return false;
    }

    return $result;
}

function multipleValidations($field, $validate, $param)
{
    $result = [];

    $explodePipeValidate = explode('|', $validate);
    foreach ($explodePipeValidate as $validate) {
        if (str_contains($validate, ':')) {
            [$validate, $param] = explode(':', $validate);
        }
        $result[$field] = $validate($field, $param);
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

function unique($field, $param)
{
    $data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $user = findBy($param, $field, $data);

    if ($user) {
        setFlash($field, "Email já utilizado");
        return false;
    }
    return $data;
}

function email($field)
{

    $emailIsValid = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);
    if (!$emailIsValid) {
        setFlash($field, "Email inválido!");
        return false;
    }
    return filter_input(INPUT_POST, $field, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}


function maxLen($field, $param)
{
    $data = filter_input(INPUT_POST, $field, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (strlen($data) > $param) {
        setFlash($field, 'Tamanho máximo é de ' . $param . ' caracteres!');
        return false;
    }
    return true;
}