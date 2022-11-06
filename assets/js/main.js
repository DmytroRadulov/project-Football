const selectors = {
    catalog: {
        item: '#catalog .catalog-item'
    },
    productInfo: {
        title: '#buy-form .product-name',
        price: '#buy-form .product-price .price',
        total: '#buy-form .product-total .total',
    },
    buyForm: '#buy-form',
    formElements: {
        quantity: '.quantity-field',
        product: '[name="product_id"]'
    },
    finalPrice: '#buy-form .final-price',
    additions: {
        check: '#buy-form .additions-check',
        quantity: '.additions-qnty',
        total: '.additions-total',
        totalWrapper: '.additions-total-wrapper'
    }
};

$(document).ready(function() {
    const $alert = $('.alert.notification');

    if (typeof $alert !== 'undefined') {
        setTimeout(
            () => $alert.remove(),
            3000
        )
    }
});

$(document).on('click', selectors.catalog.item, function() {
    let productData = $(this).data();
    let $form = $(selectors.buyForm);
    let $qntyField = $form.find(selectors.formElements.quantity);
    $qntyField.val(1)

    $qntyField.attr('max', productData.qnty);

    $(selectors.productInfo.title).text(productData.name);
    $(selectors.productInfo.price).text(productData.price);
    $(selectors.productInfo.total).text(productData.price * 1);

    $form.find(selectors.formElements.product).val(productData.id);
    calculateFinalPrice();
});

$(document).on('change', `${selectors.buyForm} ${selectors.formElements.quantity}`, function() {
    let qnty = $(this).val();
    let price = parseFloat($(selectors.productInfo.price).text());

    $(selectors.productInfo.total).text(price * qnty);
    calculateFinalPrice();
});

$(document).on('change', selectors.additions.check, function() {
    let $quantityField = $(this).parent().find(selectors.additions.quantity);

    if ($(this).is(':checked')) {
        $quantityField.prop('disabled', false).val(1);
    } else {
        $quantityField.prop('disabled', true).val(0);
    }

    $(this).parent().find(selectors.additions.totalWrapper).toggleClass('invisible');
    $(`#buy-form ${selectors.additions.quantity}`).trigger('change');
})

$(document).on('change', `#buy-form ${selectors.additions.quantity}`, function() {
    let $parent = $(this).parent();
    let $totalEl = $parent.find(selectors.additions.total);
    let quantity = parseInt($(this).val());
    let singlePrice = parseFloat($parent.find('.price').text());

    $totalEl.text(singlePrice * quantity);
    calculateFinalPrice();
});

function calculateFinalPrice()
{
    let productTotal = parseFloat($(selectors.productInfo.total).text());
    let additions = $(`${selectors.additions.check}:checked`);

    if (additions.length > 0) {
        for (let i = 0; i < additions.length; i++) {
            let $total = $(additions[i]).parent().find(selectors.additions.total);

            if (typeof $total !== 'undefined') {
                let price = parseFloat($total.text());
                productTotal += price;
            }
        }
    }

    $(selectors.finalPrice).text(productTotal);
}
