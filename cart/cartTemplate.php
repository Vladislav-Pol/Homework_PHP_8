<div class="products content">
    <div class="topLine"></div>
    <? if (!is_array($fullCartData))
        echo "<p>Корзина пуста</p>";
    else {
        foreach ($fullCartData as $item): ?>
            <div class="cart_product">
                <div class="image">
                    <img src="<?= $item['image'] ?>" alt="#">
                </div>
                <h3><?= $item['title'] ?></h3>
                <div class="count">
                    <input type="number" value="<?= $item['count'] ?>" name="<?= $item['id'] ?>" min="0" form="cartChange">
<!--                    <p>--><?//= $item['count'] ?><!-- шт. --><?//= $item['cost'] ?><!-- руб.</p>-->
                    <span> шт.</span>
                    <p><?= $item['cost'] ?> руб.</p>
                </div>
                <a class="del" href="/?cart=&del=<?= $item['id'] ?>"class="delete">Удалить</a>
            </div>
        <? endforeach;
    } ?>
    <div class="bottomLine"></div>
    <form id="cartChange" action="cartChange.php" method="post">
        <input type="submit" name="Submit" value="Пересчитать корзину" >
    </form>
</div>

