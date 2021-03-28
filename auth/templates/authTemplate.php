<div class="content">
    <form method="post">
        <fieldset>
            <legend>Форма входа</legend>
            <label>Введите логин<input type="text" name="login" placeholder="Login"></label>
            <label>Введите пароль<input type="password" name="password" placeholder="Password"></label>
            <input type="submit" name="doLogin" value="Войти">
        </fieldset>
    </form>
    <form method="post" name="authorisation">
        <fieldset>
            <legend>Форма регистрации</legend>
            <label>Введите Ваше имя<input type="text" name="name" placeholder="Name"></label>
            <label>Введите логин<input type="text" name="login" placeholder="Login"></label>
            <label>Введите пароль<input type="password" name="password" placeholder="Password"></label>
            <input type="submit" name="authorisation" value="Зарегистрироваться">
        </fieldset>
    </form>
</div>
<?php
