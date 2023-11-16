<?php
function pesanan_card_template($namaPesanan, $harga, $status, $idPesanan) {
    $href = "href='/trackDetail/$idPesanan'";
    $redirectText = "Detail Pesanan";

    $html = <<<"EOT"
    <article>
        <a $href>
            <div class="article-preview">
                <h2>$namaPesanan</h2>
                <h4>$harga</h4>
                <p>$status</p>
                <h1>$redirectText</h1>
            </div>
        </a>
    </article>
EOT;

    echo $html;
}