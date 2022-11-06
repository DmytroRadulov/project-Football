<?php
function login(array $fields)
{
    validateLoginFields($fields);
    $user = retrieveUser($fields['email']);

    if (!password_verify($fields['password'], $user['password'])) {
        loginErrorRedrict();
    }

    addUser($user['id'], $user['is_admin']);

    unset($_SESSION['login']);
    alert('success', "Добро пожаловать, {$user['name']}");
    redirect();
}

function validateLoginFields(array $fields)
{
    unset($_SESSION['login']);
    $_SESSION['login']['fields'] = $fields;

    if (emptyFields($fields, 'login')) {
        redirect('/login');
    }


}

function retrieveUser(string $email): array
{

    $user = dbSelect(Tables::Users, conditions: "email = '{$email}'", isSingle: true);
    if (!$user) {
        loginErrorRedrict();

    }
    return $user;
}

function loginErrorRedrict()
{
    alert('danger', 'Email и пароль не являются действительными');
    redirect('/login');
}
