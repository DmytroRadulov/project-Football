<?php

function updateAccount(array $data)
{
    unset($_SESSION['account']);
    $_SESSION['account']['fields'] = $data;

    if (emptyFields($data, 'account')) {
        redirect('/account');
    }

    $sql = "UPDATE " . Tables::Users->value . " SET balance = :balance, name = :name, surname = :surname, birthdate = :birthdate WHERE id = :id";
    $query = DB::connect()->prepare($sql);

    $data['id'] = $_SESSION['user']['id'];

    if ($query->execute($data)) {
        unset($_SESSION['account']);
    }

    redirect('/account');
}

function updatePassword(array $data)
{
    unset($_SESSION['account']);
    $_SESSION['account']['fields'] = $data;

    if (emptyFields($data, 'account')) {
        alert('danger', 'Поля не должны быть пустыми');
        redirect('/account/reset-password');
    }

    $user = dbFind(Tables::Users, $_SESSION['user']['id']);

    if (!password_verify($data['old_password'], $user['password'])) {
        alert('danger', 'Старый пароль неверный');
        redirect('/account/reset-password');
    }

    if (!passwordValidation($data['password'], $data['password_confirmation'], 'account')) {
        alert('danger', 'Новый пароль неверный');
        redirect('/account/reset-password');
    }

    $sql = "UPDATE " . Tables::Users->value . " SET password = :password WHERE id = :id";
    $query = DB::connect()->prepare($sql);

    $password = password_hash($data['password'], PASSWORD_BCRYPT);

    $query->bindParam('password', $password);
    $query->bindParam('id', $_SESSION['user']['id'], PDO::PARAM_INT);

    if ($query->execute()) {
        unset($_SESSION['account']);
        alert('success', 'Ваш пароль был изменен');
    }

    redirect('/account/reset-password');
}
