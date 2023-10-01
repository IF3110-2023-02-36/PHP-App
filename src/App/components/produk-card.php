<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../public/styles/product/product-card.css"> -->
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .background{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: start;
            padding: 64px 32px;
        }

        .articles{
            display: flex;
            flex-wrap: wrap;
            margin: 0 auto;
            justify-content: center;
            max-width: 1200px;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 24px;
        }

        .articles article{
            max-width: 320px;
            cursor: pointer;
            position: relative;
            display: block;
            transition: all 0.4s ease-in-out;
            overflow: hidden;
            border-radius: 16px;
        }

        .articles article a{
            display: inline-flex;
            color: #DD946F;
            text-decoration: none;
        }

        .articles article h2{
            margin: 0 0 10px 0;
            font-size: 1.6rem;
            color: #261E5A;
            transition: color 0.3s ease-out;
        }

        .articles article h4{
            margin: 0 0 10px 0;
            font-size: 1.2rem;
            color: #261E5A;
            transition: color 0.3s ease-out;
        }

        .articles article img{
            max-width: 100%;
            transform-origin: center;
            transition: transform 0.4s ease-in-out;
        }

        .articles-preview{
            padding: 24px;
            background: white;
        }

        .articles figure{
            width: 100%;
            height: 200px;
            overflow: hidden;
        }

        .articles figure img{
            height: 100%;
            aspect-ratio: 16/9;
            overflow: hidden;
            object-fit: cover;
        }

        .articles article:hover img {
            transform: scale(1.5);
        }
    </style>
    <title>Document</title>
</head>
<body>
    <span class="background">
        <span class="centering">
            <section class="articles">
                <article>
                    <figure>
                        <img src="https://vnn-imgs-a1.vgcloud.vn/toquoc.mediacdn.vn/280518851207290880/2022/9/25/iphone-15-ultra-7-16640892704142065627851.jpg" alt="">
                    </figure>
                    <div class="article-preview">
                        <h2>IPON 15</h2>
                        <h4>50000000</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis magnam eum iste alias, similique officia consequuntur voluptate libero nostrum est, nesciunt odio officiis tenetur recusandae amet beatae provident nemo hic.</p>
                        <a href="#">Add to cart</a>
                    </div>
                </article>

                <article>
                    <figure>
                        <img src="https://vnn-imgs-a1.vgcloud.vn/toquoc.mediacdn.vn/280518851207290880/2022/9/25/iphone-15-ultra-7-16640892704142065627851.jpg" alt="">
                    </figure>
                    <div class="article-preview">
                        <h2>IPON 15</h2>
                        <h4>50000000</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis magnam eum iste alias, similique officia consequuntur voluptate libero nostrum est, nesciunt odio officiis tenetur recusandae amet beatae provident nemo hic.</p>
                        <a href="#">Add to cart</a>
                    </div>
                </article>
            </section>
        </span>
    </span>
</body>
</html>