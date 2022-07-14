<aside id="sidebar-wrapper">
<div class="sidebar-brand">
    <a href="index.html">Mini Library</a>
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
    <li class="nav-item dropdown @if (Request::is('book*')) active @endif">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i> <span>Books</span></a>
        <ul class="dropdown-menu">
            <li class="{{Request::is('books') ? 'active' : ''}}"><a class="nav-link" href="{{route('books')}}">All Book</a></li>
            <li class="{{Request::is('book/create') ? 'active' : ''}}"><a class="nav-link" href="{{route('books.create')}}">Add Book</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown @if (Request::is('member*')) active @endif">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i> <span>Members</span></a>
        <ul class="dropdown-menu">
            <li class="{{Request::is('members') ? 'active' : ''}}"><a class="nav-link" href="{{route('members')}}">All Member</a></li>
            <li class="{{Request::is('member/create') ? 'active' : ''}}"><a class="nav-link" href="{{route('members.create')}}">Add New Member</a></li>
        </ul>
    </li>
    <div class="mb-4 p-3 hide-sidebar-mini">
    <a href="https://github.com/k-ardliyan" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Documentation
    </a>
    </div>
</aside>
