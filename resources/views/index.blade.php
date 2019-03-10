@extends('front.master')

@section('content')


<div style="margin-top: 50px;margin-left: 25px">
    <button style="float: right" type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddProduct">
        Add Product
    </button>

    <!-- Modal -->
    <div class="modal fade" id="AddProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">

                            <div class="col-md-12 form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>desc</label>
                                <textarea cols="5" rows="5" name="desc" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Catogery</label>
                                <select class="form-control" name="category">
                                    @foreach($category as $catog)
                                        <option value="{{$catog->id}}">{{$catog->category_name}}</option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="col-md-12 form-group">
                                <label>Rating</label>
                                <select class="form-control" name="Rating">
                                    @for($i=0;$i<5;$i++)
                                        <option value="{{$i+1}}">{{$i+1}}</option>
                                    @endfor

                                </select>

                            </div>

                            <div class="col-md-12 form-group">
                                <input type="file" name="mainimage" class="form-control">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="file" name="image[]" class="form-control" multiple>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>


    <div class="modal-header">
        <h4 class="modal-title">Products</h4>


    </div>
    <div class="modal-body">

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>desc</th>
                <th>Category_name</th>
                <th>Product_Images</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($product as $prod)
                <tr>
                    <td>{{$prod->id}}</td>
                    <td>{{$prod->name}}</td>
                    <td>{{$prod->desc}}</td>
                    <td>{{$prod->Category_namee->category_name}}</td>
                    <td>
                        @foreach($prod->Images_names as $images_name)
                            <img style="width: 100px;height: 100px" src="{{asset('uploads/'.$images_name->image)}}" alt="">
                        @endforeach

                    </td>
                    <td>
                        <a data-toggle="modal" data-target="#EditProduct{{$prod->id}}" style="color: white"  class="btn btn-primary">Edit</a>
                        <form action="{{route('product.destroy',$prod->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <input type="submit" name="submit" value="delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
    <div class="modal-footer">

    </div>


    <!-- Modal for Edit-->

    <!-- Button trigger modal -->


    <!-- Modal -->
    @foreach($product as $prod)
    <div class="modal fade" id="EditProduct{{$prod->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('product.update',$prod->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('put')}}
                        <div class="row">

                            <div class="col-md-6 form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{$prod->name}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>desc</label>
                                <textarea cols="5" rows="5" name="desc" class="form-control">{{$prod->desc}}</textarea>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Catogery</label>
                                <select class="form-control" name="category">
                                    @foreach($category as $catog)
                                        <option value="{{$catog->id}}">{{$catog->category_name}}</option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="col-md-6 form-group">
                                <input type="file" name="image[]" class="form-control" multiple>
                            </div>
                            @foreach($prod->Images_names as $images_name)
                                <img style="width: 100px;height: 100px;margin-left: 150px" src="{{asset('uploads/'.$images_name->image)}}" alt="">
                            @endforeach

                            <div class="col-md-6 form-group"><br>
                            <input type="submit" name="submit" value="EditProduct" class="btn btn-default">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @endforeach

</div>
@endsection