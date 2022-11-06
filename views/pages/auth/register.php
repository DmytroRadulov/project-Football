<section id="register">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 d-flex align-items-center justify-content-center">
                <div class="card mt-5 mb-5 w-50">
                    <div class="card-body">
                        <h5 class="card-title text-center text-uppercase">Создать аккаунт</h5>
                        <hr>
                        <form action="/" method="POST">
                            <input type="hidden" name="type" value="register"/>
                            <div class="md-3 d-flex flex-column">
                                <label for="email" class="form-label">Email адрес</label>
                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       id="email"
                                       aria-describedby="emailHelp"
                                       placeholder="CRonaldo@gmail.com"
                                       value="<?= $_SESSION['register']['fields']['email'] ?? null ?>"
                                >
                                <?= formError($_SESSION['register']['errors']['email'] ?? null) ?>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label for="password" class="form-label">Пароль</label>
                                <input type="password"
                                       name="password"
                                       class="form-control" id="password"
                                       placeholder="********"
                                       value="<?= $_SESSION['register']['fields']['password'] ?? null ?>"
                                >
                                <?= formError($_SESSION['register']['errors']['password'] ?? null) ?>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label for="password_confirmation" class="form-label">Повторите пароль</label>
                                <input type="password"
                                       name="password_confirmation"
                                       class="form-control"
                                       id="password_confirmation"
                                       placeholder="********"
                                       value="<?= $_SESSION['register']['fields']['password_confirmation'] ?? null ?>"
                                >
                                <?= formError($_SESSION['register']['errors']['password_confirmation'] ?? null) ?>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label for="name" class="form-label">Имя</label>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       id="name"
                                       placeholder="Cristiano"
                                       value="<?= $_SESSION['register']['fields']['name'] ?? null ?>"
                                >
                                <?= formError($_SESSION['register']['errors']['name'] ?? null) ?>
                            </div>

                            <div class="mb-3 d-flex flex-column">
                                <label for="surname" class="form-label">Фамилия</label>
                                <input type="text"
                                       name="surname"
                                       class="form-control"
                                       id="surname"
                                       placeholder="Ronaldo"
                                       value="<?= $_SESSION['register']['fields']['surname'] ?? null ?>"
                                >
                                <?= formError($_SESSION['register']['errors']['surname'] ?? null) ?>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label for="birthdate" class="form-label">Дата рождения</label>
                                <input type="date"
                                       name="birthdate"
                                       class="form-control"
                                       id="birthdate"
                                       max="<?= date("Y-m-d") ?>"
                                       value="<?= $_SESSION['register']['fields']['birthdate'] ?? null ?>"
                                >
                                <?= formError($_SESSION['register']['errors']['birthdate'] ?? null) ?>
                            </div>


                            <hr>
                            <button type="submit" class="btn btn-primary">Создайте учетную запись</button>
                            ИЛИ
                            <a href="<?= DOMAIN ?>/login" class="link-info">Войти</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

