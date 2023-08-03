<h2>Users</h2>

<div>
    <ul>
        <?php foreach ($users as $user) : ?>
        <li><?= $user->nome ?> | <a href="/user/<?= $user->id ?>">detalhes</a></li>
        <?php endforeach; ?>

    </ul>

</div>