<h2>Create user</h2>

<form action="/user/store" method="post">
    <div class="container mb-3">

        <div>
            <br>
            <label for="firstName" class="form-label">Nome</label>
            <input type="text" class="form-control" name="firstName" id="">
            <small id="emailHelpId" class="form-text text-muted"><?= getFlash('firstName') ?></small>
            <br>
        </div>

        <div>
            <label for="lastName" class="form-label">Sobrenome</label>
            <input type="text" class="form-control" name="lastName" id="">
            <small id="emailHelpId" class="form-text text-muted"><?= getFlash('lastName') ?></small>
            <br>
        </div>

        <div>
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="">
            <small id="emailHelpId" class="form-text text-muted"><?= getFlash('email') ?></small>
            <br>
        </div>

        <div>

            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" name="password" id="">
            <small id="password" class="form-text text-muted"><?= getFlash('password') ?></small>
            <br>
        </div>
        <div>
            <button class="btn btn-success mt-3" type="submit">Criar</button>
        </div>
    </div>

</form>