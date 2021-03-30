<div class="products content">
        <div class="product_detail">
            <div class="image">
                <img src="<?= $productData['image'] ?>" alt="#">
            </div>
            <div class="info">
                <h3><?= $productData['title'] ?></h3>
                <p class="price"><?= $productData['price'] ?> руб.</p>
                <a href="/?add=<?= $productData['id'] ?>"><img src="/image/add-to-shopping-cart.png" alt="Добавить в корзину"></a>
                <div class="description"><?= $productData['description'] ?></div>
            </div>
        </div>
</div>

<?php
