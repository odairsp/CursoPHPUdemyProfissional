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

<?= $this->start('script') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"
    integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
axios.defaults.headers = {
    X_REQUEST_WITH: "XMLHttpRequest"
}
async function loadUsers() {
    try {
        const {
            data
        } = await axios.get('/users');
        console.log(data);
    } catch (error) {
        console.log(error);
    }
}
loadUsers();
</script>

<?= $this->stop() ?>