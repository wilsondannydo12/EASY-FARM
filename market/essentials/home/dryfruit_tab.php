<div class="tab-pane" id="dryfruits" role="tabpanel" aria-labelledby="dryfruits-tab">
	<!--Product Grid-->
    <div class="grid-view-items">
        <div class="grid-products pro-hover3 row col-row row-cols-lg-4 row-cols-md-3 row-cols-sm-3 row-cols-2">
            <?php 
            $dryFruit_qry = $db->prepare("SELECT product_tbl.*, shop.shop_name, product_type.pro_type, users.firstname, users.lastname FROM product_tbl INNER JOIN shop ON shop.id=product_tbl.shop INNER JOIN product_type ON product_type.id=product_tbl.product_type INNER JOIN users ON users.id=product_tbl.vendor WHERE shop.shop_name='Dryfruits'");
            $dryFruit_qry->execute();
            $dryFruit_dry_fruit_datas=$dryFruit_qry->fetchAll(PDO::FETCH_OBJ);
            foreach($dryFruit_dry_fruit_datas as $dry_fruit_data){
            ?>
        	<div class="item col-item">
                <div class="product-box">
                    <!-- Start Product Image -->
                    <div class="product-image">
                        <!-- Start Product Image -->
                        <a href="<?php echo(BASE_LINK); ?>/shop/product-view/<?php echo htmlentities($dry_fruit_data->id);?>/<?php echo htmlentities($dry_fruit_data->product_name);?>" class="product-img rounded-4">
                            <!-- Image -->
                            <img class="primary rounded-4 blur-up lazyload" data-src="<?php echo(BACK_BASE_LINK); ?>/<?php echo($dry_fruit_data->image); ?>" src="<?php echo(BACK_BASE_LINK); ?>/<?php echo($dry_fruit_data->image); ?>" alt="<?php echo($dry_fruit_data->product_name); ?>" title="<?php echo($dry_fruit_data->product_name); ?>" width="400" height="400" />
                            <!-- End Image -->
                            <!-- Hover Image -->
                            <img class="hover rounded-4 blur-up lazyload" data-src="<?php echo(BACK_BASE_LINK); ?>/<?php echo($dry_fruit_data->image); ?>" src="<?php echo(BACK_BASE_LINK); ?>/<?php echo($dry_fruit_data->image); ?>" alt="<?php echo($dry_fruit_data->product_name); ?>" title="<?php echo($dry_fruit_data->product_name); ?>" width="400" height="400" />
                            <!-- End Hover Image -->
                        </a>
                        <!-- End Product Image -->    
                        <!-- Product label -->
                        <div class="product-labels round-pill"><span class="lbl on-sale"><?php echo($dry_fruit_data->pro_type); ?></span></div>
                        <!-- End Product label -->
                        <!--Countdown Timer-->
                        <!-- <div class="saleTime horizonal dark" data-countdown="2025/01/01"></div> -->
                        <!--End Countdown Timer-->                                                       
                    </div>
                    <!-- End Product Image -->
                    <!-- Start Product Details -->
                    <div class="product-details text-left">
                        <!--Product Vendor-->
                        <div class="product-vendor"><?php echo($dry_fruit_data->shop_name); ?></div>
                        <!--End Product Vendor-->
                        <div class="product-name-price">
                            <!-- Product Name -->
                            <div class="product-name">
                                <a href="<?php echo(BASE_LINK); ?>/shop/product-view/<?php echo htmlentities($dry_fruit_data->id);?>/<?php echo htmlentities($dry_fruit_data->product_name);?>"><?php echo($dry_fruit_data->product_name); ?></a>
                            </div>
                            <!-- End Product Name -->
                            <!-- Product Price -->
                            <div class="product-price m-0">
                                <span class="price old-price">GH&#8373;<?php echo(number_format($dry_fruit_data->old_price,2)); ?></span><span class="price">GH&#8373;<?php echo(number_format($dry_fruit_data->new_price,2)); ?></span>
                            </div>
                            <!-- End Product Price -->
                        </div>
                        <!-- Product Review -->
                        <div class="product-review">
                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i>
                            <span class="caption hidden ms-1">3 Reviews</span>
                        </div>
                        <!-- End Product Review -->
                        <!--Product Button-->
                        <div class="button-bottom-action style1"> 
                            <div class="button-left">
                                <!--Cart Button-->
                                <a href="#quickshop_modal" class="btn btn-primary btn-md rounded-pill addtocart quick-shop-modal" onclick="quickShopProduct('<?php echo($dry_fruit_data->id); ?>');" data-bs-toggle="modal" data-bs-target="#quickshop_modal">
                                    <span class="text">Quick Shop</span>
                                </a>
                                <!--End Cart Button-->
                            </div>
                            <div class="button-right">
                                <!--Quick View Button-->
                                <a href="#quickview-modal" class="btn-icon quickview quick-view-modal" data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                    <span class="icon-wrap d-flex-justify-center h-100 w-100" data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View"><i class="icon anm anm-search-plus-l"></i></span>
                                </a>
                                <!--End Quick View Button-->
                                <!--Wishlist Button-->
                                <a href="wishlist-style2.html" class="btn-icon wishlist" data-bs-toggle="tooltip" data-bs-placement="top" title="Add To Wishlist"><i class="icon anm anm-heart-l"></i></a>
                                <!--End Wishlist Button-->
                                <!--Compare Button-->
                                <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Compare"><i class="icon anm anm-random-r"></i></a>
                                <!--End Compare Button-->
                            </div>
                        </div>
                        <!--End Product Button-->
                    </div>
                    <!-- End product details -->
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>