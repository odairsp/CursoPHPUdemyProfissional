<?php

function validate(array $validations)
{
    $result = [];
    foreach ($validations as $field => $validateTypes) {
        $result[$field] = (str_contains($validateTypes, '|')) ?
            multipleValidations($field, $validateTypes) :
            singleValidation($field, $validateTypes);
    }

    if (in_array(false, $result)) {
        return false;
    }
    return $result;
}
