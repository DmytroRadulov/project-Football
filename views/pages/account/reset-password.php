<section id="account" style="padding: 64px 0;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Изминение пароля</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="/" method="POST">
                    <input type="hidden" name="type" value="update_password"/>
                    <div class="mb-3 d-flex flex-column">
                        <div class="mb-3 d-flex flex-column">
                            <label for="old_password" class="form-label">Старый пароль</label>
                            <input type="password"
                                   name="old_password"
                                   class="form-control"
                                   id="old_password"
                                   value="<?= $_SESSION['account']['fields']['old_password'] ?? null ?>"
                            >
                            <?= formError($_SESSION['account']['errors']['old_password'] ?? null) ?>
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <label for="password" class="form-label">Новый пароль</label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   id="password"
                                   value="<?= $_SESSION['account']['fields']['password'] ?? null ?>"
                            >
                            <?= formError($_SESSION['account']['errors']['password'] ?? null) ?>
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                                   value="<?= $_SESSION['account']['fields']['password_confirmation'] ?? null ?>">
                            <?= formError($_SESSION['account']['errors']['password_confirmation'] ?? null) ?>
                        </div>
                        <button type="submit" class="btn btn-outline-dark">Обновить</button>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</section>
<?php
unset($_SESSION['account']);
