<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontdesign/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('frontdesign/css/shop-homepage.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">



</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Products</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>








<?php if ($cartItems->isEmpty()) { ?>
<br>
<br>
<br>
<section id="cart_items">
    <div class="container">
        <div align="center">  <img src="{{asset('frontdesign\Image/empty_cart.jpg')}}"/></div>
    </div>
</section> <!--/#cart_items-->
<?php } else { ?>
<br>
<br>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}"></a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div id="updateDiv">

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Image</td>
                        <td class="description">Product</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif
                    @if(session('error'))

                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    @endif
                    </thead>
                    <?php $count =1;?>
                    @foreach($cartItems as $cartItem)
                        <tbody>
                        <tr>
                            <td class="cart_product">
                                <p><img style="width: 200px;height:200px;" src="{{asset('uploads/'.$cartItem->options->img)}}" class="img-responsive" width="250"></p>
                            </td>
                            <td class="cart_description">
                            <!--<a href="{{url('/product_detail')}}/{{$cartItem->id}}">heang</a>
                                            <br>-->
                                <!--</div>-->
                                <h4><a href="{{url('/product_detail')}}/{{$cartItem->id}}" style="color:blue">{{$cartItem->name}}</a></h4>
                                <p>Product ID: {{$cartItem->id}}</p>
                            </td>
                            <td class="cart_price">
                                <p>${{$cartItem->price}}</p>
                            </td>
                            <td class="cart_quantity">

                                <form action="{{url('cart/update',$cartItem->rowId)}}" method="post" role="form">

                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="proId" value="{{$cartItem->id}}"/>
                                    <input type="number" size="2" value="{{$cartItem->qty}}" name="qty" id="upCart<?php echo $count;?>"
                                           autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="1000">
                                    <input type="submit" class="btn btn-primary" value="Update" styel="margin:5px">
                                </form>

                                <!--</div>-->
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">${{$cartItem->subtotal}}</p>
                            </td>
                            <td class="cart_delete">
                                <button class="btn btn-primary">
                                    <a class="cart_quantity_delete" style="background-color:red" href="{{url('/cart/remove')}}/{{$cartItem->rowId}}"><i class="fa fa-times">X</i></a>
                                </button>
                            </td>
                        </tr>
                        <?php $count++;?>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section> <!--/#cart_items-->

<?php } ?>

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Product View 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="frontdesign/vendor/jquery/jquery.min.js"></script>
<script src="frontdesign/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

