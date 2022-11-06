<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 d-flex align-items-center justify-content-center">
                <div class="card mt-5 mb-5 w-50" >
                    <div class="card-body">
                        <h5 class="card-title text-center text-uppercase">Login</h5>
                        <hr>
                        <form action="/" method="POST">
                            <input type="hidden" name="type" value="login" />
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       id="email"
                                       aria-describedby="emailHelp"
                                       value="<?= $_SESSION['login']['fields']['email'] ?? null ?>"
                                >
                                <?= formError($_SESSION['login']['errors']['email'] ?? null) ?>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password"
                                       name="password"
                                       class="form-control"
                                       id="password">
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">Войти</button>
                            ИЛИ
                            <a href="<?= DOMAIN ?>/register" class="link-info">Создайте учетную запись</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>