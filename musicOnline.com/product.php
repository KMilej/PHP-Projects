<?php
# Script basic.Connect.php

$pageTitle = 'Main';

include('header.php');

// require('mysqlConnectSample.php');  //mysqlConnect22

?>

<section class="advert">
<div class="advertising">
    <div class="slideshow">
        <img src="images/slide/slidepage1.jpg" class="slide" alt="Ad 1">
        <img src="images/slide/slidepage2.jpg" class="slide" alt="Ad 2">
        <img src="images/slide/slidepage3.jpg" class="slide" alt="Ad 3">
    </div>
</div>


<main>
    <div class="products">
        <div class="section-title">home page</div>
        <?php $products = getHomePageProducts(30) ?>
       
            <div class="product">
                 <?php
                foreach($products as $product) {
                    ?> 
                        <div class="productimg">
                            <img src="<?php echo "images/products/{$product['image']}" ?>" alt="">
                            <div class="productinfo">
                            <p class="title">
                                <a href="pages.php?id=<?php echo $product['id'] ?>">
                                 <?php echo htmlspecialchars($product['title']); ?>
                                </a>
                            </p>
                            <p class="description">
                                <?php echo $product['description'] ?>
                            </p>
                            <p class="price">
                                <?php echo $product['price'] ?>
                            </p>
                        
                        </div>
                        </div>

                        
                     <?php
                }
                    ?>
<!--                 
                    <div class="productimg">
                        <img src="images/products/vinyl1.jpg" alt="">
                    </div>
                    <div class="prductinfo">
                        <p class="title">
                            <a href="">coding is fun</a>
                        </p>
                        <p class="description">
                            cos tam dobrego do sluchania
                        </p>
                        <p class="price">29.99 &euro;</p>
                    </div> -->

                 
            </div>
            
    </div>   

</main>

<?php
include('footer.php');
?>
