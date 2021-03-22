<?php

//$errors = curl_errno($ch);
//
//if ($errors) {
//    echo 'Errors (' . $errors . '): ' . curl_error($ch);
//} else {
//    return json_decode($result, true);
//}


?>
<div class="products content">
    <?foreach ($arCatalogData as $item):?>
    <div class="product"><img src=<?=$item['image']?> alt="#">
        <h3><?=$item['title']?></h3>
        <p class="price"><?=$item['price']?> руб.</p>
        <a href="/?add=<?=$item['id']?>">добавить в корзину</a>
    </div>
    <?endforeach;?>
    <div class="product"><img src="https://via.placeholder.com/300" alt="#">
        <h3>Товар 2</h3>
        <p class="price">02 руб.</p>
        <a href="/?add=#idProduct">добавить в корзину</a>
    </div>
    <div class="product"><img src="https://via.placeholder.com/300" alt="#">
        <h3>Товар 3</h3>
        <p class="price">03 руб.</p>
        <a href="/?add=#idProduct">добавить в корзину</a>
    </div>
    <div class="product"><img src="https://via.placeholder.com/300" alt="#">
        <h3>Товар 4</h3>
        <p class="price">04 руб.</p>
        <a href="/?add=#idProduct">добавить в корзину</a>
    </div>
    <div class="product"><img src="https://via.placeholder.com/300" alt="#">
        <h3>Товар 5</h3>
        <p class="price">05 руб.</p>
        <a href="/?add=#idProduct">добавить в корзину</a>
    </div>
    <div class="product"><img src="https://via.placeholder.com/300" alt="#">
        <h3>Товар 6</h3>
        <p class="price">06 руб.</p>
        <a href="/?add=#idProduct">добавить в корзину</a>
    </div>
    <div class="product"><img src="https://via.placeholder.com/300" alt="#">
        <h3>Товар 7</h3>
        <p class="price">07 руб.</p>
        <a href="/?add=#idProduct">добавить в корзину</a>
    </div>
    <div class="product"><img src="https://via.placeholder.com/300" alt="#">
        <h3>Товар 8</h3>
        <p class="price">08 руб.</p>
        <a href="/?add=#idProduct">добавить в корзину</a>
    </div>
    <div class="product"><img src="https://via.placeholder.com/300" alt="#">
        <h3>Товар 9</h3>
        <p class="price">09 руб.</p>
        <a href="/?add=#idProduct">добавить в корзину</a>
    </div>
    <div class="product"><img src="https://via.placeholder.com/300" alt="#">
        <h3>Товар 10</h3>
        <p class="price">10 руб.</p>
        <a href="/?add=#idProduct">добавить в корзину</a>
    </div>
    <div class="product"><img src="https://via.placeholder.com/300" alt="#">
        <h3>Товар 11</h3>
        <p class="price">11 руб.</p>
        <a href="/?add=#idProduct">добавить в корзину</a>
    </div>
    <div class="product"><img src="https://via.placeholder.com/300" alt="#">
        <h3>Товар 12</h3>
        <p class="price">12 руб.</p>
        <a href="/?add=#idProduct">добавить в корзину</a>
    </div>
    <div class="product"><img src="https://via.placeholder.com/300" alt="#">
        <h3>Товар 13</h3>
        <p class="price">13 руб.</p>
        <a href="/?add=#idProduct">добавить в корзину</a>
    </div>
    <div class="product"><img src="https://via.placeholder.com/300" alt="#">
        <h3>Товар 14</h3>
        <p class="price">14 руб.</p>
        <a href="/?add=#idProduct">добавить в корзину</a>
    </div>
    <div class="product"><img src="https://via.placeholder.com/300" alt="#">
        <h3>Товар 15</h3>
        <p class="price">15 руб.</p>
        <a href="/?add=#idProduct">добавить в корзину</a>
    </div>
</div>
