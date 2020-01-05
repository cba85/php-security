<?php

// Set cookie http only
$week = new DateTime('+1 week');

// Bad
setcookie('key', 'value', $week->getTimestamp());

// Good
setcookie('key', 'value', $week->getTimestamp(), '/', null, null, true);

echo $_COOKIE['key'];

// Set values in cookie

// Bad
setcookie('user_id', '1', $week->getTimestamp(), '/', null, null, true);