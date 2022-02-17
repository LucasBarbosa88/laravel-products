<div class="modal fade" id="editTagModal{{$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="editTagModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editTagModalLabel">Edit Tag ID #{{$tag->id}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form method="POST" action="{{URL::action('Admin\TagController@update')}}">
               {{ csrf_field() }}
               <input type="hidden" name="id" value="{{$tag->id}}">
               <div class=" row align-items-center">
                  <div class="form-group col-sm-9">
                     <label for="fname">Name:</label>
                     <input type="text" class="form-control" id="fname" name="name" value="{{$tag->name}}">
                  </div>
               </div>
               <button type="submit" class="btn btn-primary mr-2">Submit</button>
               <a href="{{URL::action('Admin\TagController@index')}}" class="btn iq-bg-danger">Cancel</a>
            </form>
         </div>
      </div>
   </div>
</div>