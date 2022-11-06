<?php
$cart = retrieveProducts();
?>
<section id="checkout" style="padding: 64px 0;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Оформление заказа</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <form action="/" method="POST">
                    <input type="hidden" name="type" value="create_order"/>
                    <div class="mb-3">
                        <label for="address" class="form-label">Адрес</label>
                        <input type="text"
                               name="address"
                               class="form-control"
                               id="address"
                               value="<?= $_SESSION['checkout']['fields']['address'] ?? null ?>"
                        >
                        <?= formError($_SESSION['checkout']['errors']['address'] ?? null) ?>
                    </div>
                    <div class="mb-3">
                        <label for="delivery" class="form-label">Дата доставки</label>
                        <input type="date"
                               name="delivery"
                               class="form-control"
                               min="<?= date('Y-m-d') ?>"
                               id="delivery"
                               value="<?= $_SESSION['checkout']['fields']['delivery'] ?? null ?>"
                        >
                        <?= formError($_SESSION['checkout']['errors']['delivery'] ?? null) ?>
                    </div>
                    <button type="submit" class="btn btn-outline-dark">Создать заказ</button>
                </form>
            </div>
            <div class="col-4">
                <h3>Сумма: <?= $cart['total'] ?>₴</h3>
            </div>
        </div>
    </div>
</section>