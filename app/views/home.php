<?php $this->layout('master', ['title' => $title]) ?>

<h2>Users</h2>

<div>
    <ul id="home-list">
        <?php
        if (isset($users)) :
            foreach ($users as $user) : ?>
                <li><?= $user->firstName ?> | <a href="/user/<?= $user->id ?>">detalhes</a></li>
            <?php endforeach; ?>
        <?php else : ?>
            <li><?= $user->firstName ?> | <a href="/user/<?= $user->id ?>">detalhes</a></li>
        <?php endif ?>
    </ul>
</div>