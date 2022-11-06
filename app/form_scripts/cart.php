<?php

function addToCart(array $fields)
{
    $_SESSION['cart'][] = $fields;

    alert('success', "Ваш товар был добавлен в корзину");
    redirect();
}

function removeProductFromCart(array $ids)
{
    $product = $ids['product_position'];

    if (!is_null($ids['addition_position'])) {
        $addition = $ids['addition_position'];
        unset($_SESSION['cart'][$product]['additions'][$addition]);
        unset($_SESSION['cart'][$product]['additions_qnty'][$addition]);
    } else {
        unset($_SESSION['cart'][$product]);
    }

    alert('success', "Ваш товар был удален из корзины");
    redirect('/cart');
}

function retrieveProducts(): array
{
    $cartItems = [];

    if (!empty($_SESSION['cart'])) {
        $productsIds = array_merge(mapProducts($_SESSION['cart']), mapAdditions($_SESSION['cart']));
        $products = dbSelect(Tables::Products, conditions: "id IN (" . implode(', ', $productsIds) . ")");
        $cartItems = prepareProductsToCart($_SESSION['cart'], $products);
        $cartItems['total'] = summarizeTotal($cartItems);
    }
    return $cartItems;
}

function summarizeTotal(array $items): float
{
    $total = 0;

    foreach ($items as $item) {
        if (!empty($item['additions'])) {
            $item['total'] += summarizeTotal($item['additions']);
        }
        $total += $item['total'];
    }
    return $total;
}

function prepareProductsToCart(array $cart, array $dbProducts): array
{
    return array_map(function ($item) use ($dbProducts) {
        $product = getProductFromArray($dbProducts, $item['product_id']);
        $item = array_merge($item, [
            'title' => $product['title'],
            'price' => $product['price'],
            'total' => $product['price'] * $item['quantity']
        ]);

        if (!empty($item['additions'])) {
            $item['additions'] = prepareProductsAdditions($item['additions'], $item['additions_qnty'], $dbProducts);
            unset($item['additions_qnty']);
        }
        return $item;
    }, $cart);
}

function prepareProductsAdditions(array $additionsIds, array $additionsQnty, array $dbProducts): array
{
    $additions = [];
    foreach ($additionsIds as $index => $id) {
        $product = getProductFromArray($dbProducts, $id);
        $additions[$index] = [
            'product_id' => $id,
            'title' => $product['title'],
            'quantity' => $additionsQnty[$index],
            'price' => $product['price'],
            'total' => $product['price'] * $additionsQnty[$index]
        ];
    }
    return $additions;
}

function getProductFromArray(array $dbProducts, int $id): array
{
    $product = [];

    foreach ($dbProducts as $item) {
        if ($item['id'] === $id) {
            return $item;
        }
    }

    return $product;
}

function mapProducts(array $cartProducts): array
{
    $productsIds = array_map(fn($item) => $item['product_id'], $cartProducts);
    return array_unique($productsIds);
}

function mapAdditions(array $cartProducts): array
{
    $ids = array_map(fn($item) => $item['additions'], $cartProducts);
    $filteredIds = array_filter($ids, fn($item) => !is_null($item));
    $productsIds = [];

    foreach ($filteredIds as $idArray) {
        $productsIds = array_merge($productsIds, $idArray);
    }

    return array_unique($productsIds);
}

