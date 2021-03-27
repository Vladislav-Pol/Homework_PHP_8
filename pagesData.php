<?php
$arPages = [
    "home" => [
        "name" => "Home",
        "link" => "/"
    ],
    "about" => [
        "name" => "About",
        "link" => "#",
        "content" => ""
    ],
    "blog" => [
        "name" => "Blog",
        "link" => "#",
        "content" => [
            "post1" => [
                "name" => "Made With Love In Toronto",
                "type" => "News",
                "content" => ""
            ],
            "post2" => [
                "name" => "Startup News & Emerging Tech",
                "type" => "Photo",
                "content" => "Тут должна быть статья 2"
            ],
            "post3" => [
                "name" => "Bitcoin Will Soon Rule The World",
                "type" => "News",
                "content" => ""
            ],
            "post4" => [
                "name" => "Wearable Technology On The Rise",
                "type" => "News",
                "content" => ""
            ],
            "post5" => [
                "name" => "Learn Web Design In 30 Days!",
                "type" => "Media",
                "content" => ""
            ]
        ]
    ],
    "portfolio" => [
        "name" => "Portfolio",
        "link" => "#"
    ],
    "contact" => [
        "name" => "Contact",
        "link" => "#"
    ]
];


$arPages["portfolio"]["content"] = '
    <div class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad aliquam aspernatur distinctio ducimus ea earum eos fugit laudantium libero molestiae nemo numquam obcaecati pariatur perspiciatis possimus, quae rerum similique totam unde veritatis voluptate voluptatum. Ad architecto consequatur corporis deserunt dolores dolorum ea eius excepturi facere fugiat fugit incidunt ipsum, itaque laboriosam maxime minima nisi nobis non numquam omnis optio placeat provident, quidem quisquam quo rem veniam vero voluptas voluptate voluptatibus? Amet autem deleniti ducimus eius hic ipsam iusto laudantium molestiae omnis possimus quae qui, veniam voluptatem. Ab commodi inventore iste libero minus sunt voluptas! Ab aliquam, animi aperiam illum iure laboriosam laborum, magnam minus obcaecati placeat praesentium quasi repellendus tempora tempore, tenetur! Ad assumenda aut delectus esse eum facere impedit inventore ratione! Amet officia quos, reprehenderit tempora vero voluptatum? Aperiam excepturi laboriosam minima possimus quas quibusdam suscipit. Accusantium ad aliquam blanditiis consequatur culpa, cupiditate deleniti deserunt dicta dolorum ducimus eos error est fugiat in ipsa labore nemo nisi optio quaerat quis quisquam ratione similique sunt tenetur, totam ullam veniam? Aliquid amet atque corporis doloremque facilis id, illo non! Accusamus animi beatae consectetur dignissimos enim ipsa iste itaque, laborum, nemo nihil nulla officia quaerat quos, reprehenderit repudiandae sit totam vitae.</div>
';

$arPages["contact"]["content"] = '
    <form method="post" class="content contactsForm">
        <label for="name">Введите Ваше имя</label>
        <input type="text" name="name">
        <label for="phone">Введите номер телефона</label>
        <input type="tel" name="phone">
        <label for="email">Введите адрес электронной почты</label>
        <input type="email" name="email">
        <label for="message">Напишите нам</label>
        <textarea name="message" rows="4"></textarea>
        <button name="sendMessage">Отправить сообщение</button>
    </form>
';

$arPages["contact"]["content_success"] = '
    <div class="content">
    Ваше сообщение отправлено! Благодарим за обращение
    </div>
';
