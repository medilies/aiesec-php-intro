<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIESEC workshop</title>
</head>
<body>

<?php
    $username = (new \Medilies\AiesecPhpIntro\Session)->get('username');
?>

<header>
    <h1> AIESEC PHP intro </h1>
    <?php if(is_null($username)): ?>
        <a href="/login"> Login </a>
        <a href="/register"> Register </a>
    <?php else: ?>
        <form action="/logout" method="post" >
            <button> Logout </button>
        </form>
        <p> You are: <?= htmlspecialchars($username) ?> </p>
    <?php endif; ?>
</header>

<hr>
