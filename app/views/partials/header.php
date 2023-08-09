<ul id="menu-list">
    <li><a href="/">Home</a></li>
    <li><a href="/login">Login</a></li>
    <li><a href="/user/create">Create</a></li>
</ul>
<div id="status-login">
    <p>Bem vindo, <?= logged() ? ucfirst(userLogged()->nome) . "! | <a href=\"/logout\">logout</a>" : 'visitante!'; ?>
    </p>
</div>