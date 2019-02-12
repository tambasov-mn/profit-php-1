<?php
require_once __DIR__ . '/classes/GuestBook.php';

$guestBook = new GuestBook( __DIR__ . '/db_guest_posting.txt' );
$guestBook->append($_POST['new_post']);
$guestBook->save();

header('Location: /profit-php-1/DZ/06/2/index.php');