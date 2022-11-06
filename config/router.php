<?php

switch (getUrl()) {
    case "":
        require_once PAGES_DIR . '/main.php';
        break;
    case "login":
        if (isLoggedIn()) {
            redirect('/account');
        }
        require_once PAGES_DIR . '/auth/login.php';
        break;
    case "register":
        if (isLoggedIn()) {
            redirect('/account');
        }
        require_once PAGES_DIR . '/auth/register.php';
        break;
    case "account":
        if (!isLoggedIn()) {
            redirect('/login');
        }
        $user = dbFind(Tables::Users,$_SESSION['user']['id']);
        require_once PAGES_DIR . '/account/index.php';
        break;
    case "account/reset-password":
        if (!isLoggedIn()) {
            redirect('/login');
        }
        $user = dbFind(Tables::Users,$_SESSION['user']['id']);
        require_once PAGES_DIR . '/account/reset-password.php';
        break;
    case "logout":
        removeUser();
        redirect();
        break;
    case "cart":
        if (!isLoggedIn()) {
            redirect('/login');
        }
        require_once PAGES_DIR . '/cart.php';
        break;
    case "checkout":
        if (!isLoggedIn()) {
            redirect('/login');
        }
        if (empty($_SESSION['cart'])){
            alert('info', 'Ваша корзина пустая');
            redirect();
        }
        require_once PAGES_DIR . '/checkout.php';
        break;
    default:
        dd(getUrl());
}