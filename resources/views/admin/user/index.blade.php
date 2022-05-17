@extends('admin.layouts.master')
@section('title') Admin User Management @stop

@section('breadcrumb')
  <button type="button" class="btn flat btn-outline-secondary btn-sm py-1 px-1" data-toggle="modal" data-target="#noAnimationModal"><span class="material-icons align-top md-18">search</span>&nbsp;{{ __('Search') }}&nbsp;&nbsp;</button>  
  <button type="button" class="btn flat btn-outline-secondary btn-sm py-1 px-1" data-toggle="modal" data-target="#formModal"><span class="material-icons align-top md-18">add_circle</span>&nbsp;{{ __('Create') }}&nbsp;&nbsp;</button>
@stop

@section('mainTemplateFrame')
  <div class="card">
    <div class="card-body">
      <div class="body">
        <div class="col-md-12 col-lg-12 pb-2 text-right">
          <div class="text-secondary">@if (count($users) > 1) {{ $users->firstItem() }} ~ {{ $users->lastItem()}} / {{ $users->total() }} @endif</div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr class="text-center">
                <th width="1">#</th>
                <th>Name</th>                     
                <th>Email </th>   
                <th>Role</th>        
                <th width="1">Created date</th>
                <th width="1">Updated date</th> 
                <th width="1">Actions</th>
              </tr>
            </thead>
            <tbody>
              @if (count($users) > 0)                              
                @foreach ($users as $user)
                <tr class="text-center">
                  <td class="text-right">{{ $user->id }}</td>
                  <td class="text-left">{{ $user->name }}</td>   
                  <td class="text-left">{{ $user->email }}</td>   
                  <td>{{ $user->role_name }}</td>                                
                  <td>{{ $user->created_at }}</td>
                  <td>{{ $user->updated_at }}</td>
                  <td>
                    <a href="#" class="text-muted" id="actionDropdown" data-toggle="dropdown">
                      <span class="material-icons md-20 align-middle">more_vert</span></a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionDropdown">
                        <a class="dropdown-item" href="{{ route('user.edit', $user->id) }}">Edit</a>
                        <a class="dropdown-item" href="{{ route('user.destroy', $user->id) }}">Delete</a>              
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
          <div class="float-right">{{ $users->links() }}</div>
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
        <h5 class="modal-title" id="exampleModalLabel">{{ __('Add Admin User')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="material-icons ">close</span>
        </button>
      </div>
      <div class="modal-body p-3">
        <form method="POST" action="{{ route('user.store') }}">
          @csrf
          @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <div class="form-group">
            <label for="userName" class="col-form-label">{{ __('User Name')}} <span class="badge badge-pill badge-danger">required</span></label>
            <input type="text" name="userName" class="form-control" id="userName" autocomplete="new-userName">
          </div>

          <div class="form-group">
            <label for="userEmail" class="col-form-label">{{ __('Email')}} <span class="badge badge-pill badge-danger">required</span></label>
            <input type="email" name="userEmail" class="form-control" id="userEmail" autocomplete="new-userEmail">
          </div>
          
          <div class="form-group">
            <label for="userPassword" class="col-form-label">{{ __('Password')}} <span class="badge badge-pill badge-danger">required</span></label>
            <input type="password" name="userPassword" class="form-control" id="userPassword" autocomplete="new-userPassword">
          </div>

          <div class="form-group">
            <label for="confirmPassword" class="col-form-label">{{ __('Confirm Password')}} <span class="badge badge-pill badge-danger">required</span></label>
            <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" autocomplete="new-confirmPassword">
          </div>

          <div class="form-group">
            <label for="userRole" class="col-form-label">{{ __('Role Level')}} <span class="badge badge-pill badge-danger">required</span></label>
            <select name="userRole" id="userRole" class="form-control">
              <option value="">Please select</option>
                @foreach ($roles as $role)
                  <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
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
        <h5 class="modal-title" id="exampleModalLabel">Search Admin User</h5>
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