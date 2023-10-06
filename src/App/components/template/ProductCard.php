<?php
function product_card_template($imgsrc, $name, $price, $text, $productId, $isManage = False) {
    $hrefPart = "";
    if($isManage) {
        $hrefPart = "<a href='/EditProduct/$productId'>Edit product</a>";
    }else {
        $hrefPart = "<a href='/product/$productId'>Add to cart</a>";
    }

    $html = <<<"EOT"
    <article>
        <figure>
            <img src="$imgsrc" alt="$name">
        </figure>
        <div class="article-preview">
            <h2>$name</h2>
            <h4>$price</h4>
            <p>$text</p>
            $hrefPart
        </div>
    </article>
EOT;

    echo $html;
}