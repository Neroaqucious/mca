@extends('admin.layouts.master')
@section('title') Edit Roles @stop

@section('breadcrumb')
<a class="btn flat btn-dark btn-sm py-1 px-2" href="{{ url('admin/role') }}"><span class="material-icons align-text-top md-20">view_headline</span></a>
@stop

@section('mainTemplateFrame')

<div class="card">
  <div class="card-body">
    <div class="col-md-6 col-lg-6 col-sm-12">
      <form method="POST" action="{{ route('role.update', ['role' => $roles->id]) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="roleName" class="col-form-label">{{ __('Name')}} <span class="badge badge-pill badge-danger">required</span></label>
          <input type="text" name="name" class="form-control" id="roleName" autocomplete="new-roleName" value="{{ $roles->name }}">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
          <label class="mb-2" for="status">Status</label> 
          <div class="radio">
            <label class="col-md-2">
              <input type="radio" name="status" value="1" @if ($roles->status == 1) checked="checked"@endif> Public
            </label>
            <label class="col-md-2">
              <input type="radio" name="status" value="0"  @if ($roles->status == 0) checked="checked"@endif> Private
            </label>
          </div>
        </div>
        <hr>
        <button type="submit" class="btn flat btn-outline-dark btn-sm py-1 px-1 float-right"><span class="material-icons align-top md-18">update</span>&nbsp;{{ __('Update') }}&nbsp;</button>
      </form>
    </div>
  </div>
</div>

@stop