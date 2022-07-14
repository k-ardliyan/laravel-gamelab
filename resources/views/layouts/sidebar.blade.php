<aside id="sidebar-wrapper">
<div class="sidebar-brand">
    <a href="index.html">Mini Libary</a>
</div>
<div class="sidebar-brand sidebar-brand-sm">
    <a href="index.html">ML</a>
</div>
<ul class="sidebar-menu d-flex flex-column" >
    <li class="menu-header">Dashboard</li>
    {{-- add class active if on page dashboard --}}
    <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fire"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="menu-header">Entities</li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Issues</span></a>
        <ul class="dropdown-menu">
        <li class=""><a class="nav-link" href="#">All Booking</a></li>
        <li class=""><a class="nav-link" href="#">Add Booking</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown {{Request::is('books') ? 'active' : ''}}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Books</span></a>
        <ul class="dropdown-menu">
            <li class="{{Request::is('books') ? 'active' : ''}}"><a class="nav-link" href="{{route('books')}}">All Book</a></li>
            <li class="{{Request::is('books') ? 'active' : ''}}"><a class="nav-link" href="{{route('books.create')}}">Add Book</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown {{Request::is('members') ? 'active' : ''}}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Members</span></a>
        <ul class="dropdown-menu">
            <li class="{{Request::is('members') ? 'active' : ''}}"><a class="nav-link" href="{{route('members')}}">All Member</a></li>
            <li class="{{Request::is('members.create') ? 'active' : ''}}"><a class="nav-link" href="{{route('members.create')}}">Add Member</a></li>
        </ul>
    </li>
    <div class="mb-4 p-3 hide-sidebar-mini">
    <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Documentation
    </a>
    </div>
</aside>
