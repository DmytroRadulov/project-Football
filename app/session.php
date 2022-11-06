<?php

function addUser(int $id, bool $isAdmin)
{
    $_SESSION['user'] = compact('id', 'isAdmin');
}

function removeUser()
{
    unset($_SESSION['user']);
}

function isAdmin(): bool
{
    return isLoggedIn() ? $_SESSION['user']['isAdmin']: false;
}

function isLoggedIn(): bool
{
    return !empty($_SESSION['user']);
}