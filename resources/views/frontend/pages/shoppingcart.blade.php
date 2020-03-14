@extends('frontend/layouts/default')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>cart</title>
    </head>
    <body>
    
@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.php">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                      
                       
                         @foreach(CartProvider::instance()->getCartItems() as $item)

                            <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}}</td>
                            <td>
                                    <div class="product_count">
                                        <form action="{{URL::to('')}}/update-cartqty" method="get" class="form-group">
                                            <input type="hidden" name="rowId" value="{{ $item->rowId}}">
                                            <input type="number" name="qty" value="{{ $item->getQuantity()}}">
                                            <button type="submit" class="btn btn-success btn-sm">
                                            Update
                                            </button>
                                        </form>
                                    </div>
                            </td>
                            <td>{{$item->total}}</td>
                            </tr>
                            @endforeach
                         
                            <tr class="bottom_button">
                                <td>
                                    <a class="gray_btn" href="{{URL::to('')}}/remove_cart">Remove Cart</a>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                         <tr>
                             <td>

                             </td>
                             <td>

                             </td>
                             <td>
                                 <h5>Subtotal</h5>
                             </td>
                             <td>
                                 <h5>{{$sub}}</h5>
                             </td>
                         </tr>
                         <tr class="shipping_area">
                             <td>

                             </td>
                             <td>

                             </td>
                             <td>
                                 <h5>Shipping</h5>
                             </td>
                             <td>
                                 <div class="shipping_box">
                                     <ul class="list">
                                         <li><a href="#">Flat Rate: $5.00</a></li>
                                         <li><a href="#">Free Shipping</a></li>
                                         <li><a href="#">Flat Rate: $10.00</a></li>
                                         <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                     </ul>
                                     <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                     <select class="shipping_select" style="display: none;">
                                         <option value="1">Bangladesh</option>
                                         <option value="2">India</option>
                                         <option value="4">Pakistan</option>
                                     </select><div class="nice-select shipping_select" tabindex="0"><span class="current">Bangladesh</span><ul class="list"><li data-value="1" class="option selected">Bangladesh</li><li data-value="2" class="option">India</li><li data-value="4" class="option">Pakistan</li></ul></div>
                                     <select class="shipping_select" style="display: none;">
                                         <option value="1">Select a State</option>
                                         <option value="2">Select a State</option>
                                         <option value="4">Select a State</option>
                                     </select><div class="nice-select shipping_select" tabindex="0"><span class="current">Select a State</span><ul class="list"><li data-value="1" class="option selected">Select a State</li><li data-value="2" class="option">Select a State</li><li data-value="4" class="option">Select a State</li></ul></div>
                                     <input type="text" placeholder="Postcode/Zipcode">
                                     <a class="gray_btn" href="#">Update Details</a>
                                 </div>
                             </td>
                         </tr>
                         <tr class="out_button_area">
                             <td>

                             </td>
                             <td>

                             </td>
                             <td>

                             </td>
                             <td>
                                 <div class="checkout_btn_inner d-flex align-items-center">
                                     <a class="gray_btn" href="{{URL::to('')}}/index">Continue</a>
                                     <a class="primary-btn" href="{{URL::to('')}}/checkout">Proceed to checkout</a>
                                 </div>
                             </td>
                         </tr>
                     </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
    
@stop
    </body>
</html>
