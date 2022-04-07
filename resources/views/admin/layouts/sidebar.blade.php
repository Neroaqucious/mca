<!-- SIDEBAR -->
<aside class="sidebar">
  <nav class="navbar navbar-dark" style="border-top: 2px solid #265b30;background-color: #407c0c;">
    <a class="navbar-brand ml-1 py-1 brand-title" href="">MCA Admin Portal</a>
    <span></span>
    <a class="navbar-brand py-0 material-icons toggle-sidebar" href="#">menu</a>
  </nav>
  <nav class="navigation" >
    <ul>
      <li class="">
        <a href="" title="Dashboard"><span class="nav-icon material-icons">developer_board</span> Dashboard</a>
      </li>

      <li class="">
        <a href="#" title="Member Option"><span class="nav-icon material-icons">group</span> Member</a>
        <ul class="sub-nav">
          <li class=""><a href="" title="Member list"> List</a></li>
          <li class=""><a href="" title="Member add"> Add New</a></li>
          <li class=""><a href="" title="Member type"> Type</a></li>
        </ul>
      </li>

      <li class="">
        <a href="#" title="Category Option"><span class="nav-icon material-icons">category</span> Category</a>
        <ul class="sub-nav">
          <li class=""><a href="" title="category list"> List</a></li>
          <li class=""><a href="" title="category add"> Add New</a></li>
        </ul>
      </li> 

      <li class="">
        <a href="#" title="Product Option"><span class="nav-icon material-icons">widgets</span> Product</a>
        <ul class="sub-nav">
          <li class=""><a href="" title="product list"> List</a></li>
          <li class=""><a href="" title="product add"> Add New</a></li>
        </ul>
      </li>

      <li class="">
        <a href="#" title="Brand Option"><span class="nav-icon material-icons">local_play</span> Brand</a>
        <ul class="sub-nav">
          <li class=""><a href="" title="brand list"> List</a></li>
          <li class=""><a href="" title="brand add"> Add New</a></li>
        </ul>
      </li>

      <li class="">
        <a href="#" title="News Option"><span class="nav-icon material-icons">wifi_tethering</span> News</a>
        <ul class="sub-nav">
          <li class=""><a href="" title="public news"> Public News</a></li>
          <li class=""><a href="" title="member news"> Member News</a></li>
        </ul>
      </li>
      
      <li class="">
        <a href="#" title="Activaty Option"><span class="nav-icon material-icons">ballot</span> Activaty</a>
        <ul class="sub-nav">
          <li class=""><a href="" title="activaty list"> List</a></li>
          <li class=""><a href="" title="activaty add"> Add New</a></li>
        </ul>
      </li>

      <li class="">
        <a href="#" title="Committee Option"><span class="nav-icon material-icons">device_hub</span> Committee</a>
        <ul class="sub-nav">
          <li class=""><a href="" title="Committee list"> List</a></li>
          <li class=""><a href="" title="Committee add"> Add New</a></li>
        </ul>
      </li>

      <li class="">
        <a href="#" title="Ingredient Option"><span class="nav-icon material-icons">stars</span> Ingredient</a>
        <ul class="sub-nav">
          <li class=""><a href="" title="Ingredient list"> List</a></li>
          <li class=""><a href="" title="Ingredient add"> Add New</a></li>
        </ul>
      </li>

      <li class="">
        <a href="#" title="Marketing Option"><span class="nav-icon material-icons">timeline</span> Marketing</a>
        <ul class="sub-nav">
          <li class=""><a href="" title="banner list"> Banner</a></li>
          <li class=""><a href="" title="slider list"> Slider</a></li>
        </ul>
      </li>

      <li class="">
        <a href="#" title="Payment Options"><span class="nav-icon material-icons">payment</span> Payment</a>
        <ul class="sub-nav">
          <li class=""><a href="" title="Payment List"> List</a></li>
          <li class=""><a href="" title="Payment add"> Add New</a></li>
        </ul>
      </li>

      <li class="">
        <a href="#" title="Inbox Options"><span class="nav-icon material-icons">inbox</span> Inbox</a>
        <ul class="sub-nav">
          <li class=""><a href="" title="Inbox list"> List</a></li>
          <li class=""><a href="" title="Inbox add"> Add New</a></li>
        </ul>
      </li>

      <li class="">
        <a href="#" title="Report Options"><span class="nav-icon material-icons">report</span> Report</a>
        <ul class="sub-nav">
          <li class=""><a href="" title="Report list"> List</a></li>
          <li class=""><a href="" title="Report add"> Add New</a></li>
        </ul>
      </li>

      <li @if ($global['slug'] != "" && $global['slug'][0] == 'admin')class="open active"@endif>
        <a href="#" title="Admin Options"><span class="nav-icon material-icons">security</span> Configuration</a>
        <ul class="sub-nav">
          <li class=""><a href="" title="Admin List"> Admin List</a></li>
          <li @if ($global['slug'] != "" && $global['slug'][1] == 'role_list')class="active"@endif><a href="{{ url('admin/role') }}" title="Role List"> Role List</a></li>
          <li class=""><a href="" title="Marchent"> Marchent</a></li>    
          <li class=""><a href="" title="Payment"> Mail List</a></li>
          <li class=""><a href="" title="Configure"> Site Configure</a></li>          
        </ul>
      </li>

    </ul>
  </nav>
</aside>