<?php $cart = retrieveProducts(); ?>
<section id="cart" style="padding: 64px 0;">
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="table-responsive">
                    <h2>Товар</h2>
                    <hr>
                    <?php if (empty($cart)): ?>
                        <p>Товара нет в корзине</p>
                    <?php else: ?>
                        <table class="table">
                            <thead>
                            <tr class="table-dark">
                                <th>#</th>
                                <th>Название</th>
                                <th>Цена</th>
                                <th>Количество</th>
                                <th>Сумма</th>
                                <th>Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($cart as $key => $product): ?>
                                <?php if (is_array($product)): ?>
                                    <tr class="table-danger">
                                        <td><?= ($key + 1) ?></td>
                                        <td><?= $product['title'] ?></td>
                                        <td><?= $product['price'] ?><span>₴</span></td>
                                        <td><?= $product['quantity'] ?></td>
                                        <td><?= $product['total'] ?><span>₴</span></td>
                                        <td>
                                            <form action="/" method="POST">
                                                <input type="hidden" name="type" value="remove_product_from_cart">
                                                <input type="hidden" name="product_position" value="<?= $key ?>"/>
                                                <button type="submit" class="btn btn-outline-danger"><i
                                                            class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                    if (!empty($product['additions'])) {
                                        include PARTS_DIR . '/cart/additions.php';
                                    }
                                    ?>
                                <?php else: ?>
                                    <tr class="table-warning">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Сумма:</td>
                                        <td><?= $product ?><span>₴</span></td>
                                        <td></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a href="<?= DOMAIN . '/checkout' ?>" class="btn btn-outline-dark">Перейти к оформлению
                            заказа</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</section>