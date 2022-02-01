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
        case 'lokasicreate':
            view('pages/admin/lokasicreate');
            break;
        case 'lokasiupdate':
            view('pages/admin/lokasiupdate');
            break;
        case 'lokasidelete':
            view('pages/admin/lokasidelete');
            break;
        case 'jabatanread':
            view('pages/admin/jabatanread');
            break;
        case 'jabatancreate':
            view('pages/admin/jabatancreate');
            break;
        default:
            view('pages/404');
    }
} else {
    view('pages/home');
}
