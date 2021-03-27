<div class="products content">
    <? foreach ($arCatalogData as $item): ?>
        <div class="product">
            <div class="image">
                <a href="/catalog/<?= str_replace(' ', '_',$item['title']) . "_" . $item['id'] ?>">
                    <img src="<?= $item['image'] ?>" alt="#">
                </a>
            </div>
            <div class="info">
                <a href="<?=$item['linkDetail']?>">
                    <h3><?= $item['title'] ?></h3>
                </a>
                <p class="price"><?= $item['price'] ?> руб.</p>
                <a href="/?add=<?= $item['id'] ?>"><img src="/image/add-to-shopping-cart.png" alt="Добавить в корзину"></a>
            </div>
        </div>
    <? endforeach; ?>
</div>

<?php
