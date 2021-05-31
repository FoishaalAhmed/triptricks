<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset(auth()->user()->photo) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ route('profile') }}" class="d-block">{{ auth()->user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ URL::to('/home') }}" class="nav-link @if (request()->is('admin/dashboard') || request()->is('blogger/dashboard')) {{ 'active' }} @endif">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        {{__('Dashboard')}}
                    </p>
                </a>
            </li>
            @hasrole('Admin')
				<li class="nav-item @if (request()->is('admin/users') || request()->is('admin/users/*')) {{ 'menu-open' }} @endif">
					<a href="#" class="nav-link @if (request()->is('admin/users') || request()->is('admin/users/*')) {{ 'active' }} @endif">
						<i class="nav-icon fas fa-users"></i>
						<p>
							{{__('Users')}}
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.users.create') }}" class="nav-link @if (request()->is('admin/users/create')) {{ 'active' }} @endif">
								<i class="fas fa-plus-square nav-icon"></i>
								<p>{{__('New Users')}}</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.users.index') }}" class="nav-link @if (request()->is('admin/users')) {{ 'active' }} @endif">
								<i class="fas fa-list-alt nav-icon"></i>
								<p>{{__('Users')}}</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item @if (request()->is('admin/pages') || request()->is('admin/pages/*')) {{ 'menu-open' }} @endif">
					<a href="#" class="nav-link @if (request()->is('admin/pages') || request()->is('admin/pages/*')) {{ 'active' }} @endif">
						<i class="nav-icon fas fa-file"></i>
						<p>
							{{__('Pages')}}
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.pages.create') }}" class="nav-link @if (request()->is('admin/pages/create')) {{ 'active' }} @endif">
								<i class="fas fa-plus-square nav-icon"></i>
								<p>{{__('New Page')}}</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.pages.index') }}" class="nav-link @if (request()->is('admin/pages')) {{ 'active' }} @endif">
								<i class="fas fa-list-alt nav-icon"></i>
								<p>{{__('Pages')}}</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="{{ route('admin.queries.index') }}" class="nav-link @if (request()->is('admin/queries')) {{ 'active' }} @endif">
						<i class="nav-icon fas fa-envelope"></i>
						<p>
							{{__('Queries')}}
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('admin.faqs.index') }}" class="nav-link @if (request()->is('admin/faqs')) {{ 'active' }} @endif">
						<i class="nav-icon fas fa-question-circle"></i>
						<p>
							{{__('FAQ')}}
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('admin.contacts') }}" class="nav-link @if (request()->is('admin/contacts')) {{ 'active' }} @endif">
						<i class="nav-icon far fa-address-card"></i>
						<p>
							{{__('Contact')}}
						</p>
					</a>
				</li>
			@else
				
            @endhasrole
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
