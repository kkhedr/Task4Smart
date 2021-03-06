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

                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4">Products details</h1>
            <h2>Cart Item {{Gloudemans\Shoppingcart\Facades\Cart::count()}}</h2>
            <div class="list-group">

            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">



            <div class="row">
                    <div class="col-lg-6 col-md-6 mb-6">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top" src="{{asset('uploads/'.$product->image)}}" alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{url('/details/'.$product->id)}}">{{$product->name}}</a>
                                </h4>
                                <h5>$24.99</h5>
                                <p class="card-text"></p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">
                                    Rating
                                    <span class="stars-inactive">
                                 @for($i=0;$i<$product->rating;$i++)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        @endfor
                                 </span>
                                </small>
                            </div>
                        </div>
                    </div>
                <div class="col-lg-6 col-md-6 mb-6">
                    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div style="background-color: #1b1e21" class="carousel-inner" role="listbox">
                            @foreach($product->Images_names as $images_name)
                            <div class="carousel-item active">
                                <img style="width: 800px;height: 200px" class="d-block img-fluid" src="{{asset('uploads/'.$images_name->image)}}" alt="First slide">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mb-6">
                    <form action="{{url('cart/'.$product->id)}}" method="post">
                        {{csrf_field()}}
                        <input type="submit" name="submit" class="btn btn-primary" value="Add cart">
                    </form>
                </div>

                <div class="col-lg-6 col-md-6 mb-6">
                    {{$product->desc}}
                </div>




            </div>
            <!-- /.row -->
            <div>
                <a href="{{url('cart')}}" class="btn btn-danger">CartView</a>
            </div>

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

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
