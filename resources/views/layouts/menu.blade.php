<!-- need to remove -->
<li class="nav-item menu-open">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Dashboard
      </p>
    </a>
</li>
<li class="nav-item {{ Request::is('admin/service/add') ? 'menu-open' : '' }}{{ Request::is('admin/service/show') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('admin/service/add') ? 'active' : '' }}{{ Request::is('admin/service/show') ? 'active' : '' }}">
      <i class="nav-icon fas fa-list"></i>
      <p>
        Service
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('get.service.add') }}" class="nav-link {{ Request::is('admin/service/add') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Add Service</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('service.show') }}" class="nav-link {{ Request::is('admin/service/show') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>List Services</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item {{ Request::is('admin/pricing/add') ? 'menu-open' : '' }}{{ Request::is('admin/pricing/show') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('admin/pricing/add') ? 'active' : '' }}{{ Request::is('admin/pricing/show') ? 'active' : '' }}">
      <i class="nav-icon fas fa-money-bill"></i>
      <p>
        Pricing
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('get.pricing.add') }}" class="nav-link {{ Request::is('admin/pricing/add') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Add Pricing</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('pricing.show') }}" class="nav-link {{ Request::is('admin/pricing/show') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>List Pricing</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item {{ Request::is('admin/slider/add') ? 'menu-open' : '' }}{{ Request::is('admin/slider/show') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('admin/slider/add') ? 'active' : '' }}{{ Request::is('admin/slider/show') ? 'active' : '' }}">
      <i class="nav-icon fas fa-images"></i>
      <p>
        Slider
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('admin.slider') }}" class="nav-link {{ Request::is('admin/slider/add') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Add Slider</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('slider.show') }}" class="nav-link {{ Request::is('admin/slider/show') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>List Sliders</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item {{ Request::is('admin/news/add') ? 'menu-open' : '' }}{{ Request::is('admin/news/show') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('admin/news/add') ? 'active' : '' }}{{ Request::is('admin/news/show') ? 'active' : '' }}">
      <i class="nav-icon fas fa-newspaper"></i>
      <p>
        News
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('admin.news') }}" class="nav-link {{ Request::is('admin/news/add') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Add News</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('news.show') }}" class="nav-link {{ Request::is('admin/news/show') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>List News</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item {{ Request::is('admin/team/add') ? 'menu-open' : '' }}{{ Request::is('admin/team/show') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('admin/team/add') ? 'active' : '' }}{{ Request::is('admin/team/show') ? 'active' : '' }}">
      <i class="nav-icon fas fa-users"></i>
      <p>
        Team
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('admin.team') }}" class="nav-link {{ Request::is('admin/team/add') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Add Team Member</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('team.show') }}" class="nav-link {{ Request::is('admin/team/show') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>List Team Member</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a href="{{ route('admin.order') }}" class="nav-link {{ Request::is('admin/orders') ? 'active' : '' }}">
      <i class="nav-icon fas fa-list"></i>
      <p>
        Orders
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{ route('admin.company.profile') }}" class="nav-link {{ Request::is('admin/company-profile') ? 'active' : '' }}">
      <i class="nav-icon fas fa-id-card"></i>
      <p>
        Company Profile
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{ route('admin.contact') }}" class="nav-link {{ Request::is('admin/contact') ? 'active' : '' }}">
      <i class="nav-icon fas fa-address-book"></i>
      <p>
        Contact
      </p>
    </a>
  </li>