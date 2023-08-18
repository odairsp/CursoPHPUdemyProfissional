<?php $this->layout('master', ['title' => $title]) ?>

<h2>Users</h2>

<div>

    <div class="table-responsive">

        <table class="table table-striped
        table-hover	
        table-borderless
        table-primary
        align-middle">
            <thead class="table-light">
                <tr class="table-primary">
                    <th>Nome</th>
                    <th>obs.</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                <?php
            if (isset($users)) :
                foreach ($users as $user) : ?>
                <tr class="table-primary">
                    <td><?= $user->firstName ?></td>
                    <td><a href="/user/<?= $user->id ?>">detalhes</a></td>
                </tr>
                <?php endforeach; ?>
                <?php else : ?>
                <tr class="table-primary">
                    <td><?= $user->firstName ?></td>
                    <td><a href="/user/<?= $user->id ?>">detalhes</a></td>
                </tr>
                <?php endif ?>



            </tbody>
        </table>

    </div>


</div>

<?= $this->start('script') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"
    integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
axios.defaults.headers = {
    "Content-type": "application/json",
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