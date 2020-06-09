@extends('layout.master')
  @section('content')

    <!-- Main Container -->
    <div class="main-container col1-layout">
      <div class="container">
      
        <div class="row">
          <div class="col-main">
            <div class="product-view-area">
              <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
                <div class="icon-sale-label sale-left">Sale</div>
                <div class="large-image">
                  <a href="products-images/{{$single_product->image}}" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20">
                    <img class="zoom-img" src="products-images/{{$single_product->image}}" alt="products"> </a>
                </div>
              </div>
              <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">

                <div class="product-name">
                  <h1>{{$single_product->name}}</h1>
                </div>
                <div class="price-box">
                  <p class="special-price">
                  <?php if($single_product->promotion_price!=0 && $single_product->promotion_price < $single_product->price): ?>
                    <span class="price-label">Special Price</span>
                    <span class="price"> <?php echo number_format($single_product->promotion_price, 0, ',', ' ')." VND" ;?> </span>
                  </p>
                  <p class="old-price">
                    <span class="price-label">Regular Price:</span>
                    <span class="price"> <?php echo number_format($single_product->price, 0, ',', ' ')." VND"; ?> </span>
                  </p>
                  <?php  elseif($single_product->promotion_price == 0 || $single_product->promotion_price == $single_product->price):  ?>
                </div>
                <p class="special-price">
                    <span class="price-label">Special Price</span>
                    <span class="price"> <?php echo number_format($single_product->price, 0, ',', ' ')." VND" ; ?> </span>
                  </p>
                </div>
                <?php endif; ?>
                <div class="short-description">
                  <h2>Quick Overview</h2>
                     <?php echo  $single_product->detail;?>
                </div>

                <div class="product-variation">
                  <form action="#" method="post">
                    <div class="cart-plus-minus">
                      <label for="qty">Quantity:</label>
                      <div class="numbers-row">
                        <div   class="dec qtybutton">
                          <i class="fa fa-minus">&nbsp;</i>
                        </div>
                        <input type="text" class="qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                        <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;"
                          class="inc qtybutton">
                          <i class="fa fa-plus">&nbsp;</i>
                        </div>
                      </div>
                    </div>
                    <button class="button pro-add-to-cart" title="Add to Cart" type="button">
                      <span>
                        <i class="fa fa-shopping-cart"></i> Add to Cart</span>
                    </button>
                  </form>
                </div>

              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

    <!-- Main Container End -->
    <!-- Related Product Slider -->
    <section class="upsell-product-area">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">

            <div class="page-header">
              <h2>Related Products</h2>
            </div>
            <div class="slider-items-products">
              <div id="upsell-product-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4">
                <?php foreach( $retaled_product as $value): ?>
                  <div class="product-item">
                    <div class="item-inner fadeInUp">
                      <div class="product-thumbnail">
                        <div class="icon-sale-label sale-left">Sale</div>
                        <div class="icon-new-label new-right">New</div>
                        <div class="pr-img-area">
                          <img class="first-img" src="products-images/<?php echo $value[0]->image;?>" alt="">
                          <img class="hover-img" src="products-images/<?php echo $value[0]->image;?>" alt="">
                          <button type="button" class="add-to-cart-mt">
                            <i class="fa fa-shopping-cart"></i>
                            <span> Add to Cart</span>
                          </button>
                        </div>

                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title">
                            <a title="Ipsums Dolors Untra" href="#"><?php echo $value[0]->name; ?> </a>
                          </div>
                          <div class="item-content">

                            <div class="item-price">
                              <div class="price-box">
                                <span class="regular-price">
                                  <span class="price"><?php echo number_format($value[0]->price, 0, ',', ' ')." VND"; ?></span>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="product-item">
                    <div class="item-inner fadeInUp">
                      <div class="product-thumbnail">
                        <div class="pr-img-area">
                          <img class="first-img" src="sources/images/products/img02.jpg" alt="">
                          <img class="hover-img" src="sources/images/products/img02.jpg" alt="">
                          <button type="button" class="add-to-cart-mt">
                            <i class="fa fa-shopping-cart"></i>
                            <span> Add to Cart</span>
                          </button>
                        </div>

                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title">
                            <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a>
                          </div>
                          <div class="item-content">

                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price">
                                  <span class="price-label">Special Price</span>
                                  <span class="price"> $456.00 </span>
                                </p>
                                <p class="old-price">
                                  <span class="price-label">Regular Price:</span>
                                  <span class="price"> $567.00 </span>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="item-inner fadeInUp">
                      <div class="product-thumbnail">
                        <div class="pr-img-area">
                          <img class="first-img" src="sources/images/products/img03.jpg" alt="">
                          <img class="hover-img" src="sources/images/products/img03.jpg" alt="">
                          <button type="button" class="add-to-cart-mt">
                            <i class="fa fa-shopping-cart"></i>
                            <span> Add to Cart</span>
                          </button>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title">
                            <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a>
                          </div>
                          <div class="item-content">

                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price">
                                  <span class="price-label">Special Price</span>
                                  <span class="price"> $456.00 </span>
                                </p>
                                <p class="old-price">
                                  <span class="price-label">Regular Price:</span>
                                  <span class="price"> $567.00 </span>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="item-inner fadeInUp">
                      <div class="icon-sale-label sale-left">Sale</div>
                      <div class="icon-new-label new-right">New</div>
                      <div class="product-thumbnail">
                        <div class="pr-img-area">
                          <img class="first-img" src="sources/images/products/img04.jpg" alt="">
                          <img class="hover-img" src="sources/images/products/img04.jpg" alt="">
                          <button type="button" class="add-to-cart-mt">
                            <i class="fa fa-shopping-cart"></i>
                            <span> Add to Cart</span>
                          </button>
                        </div>

                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title">
                            <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a>
                          </div>
                          <div class="item-content">

                            <div class="item-price">
                              <div class="price-box">
                                <span class="regular-price">
                                  <span class="price">$125.00</span>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="item-inner fadeInUp">
                      <div class="product-thumbnail">
                        <div class="icon-new-label new-left">New</div>
                        <div class="pr-img-area">
                          <img class="first-img" src="sources/images/products/img05.jpg" alt="">
                          <img class="hover-img" src="sources/images/products/img05.jpg" alt="">
                          <button type="button" class="add-to-cart-mt">
                            <i class="fa fa-shopping-cart"></i>
                            <span> Add to Cart</span>
                          </button>
                        </div>

                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title">
                            <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a>
                          </div>
                          <div class="item-content">

                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price">
                                  <span class="price-label">Special Price</span>
                                  <span class="price"> $456.00 </span>
                                </p>
                                <p class="old-price">
                                  <span class="price-label">Regular Price:</span>
                                  <span class="price"> $567.00 </span>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="product-item">
                    <div class="item-inner fadeInUp">
                      <div class="product-thumbnail">
                        <div class="pr-img-area">
                          <img class="first-img" src="sources/images/products/img06.jpg" alt="">
                          <img class="hover-img" src="sources/images/products/img06.jpg" alt="">
                          <button type="button" class="add-to-cart-mt">
                            <i class="fa fa-shopping-cart"></i>
                            <span> Add to Cart</span>
                          </button>
                        </div>

                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title">
                            <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a>
                          </div>
                          <div class="item-content">

                            <div class="item-price">
                              <div class="price-box">
                                <span class="regular-price">
                                  <span class="price">$125.00</span>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> -->
                <?php endforeach; ?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- Related Product Slider End -->
    @endsection