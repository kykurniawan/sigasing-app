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
        case 'jabatanupdate':
            view('pages/admin/jabatanupdate');
            break;
        case 'jabatandelete':
            view('pages/admin/jabatandelete');
            break;
        case 'bagianread':
            view('pages/admin/bagianread');
            break;
        case 'bagiancreate':
            view('pages/admin/bagiancreate');
            break;
        case 'bagianupdate':
            view('pages/admin/bagianupdate');
            break;
        case 'bagiandelete':
            view('pages/admin/bagiandelete');
            break;
        case 'karyawanread':
            view('pages/admin/karyawanread');
            break;
        case 'karyawancreate':
            view('pages/admin/karyawancreate');
            break;
        case 'karyawanupdate':
            view('pages/admin/karyawanupdate');
            break;
        default:
            view('pages/404');
    }
} else {
    view('pages/home');
}
