<?php require __DIR__.'/header.php' ?>

<form action="/login" method="post">
    <input type="text" name="username" placeholder="username"/>
    <input type="password" name="password" placeholder="password"/>
    <button type="submit"> login </button>
</form>

<?php require __DIR__.'/footer.php' ?>
