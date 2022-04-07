@extends('admin.layouts.master')
@section('title') Add Roles @stop

@section('breadcrumb')
<div class="input-group">
  <input type="text" class="form-control" placeholder="Search">
  <div class="input-group-append">
    <button class="btn btn-dark" type="button"><span class="material-icons align-text-top md-20">search</span></button>
  </div>
</div>
<a class="btn flat btn-dark btn-sm py-1 px-2" href="#"><span class="material-icons align-text-top md-20">add_circle</span></a>
@stop

@section('mainTemplateFrame')

<div class="card">
  <div class="card-body">
    <div>
      <form method="POST" action="{{ route('role.store') }}">
        @csrf
        <div class="form-group">
          <label for="roleName" class="col-form-label">{{ __('Name')}}</label>
          <input type="text" name="name" class="form-control" id="roleName" autocomplete="new-roleName">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
          <label class="mb-2" for="status">Permission</label> 
          <div class="radio">
            <label class="col-md-2">
              <input type="radio" name="status" value="1" > Public
            </label>
            <label class="col-md-2">
              <input type="radio" name="status" value="0" checked="checked"> Privated
            </label>
          </div>
        </div>

        <button type="submit" class="btn mt-4 btn-dark">{{ __('Create') }}</button>
      </form>
    </div>
  </div>
</div>

@stop