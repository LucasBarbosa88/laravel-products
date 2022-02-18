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
        <button class="btn btn-info" data-toggle="modal" data-target="#createTagModal"> New Tag</button>
    </div>
    <div class="card card-block card-stretch mt-2">
        <div class="row">
            <div class="col ml-2 mr-2">
                <table class="table table-striped tbl-server-info mt-4 responsive">
                    <thead>
                        <tr class="ligth">
                            <th style="color: black!important">ID</th>
                            <th style="color: black!important">Name</th>
                            <th style="color: black!important">Data</th>
                            <th style="color: black!important">Actions</th>
                        </tr>
                    </thead>
                    @foreach($tags as $tag)
                    <tbody>
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->created_at}}</td>
                            <td>@include('admin/tags/partials/actions_tag')</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <div class="ml-3" style="margin-right: 2px;padding-top: 15px;float: right;">
                    {{ $tags->appends(request()->all())->render("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="createTagModal" tabindex="-1" role="dialog" aria-labelledby="createTagModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTagModalLabel">Create a new Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{URL::action('Admin\TagController@store')}}">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class=" row align-items-center">
                            <div class="form-group col-6">
                                <label for="fname">Name:</label>
                                <input type="text" class="form-control" id="fname" name="name" placeholder="Name of tag">
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
  $(document).ready(function () {
    $('#country').select2({
      width: '100%',
      placeholder: "Select Tag",
      allowClear: true,
      multiple: true
    });
  });
</script>
@stop