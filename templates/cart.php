<?php
?>
<div class="products content">
    <? if (!is_array($fullCartData))
        echo "<p>Корзина пуста</p>";
    else {
        foreach ($fullCartData as $item): ?>
            <div class="product"><img src=<?= $item['image'] ?> alt="#">
                <h3><?= $item['title'] ?></h3>
                <p><?= $item['count'] ?> шт. <?= $item['cost'] ?> руб.<a href="/?cart=&del=<?= $item['id'] ?>"
                                                                         class="delete">Удалить</a></p>
            </div>
        <? endforeach;
    } ?>
</div>



