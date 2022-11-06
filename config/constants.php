<?php
const DB_HOST = 'localhost';
const DB_TABLE = 'football shop';
const DB_USER = 'root';
const DB_PASS = '';
const DSN = 'mysql:host=' . DB_HOST . ';dbname=' . DB_TABLE;

const CONFIG_DIR = ROOT_DIR . '/config';
const APP_DIR = ROOT_DIR . '/app';
const VIEWS_DIR = ROOT_DIR . '/views';
const PAGES_DIR = VIEWS_DIR . '/pages';
const PARTS_DIR = VIEWS_DIR . '/parts';

define('DOMAIN', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);


const ASSETS_URI = DOMAIN . '/assets';
const IMAGES_URI = ASSETS_URI . '/images';
const IMAGES_PRODUCTS = IMAGES_URI . '/catalog';
const IMAGES_PHOTO = IMAGES_URI . '/photo';


enum Tables: string
{
    case Content = 'content';
    case OrderProducts = 'order_products';
    case Orders = 'orders';
    case Products = 'products';
    case Users = 'users';
}

enum SocialFAIcons: string
{
    case Facebook = 'fa-brands fa-facebook';
    case Twitter = 'fa-brands fa-twitter';
    case Telegram = 'fa-brands fa-telegram';
    case Instagram = 'fa-brands fa-instagram';
    case Viber = 'fa-brands fa-viber';

    public static function byName(string $name)
    {
        return constant("self::$name");
    }
}

