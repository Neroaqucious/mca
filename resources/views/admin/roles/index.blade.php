@extends('admin.layouts.master')
@section('title') Roles List @stop

@section('breadcrumb')
  <button type="button" class="btn flat btn-outline-secondary btn-sm py-1 px-1" data-toggle="modal" data-target="#noAnimationModal"><span class="material-icons align-top md-18">search</span>&nbsp;{{ __('Search') }}&nbsp;&nbsp;</button>  
  <button type="button" class="btn flat btn-outline-secondary btn-sm py-1 px-1" data-toggle="modal" data-target="#formModal"><span class="material-icons align-top md-18">add_circle</span>&nbsp;{{ __('Create') }}&nbsp;&nbsp;</button>
@stop

@section('mainTemplateFrame')
  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong>  {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true" class="material-icons md-18">clear</span>
    </button>
  </div>    
  @endif
  @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  
  <div class="card">
    <div class="card-body">
      <div class="body">
        <div class="col-md-12 col-lg-12 pb-2 text-right">
          <div class="text-secondary">@if (count($roles) > 1) {{ $roles->firstItem() }} ~ {{ $roles->lastItem()}} / {{ $roles->total() }} @endif</div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr class="text-center">
                <th width="1">#</th>
                <th>Name</th>                     
                <th>State </th>            
                <th width="1">Created date</th>
                <th width="1">Updated date</th> 
                <th width="1">Actions</th>
              </tr>
            </thead>
            <tbody>
              @if (count($roles) > 1)                              
                @foreach ($roles as $role)
                <tr class="text-center">
                  <td class="text-right">{{ $role->id }}</td>
                  <td>{{ $role->name }}</td>                        
                  <td>
                    @if ($role->status == 1)
                      <span class="badge badge-pill badge-success px-2 text-white md-24">public</span>
                    @else
                      <span class="badge badge-pill badge-secondary px-2 text-white md-24">private</span>
                    @endif
                  </td>              
                  <td>{{ $role->created_at }}</td>
                  <td>{{ $role->updated_at }}</td>
                  <td>
                    <a href="#" class="text-muted" id="actionDropdown" data-toggle="dropdown">
                      <span class="material-icons md-20 align-middle">more_vert</span></a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionDropdown">
                        <a class="dropdown-item" href="{{ route('role.edit', $role->id) }}">Edit</a>
                        <a class="dropdown-item" href="{{ route('role.destroy', $role->id) }}">Delete</a>              
                      </div>
                    </a>
                  </td>
                </tr>
                @endforeach 
                @else
                  <tr class="text-center">
                    <td colspan="6">There is not record!</td>
                  </tr>
                @endif
            </tbody>
          </table>
        </div>
        <div class="col-md-12 col-lg-12 d-block">      
          <div class="float-right">{{ $roles->links() }}</div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
@stop

@section('modelView')
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:420px;" role="document">
    <div class="modal-content">
      <div class="modal-header px-3">
        <h5 class="modal-title" id="exampleModalLabel">{{ __('Add Roles')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="material-icons ">close</span>
        </button>
      </div>
      <div class="modal-body p-3">
        <form method="POST" action="{{ route('role.store') }}">
          @csrf
          @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="form-group">
            <label for="roleName" class="col-form-label">{{ __('Name')}} <span class="badge badge-pill badge-danger">required</span></label>
            <input type="text" name="name" class="form-control" id="roleName" autocomplete="new-roleName">
          </div>
  
          <div class="form-group">
            <label class="mb-2" for="status">{{ __('Status')}}</label> 
            <div class="radio">
              <label class="col-md-4">
                <input type="radio" name="status" value="1" > {{ __('public')}}
              </label>
              <label class="col-md-4">
                <input type="radio" name="status" value="0" checked="checked"> {{ __('private')}}
              </label>
            </div>
          </div>
          <hr>
          <button type="submit" class="btn btn-dark float-right">{{ __('Create') }}</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="noAnimationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="material-icons ">close</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('role.search') }}" method="post">
          @csrf
          <div class="input-group"> 
            <input type="text" class="form-control" name="search" placeholder="Search" value="{{ $respond['search'] ?? '' }}">
            <div class="input-group-append">
              <button class="btn flat btn-dark btn-sm py-1 px-4" type="submit"><span class="material-icons align-text-top md-20">{{ __('search') }}</span></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@stop