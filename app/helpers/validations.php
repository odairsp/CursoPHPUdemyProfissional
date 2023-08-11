<?php


function singleValidation($field, $validateType)
{
    if (str_contains($validateType, ":")) {
        [$validateType, $validateTypeParam] = explode(":", $validateType);
        return $validateType($field, $validateTypeParam);
    }
    return $validateType($field);
}

function multipleValidations($field, $validateTypes)
{
    $validateTypes = explode('|', $validateTypes);

    foreach ($validateTypes as $validadeType) {
        $result = singleValidation($field, $validadeType);

        if ($result === false) {

            return false;
        }
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
    return $data;
}
