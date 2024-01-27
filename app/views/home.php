<?php require __DIR__.'/header.php' ?>

<h2>Home</h2>

<table border="1">
    <tr>
        <th> username </th>
    </tr>
    <?php foreach($users as $i => $user) : ?>
    <tr>
        <td> <?= htmlspecialchars($user['username']) ?> </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php require __DIR__.'/footer.php' ?>
