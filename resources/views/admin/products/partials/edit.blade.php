<div class="modal fade" id="editProductModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editProductModalLabel">Edit Product ID #{{$product->id}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method="POST" action="{{URL::action('Admin\ProductController@update')}}">
               {{ csrf_field() }}
               <input type="hidden" name="id" value="{{$product->id}}">
               <div class=" row align-items-center">
                  <div class="form-group col-sm-9">
                     <label for="fname">Name:</label>
                     <input type="text" class="form-control" id="fname" name="name" value="{{$product->product_name}}">
                  </div>
                  <?php $productTagsEdit = App\ProductTag::where('product_id', $product->id)->get(); ?>
                  <div class="form-group col-6">
                     <label for="tag">Tag:</label>
                     <select class="form-contol" id="tag" name="tags[]" multiple>
                        @foreach($product['tags'] as $tag)
                              <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary mr-2">Submit</button>
               <a href="{{URL::action('Admin\ProductController@index')}}" class="btn iq-bg-danger">Cancel</a>
            </form>
         </div>
      </div>
   </div>
</div>