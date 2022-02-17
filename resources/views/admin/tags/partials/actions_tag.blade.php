<a href="#deleteTagModal{{$tag->id}}" data-toggle="modal" class="btn btn-warning">Delete</a>
<a class="btn btn-info" id="editButton" data-toggle="modal" href="#editTagModal{{$tag->id}}">Edit</a>
@extends('admin/tags/partials/edit')
@extends('admin/tags/partials/delete_tag')