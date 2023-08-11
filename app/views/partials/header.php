<ul id="menu-list">
    <li><a href="/">Home</a></li>
    <?php if (!logged()) : ?>
        <li><a href="/login">Login</a></li>
        <li><a href="/user/create">Create</a></li>
    <?php endif ?>
</ul>
<div id="status-login">
    <p>Bem vindo,
        <?= logged() ? ucfirst(userLogged()->firstName) . "! | <a href=\"/logout\">logout</a>" : 'visitante!'; ?>
    </p>
</div>