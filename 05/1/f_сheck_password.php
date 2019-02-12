<?php
function сheckPassword($login, $password) {
    if ( ( true == existsUser($login) ) && ( true == password_verify($password, getUsersList()[$login]) ) ) {
        return true;
    } else {
        return null;
    }
}