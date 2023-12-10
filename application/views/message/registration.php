<div class="row  justify-content-md-center">
    <div class="col col-lg-2 border mt-3">
        <div class="card-header">Вход в панель Администратора</div>
        <div class="card-body">
            <form action="/registration" method="post" id="registrationForm">
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label>Логин</label>
                    <input class="form-control" type="text" name="login" id="login" required>
                </div>
                <div class="form-group">
                    <label>Пароль</label>
                    <input class="form-control" type="password" name="password" id="password" required>
                </div>
                <button type="submit" class="btn  mt-3 btn-primary btn-block">Вход</button>
            </form>
        </div>
    </div>
</div>
