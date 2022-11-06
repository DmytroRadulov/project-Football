<?php foreach ($product['additions'] as $index => $addition): ?>
    <tr class="table-secondary">
        <td></td>
        <td><?= $addition['title'] ?></td>
        <td><?= $addition['price'] ?><span>₴</span></td>
        <td><?= $addition['quantity'] ?></td>
        <td><?= $addition['total'] ?><span>₴</span></td>
        <td>
            <form action="/" method="POST">
                <input type="hidden" name="type" value="remove_product_from_cart">
                <input type="hidden" name="product_position" value="<?= $key ?>" />
                <input type="hidden" name="addition_position" value="<?= $index ?>" />
                <button type="submit" class="btn btn-outline-success"><i class="fa-solid fa-trash-can"></i></button>
            </form>
        </td>
    </tr>
<?php endforeach; ?>