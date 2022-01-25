<?php

include './functions.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case '':
        case 'home':
            page('pages/home');
            break;
        default:
            page('pages/404');
    }
} else {
    page('pages/home');
}
