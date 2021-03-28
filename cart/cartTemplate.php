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
                    <input type="number" value="<?= $item['count'] ?>" name="<?= $item['id'] ?>" min="0"
                           form="cartChange">
                    <!--                    <p>--><? //= $item['count'] ?><!-- шт. -->
                    <? //= $item['cost'] ?><!-- руб.</p>-->
                    <span> шт.</span>
                    <p><?= $item['cost'] ?> руб.</p>
                </div>
                <a class="del" href="/?cart=&del=<?= $item['id'] ?>" class="delete">Удалить</a>
            </div>
        <? endforeach;
    } ?>
    <div class="bottomLine"></div>
    <form id="cartChange" action="cartChange.php" method="post">
        <input type="submit" name="Submit" value="Пересчитать корзину">
    </form>
</div>
<div class="sendOrder content">
    <form id="bayerData" action="" method="post">
        <label><input type="text" name="bayerName" placeholder="Name" value="Name">Введите ваше имя</label><br/>
        <label><input type="email" name="bayerEmail" placeholder="v_polonik@inbox.ru" value="v_polonik@inbox.ru">Введите email</label><br/>
        <label><input type="text" name="bayerPhone" placeholder="+375 29 123 12 12" value="+375 29 123 12 12">Введите телефон</label><br/>
        <button name="order">Заказать</button>
    </form>
</div>
