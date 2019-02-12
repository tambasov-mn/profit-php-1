<?php
function existsUser($login) {
    if ( isset(getUsersList()[$login] ) ) {
        return true;
    } else {
        return null;
    }
}
