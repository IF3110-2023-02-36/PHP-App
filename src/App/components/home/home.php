<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global CSS -->
    <link rel="stylesheet" href="../../public/styles/product/product-card.css">
    <link rel="stylesheet" href="../../public/styles/template/navbar.css">
    <title>Home Page</title>
</head>

<body>
    <?php
    $current_page = "home";
    include(dirname(__DIR__) . '/template/navbar.php');
    ?>
    <span class="background">
        <span class="centering">
            <h1>Home Page</h1>
            <h2>List barang mu</h2>
            <section class="articles">
                <?php
                include_once(dirname(__DIR__) . "/template/product-card.php");
                
                foreach($this->data as $product){
                    product_card_template(
                    "https://vnn-imgs-a1.vgcloud.vn/toquoc.mediacdn.vn/280518851207290880/2022/9/25/iphone-15-ultra-7-16640892704142065627851.jpg",
                    $product[2],
                    $product[4],
                    $product[3],
                    "AIPONG");
                }
                // product_card_template(
                //     "https://vnn-imgs-a1.vgcloud.vn/toquoc.mediacdn.vn/280518851207290880/2022/9/25/iphone-15-ultra-7-16640892704142065627851.jpg",
                //     "IPONG 15",
                //     50000000,
                //     "Lorem ipsum, dolor sit amet",
                //     "AIPONG");
                // product_card_template(
                //     "https://imgs2.goodsmileus.com/image/cache/data/productimages/Nendoroids/AnyaForger/05_2206120857436335-1200x1200.jpg",
                //     "Nendo Anya",
                //     700000,
                //     "The telepath who can read people's minds.
                //     From the anime series \"SPY x FAMILY\" comes a Nendoroid of Anya Forger, the mind-reading telepath created by chance in an experiment performed by a certain organization. She comes with four face plates including a standard face, a surprised face, a smug smiling face and a cheerful smiling face. Anya's school uniform from the prestigious Eden Academy has been faithfully captured in Nendoroid size. Enjoy using optional parts like her stuffed toy Mr. Chimera to create all kinds of poses based on your favorite scenes from the series! Be sure to add this adorable palm-sized figure of Anya to your collection!",
                //     "Anya");
                ?>
            </section>
        </span>
    </span>
</body>

</html>