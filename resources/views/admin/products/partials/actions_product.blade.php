<a href="#deleteProductModal{{$product->id}}" data-toggle="modal" class="btn btn-warning">Delete</a>
<a class="btn btn-info" id="editButton" data-toggle="modal" href="#editProductModal{{$product->id}}">Edit</a>
@extends('admin/products/partials/edit')
@extends('admin/products/partials/delete_product')