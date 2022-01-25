<?php

include './functions.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case '':
        case 'home':
            view('pages/home');
            break;
        case 'lokasiread':
            view('pages/admin/lokasiread');
            break;
        default:
            view('pages/404');
    }
} else {
    view('pages/home');
}
