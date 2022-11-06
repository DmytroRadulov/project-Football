<?php
$products = dbSelect(Tables::Products, conditions: 'is_option IS FALSE AND quantity > 0');
$products = array_chunk($products, 3);

?>
<section id="catalog" class="section-gap">
    <div class="container">
        <div class="row title-row section-gap">
            <h1 class="mb-10"><?= $data['catalog']['title'] ?></h1>
            <p><?= $data['catalog']['description'] ?></p>
        </div>

        <?php foreach ($products as $row): ?>
            <div class="row">
                <?php foreach ($row as $key => $item): ?>
                    <div class="col-4 catalog-item"
                         data-bs-toggle="modal"
                         data-bs-target="#productBuy"
                         data-id = "<?= $item['id']?>"
                         data-qnty = "<?= $item['quantity']?>"
                         data-name = "<?= $item['title']?>"
                         data-price = "<?= $item['price']?>"
                    >
                        <div class="single-menu">
                            <div class="title-div justify-content-between d-flex">
                                <h4><?= $item['title'] ?></h4>
                                <p class="price float-right"><?= $item['price'] ?>$</p>
                            </div>
                            <?php if (!empty($item['description'])) : ?>
                               <p><?= $item['description'] ?></p>
                            <?php endif; ?>
                            <p><img src="<?= IMAGES_PRODUCTS . '/'. $item['image'] ?>"></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>