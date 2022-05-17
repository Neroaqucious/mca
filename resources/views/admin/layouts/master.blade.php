@include('admin.layouts.header') 
<div class="content">
  @include('admin.layouts.notice')
  @yield('mainTemplateFrame')
</div>
@include('admin.layouts.footer')