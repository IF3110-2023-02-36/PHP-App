<?php
function product_card_template($imgsrc, $name, $price, $text, $productId, $isManage = False) {
    $href = "";
    $redirectText = "";
    if($isManage) {
        $href = "href='/EditProduct/$productId'";
        $redirectText = "Edit product";
    }else {
        $href = "href='/product/$productId'";
        $redirectText = "Add to cart";
    }

    $html = <<<"EOT"
    <article>
        <a $href>
            <figure>
                <img src="$imgsrc" alt="$name">
            </figure>
            <div class="article-preview">
                <h2>$name</h2>
                <h4>$price</h4>
                <p>$text</p>
                <h1>$redirectText</h1>
            </div>
        </a>
    </article>
EOT;

    echo $html;
}