@extends('front.master')

@section('content')

    <div class="modal-header">
        <h4 class="modal-title">Edit Product</h4>

        <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('put')}}
            <div class="row">

                <div class="col-md-6 form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{$product->name}}">
                </div>
                <div class="col-md-6 form-group">
                    <label>desc</label>
                    <textarea cols="5" rows="5" name="desc" class="form-control">{{$product->desc}}</textarea>
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
                <input type="submit" name="submit" value="EditProduct" class="btn btn-default">
            </div>
        </form>
    </div>
    <div class="modal-body">



    </div>
    <div class="modal-footer">

    </div>

@endsection