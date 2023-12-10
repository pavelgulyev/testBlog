<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Вход в панель Администратора</div>
        <div class="card-body">
            <form action="/login" method="post" id="registrationForm" required>
                <div class="form-group">
                    <label>Логин</label>
                    <input class="form-control" type="text" name="login" id="login" required>
                </div>
                <div class="form-group">
                    <label>Пароль</label>
                    <input class="form-control" type="password" name="password" id="registrationForm" required>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-block">Вход</button>
                    <a href="/registration" class="link-underline-secondary link-offset-1">Регистрация</a>
                </div>

            </form>
        </div>
    </div>
</div>
<script>
    const registrationForm = document.getElementById('registrationForm');
    registrationForm.addEventListener('submit', function(event) {
        // Получаем значения полей
        const login = document.getElementById('login').value;
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        if (!isValidEmail(login)) {
            alert('Введите корректный email');
            event.preventDefault();
            return;
        }
        if (!isValidPassword(password)) {
            alert('Пароль должен содержать буквы A-Z и минимум 1 цифру');
            event.preventDefault();
            return;
        }

        if (password !== confirmPassword) {
            alert('Пароли не совпадают');
            event.preventDefault();
            return;
        }
    });

    // Вспомогательная функция для проверки валидности email
    function isValidEmail(email) {
        // Регулярное выражение для проверки email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Вспомогательная функция для проверки валидности пароля
    function isValidPassword(password) {
        // Регулярное выражение для проверки пароля (буквы A-Z и минимум 1 цифра)
        const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/;
        return passwordRegex.test(password);
    }
</script>