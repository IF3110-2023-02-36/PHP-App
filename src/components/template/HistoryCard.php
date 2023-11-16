<?php
function history_card_template($courierName, $price, $rating, $historyId) {
    $href = "href='/historyDetail/$historyId'";
    $redirectText = "History Detail";
    $ratingText = ($rating === 0) ? "belum memberi rating" : "rating $rating";

    $html = <<<"EOT"
    <article>
        <a $href>
            <div class="article-preview">
                <h2>$courierName</h2>
                <h4>$price</h4>
                <p>$ratingText</p>
                <h1>$redirectText</h1>
            </div>
        </a>
    </article>
EOT;

    echo $html;
}