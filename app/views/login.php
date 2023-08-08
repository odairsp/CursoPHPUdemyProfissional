<h2>Login</h2>

<form action="/login" method="post">
    <div class="container mb-3">
    
    <?= getFlash('message')?>    
    
    <div>
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" value="odair@email.com">
            <!-- <small id="emailHelpId" class="form-text text-muted">Help text</small> -->

        </div>
        <div>

            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" name="password" id="" aria-describedby="password" value="123">
            <!-- <small id="password" class="form-text text-muted">Help text</small> -->
        </div>
        <div>
            <button class="btn btn-success mt-3" type="submit">Login</button>
        </div>
    </div>

</form>