<section id="account" style="padding: 64px 0;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2><?= ucfirst($user['name']) ?>'s Аккаунт</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <a href="<?= DOMAIN . '/account/reset-password' ?>" class="btn btn-outline-danger">Изменить пароль</a>
            </div>
            <div class="col-8">
                <form action="/" method="POST">
                    <input type="hidden" name="type" value="update_account"/>
                    <div class="mb-3 d-flex flex-column">
                        <label for="name" class="form-label">Имя</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               id="name"
                               placeholder="John"
                               value="<?= $_SESSION['account']['fields']['name'] ?? $user['name'] ?>">
                        <?= formError($_SESSION['account']['errors']['name'] ?? null) ?>
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <label for="surname" class="form-label">Фамилия</label>
                        <input type="text" name="surname" class="form-control" id="surname" placeholder="Bishop"
                               value="<?= $_SESSION['account']['fields']['surname'] ?? $user['surname'] ?>">
                        <?= formError($_SESSION['account']['errors']['surname'] ?? null) ?>
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <label for="birthdate" class="form-label">Дата рождения</label>
                        <input type="date" name="birthdate" class="form-control" id="birthdate" max="<?= date("Y-m-d") ?>"
                               value="<?= $_SESSION['account']['fields']['birthdate'] ?? $user['birthdate'] ?>">
                        <?= formError($_SESSION['account']['errors']['birthdate'] ?? null) ?>
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <label for="balance" class="form-label">Баланс</label>
                        <input type="number" name="balance" class="form-control" id="balance" min="0"
                               value="<?= $_SESSION['account']['fields']['balance'] ?? $user['balance'] ?>">
                        <?= formError($_SESSION['account']['errors']['balance'] ?? null) ?>
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
