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
</div>
