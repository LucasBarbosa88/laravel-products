@extends('layouts/app')

@section('content')

<div class="container note-details">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-block card-stretch">
                <div class="card-body custom-notes-space mb-4">
                    <h3 class="">Admin | {{$title}}</h3>
                </div>
            </div>
        </div>
    </div>
    <div>
        <button class="btn btn-info" data-toggle="modal" data-target="#createProductModal"> New Product</button>
    </div>
    <div class="card card-block card-stretch mt-2">
        <div class="row">
            <div class="col ml-2 mr-2">
                <table class="table table-striped tbl-server-info mt-4 responsive">
                    <thead>
                        <tr class="ligth">
                            <th style="color: black!important">ID</th>
                            <th style="color: black!important">Name</th>
                            <th style="color: black!important">Tags</th>
                            <th style="color: black!important">Actions</th>
                        </tr>
                    </thead>
                    @foreach($products as $product)
                    <tbody>
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>
                                @foreach($data['tags'] as $tag)
                                    <span class="badge badge-secondary">{{$tag->name}}</span>
                                @endforeach
                            </td>
                            <td>@include('admin/products/partials/actions_product')</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <div class="ml-3" style="margin-right: 2px;padding-top: 15px;float: right;">
                    {{ $products->appends(request()->all())->render("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="createProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createProductModalLabel">Create a new Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{URL::action('Admin\ProductController@store')}}">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class=" row align-items-center">
                            <div class="form-group col-6">
                                <label for="fname">Name:</label>
                                <input type="text" class="form-control" id="fname" name="name" placeholder="Name of product">
                            </div>
                            <div class="form-group col-6">
                                <label for="tag">Tag:</label>
                                <select class="js-example-basic-multiple js-states form-control" id="tag" name="tags[]" multiple>
                                    @foreach($tags as $tag)
                                        <option value="{{$tag['id']}}">{{$tag['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function() {
    $('#tag').select2();
});
</script>
@stop