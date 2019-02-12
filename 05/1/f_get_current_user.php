<?php
function getCurrentUser() {
    session_start();
    if ( true == $_SESSION['check_status'] && isset($_SESSION['username']) ) {
        return $_SESSION['username'];

    } else {
        return null;
    }
}