<div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar">
    <div class="d-flex justify-content-between align-items-center py-2 mt-3 nav-brand">
        <div class="d-flex align-items-center justify-content-center">
            <img src="{{ asset(\App\Base::$logo) }}" class="w-50" alt="">
        </div>
        <button class="hide-sidebar-btn btn btn-light d-block d-lg-none">
            <i class="feather-x text-primary" style="font-size: 2em;"></i>
        </button>
    </div>
    <div class="nav-menu">
        <ul>
            <x-menu-spacer></x-menu-spacer>

            <x-menu-list name="Home" link="{{ route('home') }}" class="feather-home"></x-menu-list>

            <x-menu-title title="Menu test"></x-menu-titleL>
            <x-menu-list name="Add Item" link="#" class="feather-plus-circle"></x-menu-list>
            <x-menu-list name="Item list" link="#" class="feather-list" counter="10"></x-menu-list>

            <x-menu-title title="Article Manager"></x-menu-titleL>
            <x-menu-list name="Manage Category" link="{{ route('category.index') }}" class="feather-layers"></x-menu-list>
            <x-menu-list name="Create Article" link="{{ route('article.create') }}" class="feather-plus-circle"></x-menu-list>
            <x-menu-list name="Article List" link="{{ route('article.index') }}" class="feather-list"></x-menu-list>


            <x-menu-title title="User Profile"></x-menu-titleL>
            <x-menu-list name="Your Profile" link="{{ route('profile') }}" class="feather-user"></x-menu-list>
            <x-menu-list name="Change Password" link="{{ route('profile.edit.password') }}" class="feather-refresh-cw"></x-menu-list>
            <x-menu-list name="Update Profile" link="{{ route('profile.edit.name.email') }}" class="feather-message-square"></x-menu-list>
            <x-menu-list name="Update photo" link="{{ route('profile.edit.photo') }}" class="feather-image"></x-menu-list>

            <x-menu-spacer></x-menu-spacer>
            <li class="menu-item">
                <a class="btn btn-outline-primary btn-block" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>


        </ul>
    </div>
</div>
