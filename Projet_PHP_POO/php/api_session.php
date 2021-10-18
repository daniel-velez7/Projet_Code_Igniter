<?php

session_start();

if (isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == 'insert') {
        echo json_encode($_SESSION[$_REQUEST['key']] = $_REQUEST['value']);
        exit;
    } else if ($_REQUEST['action'] == 'remove') {
        echo json_encode($_SESSION[$_REQUEST['key']] = null);
        exit;
    } else if ($_REQUEST['action'] == 'update') {
        echo json_encode($_SESSION[$_REQUEST['key']] = $_REQUEST['value']);
        exit;
    } else if ($_REQUEST['action'] == 'select') {
        echo json_encode($_SESSION[$_REQUEST['key']]);
        exit;
    } else {
        echo json_encode('null');
        exit;
    }
}