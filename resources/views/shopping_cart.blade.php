@extends('layout.master')
  @section('content')
  <?php
  //  print_r($single_product);
   // print_r(Cart::content());
  ?>
  <!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          
          <div class="page-content page-order"><div class="page-title">
            <h2>Shopping Cart</h2>
          </div>
            @if(Cart::count() == 0)
              <div class="row">
                <div class="col-md-12">
                    <h1 style="text-align: center;">Giỏ hàng của bạn chưa có sản phẩm, quay lại để <a href="{{route('home')}}">  tiếp tục mua hàng</a>.</h1>
                </div>
              </div>
            @else
              @if (session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
              @endif
              <div class="order-detail-content">
                <div class="table-responsive">
                  <table class="table table-bordered cart_summary">
                    <thead>
                      <tr>
                        <th class="cart_product">Product</th>
                        <th>Description</th>
                        <th>Unit price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th  class="action"><i class="fa fa-trash-o"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach(Cart::content() as $value)
                      <form action="{{route('updateCart')}}" method="POST">
                        <tr>
                          <input type="hidden" name="txtRowID" value="{{$value->rowId}}"/>
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          <td class="cart_product"><a href="#"><img src="products-images/{{$value->options->image}}" alt="Product"></a></td>
                          <td class="cart_description"><p class="product-name"><a href="#">{{$value->name}} </a></p>
                            <small><a href="#">Color : Green</a></small><br>
                            <small><a href="#">Size : XL</a></small></td>
                        
                          <td class="price"><span>{{$value->price}}</span></td>
                          <td class="qty">
                            <input class="form-control input-sm" name="txtSoLuong" type="text" value="{{$value->qty}}">
                            <input type="submit" value="Cập nhật" class="btn btn-sbtn btn-outline-success btn-sm"/>
                          </td>
                          <td class="price"><span>{{number_format($value->qty*$value->price)}} vnd</span></td>
                          <td class="action"><a href="{{route('deleteCart',['id' => $value->rowId])}}"><i class="icon-close"></i></a></td>
                        </tr>
                      </form>
                      @endforeach
                  </table>
                </div>
                <div class="cart_navigation"> <a class="continue-btn" href="#"><i class="fa fa-arrow-left"> </i>&nbsp; Continue shopping</a> <a class="checkout-btn" href="#"><i class="fa fa-check"></i> Proceed to checkout</a> </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection