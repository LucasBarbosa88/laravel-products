<div class="modal fade" id="deleteProductModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProductModalLabel">Delete Product ID #{{$product->id}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-boody alert-danger">
                <h4>Are you sure to delete product <b>{{$product->product_name}}</b>?</h4>
            </div>
            <div class="modal-footer alert-danger">
                <a class="btn btn-warning" href="{{URL::action('Admin\ProductController@delete', $product->id )}}">Delete</a>
            </div>
        </div>
    </div>
</div>