<?php
function isStringFilter($value): string|null
{
    return is_string($value) ? $value : null;
}


function getRegisterParams(): array
{
    $args = [
        'name' => ['filter' => FILTER_CALLBACK, 'options' => 'isStringFilter'],
        'surname' => ['filter' => FILTER_CALLBACK, 'options' => 'isStringFilter'],
        'birthdate' => ['filter' => FILTER_CALLBACK, 'options' => 'isStringFilter'],
        'email' => FILTER_VALIDATE_EMAIL,
        'password' => ['filter' => FILTER_CALLBACK, 'options' => 'isStringFilter'],
        'password_confirmation' => ['filter' => FILTER_CALLBACK, 'options' => 'isStringFilter']
    ];
    return filter_input_array(INPUT_POST, $args);
}

function getLoginParams(): array
{
    $args = [
        'email' => FILTER_VALIDATE_EMAIL,
        'password' => ['filter' => FILTER_CALLBACK, 'options' => 'isStringFilter'],
    ];
    return filter_input_array(INPUT_POST, $args);
}

function addToCartHelpers(): array
{
    $args = [
        'product_id' => FILTER_VALIDATE_INT,
        'quantity' => FILTER_VALIDATE_INT,
        'additions' => [
            'filter' => FILTER_VALIDATE_INT ,
            'flags' => FILTER_REQUIRE_ARRAY
        ],
        'additions_qnty' => [
            'filter' => FILTER_VALIDATE_INT ,
            'flags' => FILTER_REQUIRE_ARRAY

    ]
        ];

    return filter_input_array(INPUT_POST, $args);
}

function removeProductHelper(): array
{
    $args = [
        'product_position' => FILTER_VALIDATE_INT,
        'addition_position' => FILTER_VALIDATE_INT
    ];

    return filter_input_array(INPUT_POST, $args);

}

function createOrderHelper(): array
{
    $args = [
        'address' => ['filter' => FILTER_CALLBACK, 'options' => 'isStringFilter'],
        'delivery' => ['filter' => FILTER_CALLBACK, 'options' => 'isStringFilter']
    ];

    return filter_input_array(INPUT_POST, $args);

}

function getAccountParams(): array
{
    $args = [
        'name' => ['filter' => FILTER_CALLBACK, 'options' => 'isStringFilter'],
        'surname' => ['filter' => FILTER_CALLBACK, 'options' => 'isStringFilter'],
        'birthdate' => ['filter' => FILTER_CALLBACK, 'options' => 'isStringFilter'],
        'balance' => ['filter' => FILTER_CALLBACK, 'options' => 'isStringFilter']
    ];
    return filter_input_array(INPUT_POST, $args);
}

function getAccountPasswordParams(): array
{
    $args = [
        'old_password' => ['filter' => FILTER_CALLBACK, 'options' => 'isStringFilter'],
        'password' => ['filter' => FILTER_CALLBACK, 'options' => 'isStringFilter'],
        'password_confirmation' => ['filter' => FILTER_CALLBACK, 'options' => 'isStringFilter']
    ];
    return filter_input_array(INPUT_POST, $args);
}