<?php
function product_card_template($imgsrc, $name, $price, $text, $alttext) {
    $html = <<<"EOT"
    <article>
        <figure>
            <img src="$imgsrc" alt="$alttext">
        </figure>
        <div class="article-preview">
            <h2>$name</h2>
            <h4>$price</h4>
            <p>$text</p>
            <a href="#">Add to cart</a>
        </div>
    </article>
EOT;

    echo $html;
}