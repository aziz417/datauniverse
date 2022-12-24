<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" target="_blank" class="brand-link navbar-navy">
        <img style="width: 35px!important; height: 90px" src="{{ @$globalSettingInfo->image->url }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3">
        <span style="width: 196px" class="brand-text">{{ Str::limit(@$globalSettingInfo->header_top_title, 18) }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
    {{--        <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
    {{--            <div class="image">--}}
    {{--                <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" class="img-circle elevation-2" alt="User Image">--}}
    {{--            </div>--}}
    {{--            <div class="info">--}}
    {{--                <a href="#" class="d-block">{{ auth()->user()->name }}</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    <!-- SidebarSearch Form -->
        <!--        <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                               aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>-->

        <!-- Sidebar Menu -->

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item {{ getActiveClassByController('DashboardController') }}">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @php(@$active_class = getActiveClassByController('RoleManageController') || getActiveClassByController('UserController') )
                @if (auth()->user()->hasRole('admin'))
                    <li class="nav-item">
                        <a href="#" class="nav-link  {{ $active_class ? 'activeMenu' : ''}}">
                            <i class="fa fa-user nav-icon"></i>
                            <p>Admin<i class="right fas fa-angle-left"></i></p>
                        </a>

                        <ul class="nav nav-treeview" style="display: {{ $active_class ? 'block' : '' }}">
                            <li class="{{ getActiveClassByController('UserController') }} nav-item">
                                <a class="nav-link" href="{{ route('admin.users.index') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            <li class="{{ getActiveClassByController('RoleManageController') }} nav-item">
                                <a class="nav-link" href="{{ route('admin.roles.index') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Role</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

{{--                @canany(['work road map create', 'work road map edit', 'work road map status', 'work road map delete'])--}}
                    <li class="{{ getActiveClassByController('UserQuestionController') }} nav-item">
                        <a class="nav-link" href="{{ route('admin.user.questions') }}">
                            <i class="fa fa-question nav-icon"></i>
                            <p>Questions</p>
                        </a>
                    </li>
{{--                @endcanany--}}

                @canany(['work road map create', 'work road map edit', 'work road map status', 'work road map delete'])
                    <li class="{{ getActiveClassByController('WorkRoadMapController') }} nav-item">
                        <a class="nav-link" href="{{ route('admin.work-road-maps.index') }}">
                            <i class="fa fa-american-sign-language-interpreting nav-icon"></i>
                            <p>Work Road Maps</p>
                        </a>
                    </li>
                @endcanany

                @canany(['client and product create', 'client and product edit', 'client and product status', 'client and product delete'])
                    <li class="{{ getActiveClassByController('ClientAndProductController') }} nav-item">
                        <a class="nav-link" href="{{ route('admin.client-and-products.index') }}">
                            <i class="fa fa-backward nav-icon"></i>
                            <p>Client and products</p>
                        </a>
                    </li>
                @endcanany

                @canany(['welcome create', 'welcome edit', 'welcome status', 'welcome delete'])
                    <li class="{{ getActiveClassByController('WelcomeController') }} nav-item">
                        <a class="nav-link" href="{{ route('admin.welcomes.index') }}">
                            <i class="fa fa-radiation nav-icon"></i>
                            <p>Welcome</p>
                        </a>
                    </li>
                @endcanany

                @canany(['contact message show', 'contact message delete', 'contact message reply', 'contact message reply show', 'contact message reply delete'])
                    <li class="{{ getActiveClassByController('UserContactController') }} {{ getActiveClassByController('UserContactReplyController') }} nav-item">
                        <a class="nav-link" href="{{ route('admin.user-contacts.index') }}">
                            <i class="fa fa-phone nav-icon"></i>
                            <p>User Contacts</p>
                        </a>
                    </li>
                @endcanany

                @canany(['our mission create', 'our mission edit', 'our mission delete', 'our mission status'])
                    <li class="{{ getActiveClassByController('OurMissionController') }} nav-item">
                        <a class="nav-link" href="{{ route('admin.our-missions.index') }}">
                            <i class="fa fa-fax nav-icon"></i>
                            <p>Our Mission</p>
                        </a>
                    </li>
                @endcanany

                @canany(['user expectation create', 'user expectation edit', 'user expectation delete', 'user expectation status'])
                    <li class="{{ getActiveClassByController('UserExpectationController') }} nav-item">
                        <a class="nav-link" href="{{ route('admin.user-expectations.index') }}">
                            <i class="fa fa-bahai nav-icon"></i>
                            <p>User Expectations</p>
                        </a>
                    </li>
                @endcanany

                @canany(['service create', 'service edit', 'service delete', 'service status'])
                    <li class="{{ getActiveClassByController('ServiceController') }} nav-item">
                        <a class="nav-link" href="{{ route('admin.services.index') }}">
                            <i class="fab fa-servicestack nav-icon"></i>
                            <p>Services</p>
                        </a>
                    </li>
                @endcanany

                @canany(['slider create', 'slider edit', 'slider delete', 'slider status'])
                    <li class="{{ getActiveClassByController('SlidersController') }} nav-item">
                        <a class="nav-link" href="{{ route('admin.sliders.index') }}">
                            <i class="fa fa-image nav-icon"></i>
                            <p>Sliders</p>
                        </a>
                    </li>
                @endcanany

                @canany(['about create', 'about edit', 'about delete', 'about status'])
                    <li class="{{ getActiveClassByController('AboutController') }} nav-item">
                        <a class="nav-link" href="{{ route('admin.abouts.index') }}">
                            <i class="fa fa-sitemap nav-icon"></i>
                            <p>About</p>
                        </a>
                    </li>
                @endcanany

                @canany(['category create', 'category edit', 'category delete', 'category status'])
                    <li class="{{ getActiveClassByController('CategoryController') }} nav-item">
                        <a class="nav-link" href="{{ route('admin.categories.index') }}">
                            <i class="fa fa-list-ul nav-icon"></i>
                            <p>Categories</p>
                        </a>
                    </li>
                @endcanany

                @canany(['skill or technology create', 'skill or technology edit', 'skill or technology delete', 'skill or technology status'])
                    <li class="{{ getActiveClassByController('SkillOrTechnologyController') }} nav-item">
                        <a class="nav-link" href="{{ route('admin.skill-or-technologies.index') }}">
                            <i class="fa fa-award nav-icon"></i>
                            <p>Technologies We Used</p>
                        </a>
                    </li>
                @endcanany

                @canany(['post create', 'post edit', 'post delete', 'post status'])
                    <li class="{{ getActiveClassByController('PostController') }} nav-item">
                        <a class="nav-link" href="{{ route('admin.posts.index') }}">
                            <i class="fa fa-gavel nav-icon"></i>
                            <p>Posts</p>
                        </a>
                    </li>
                @endcanany

                @canany(['tag create', 'tag edit', 'tag delete', 'tag status'])
                    <li class="{{ getActiveClassByController('TagController') }} nav-item">
                        <a class="nav-link" href="{{ route('admin.tags.index') }}">
                            <i class="fa fa-tags nav-icon"></i>
                            <p>Tags</p>
                        </a>
                    </li>
                @endcanany

                @canany(['trusted company create', 'trusted company edit', 'trusted company delete', 'trusted company status'])
                    <li class="{{ getActiveClassByController('TrustedCompanyController') }} nav-item">
                        <a class="nav-link" href="{{ route('admin.trusted-companies.index') }}">
                            <i class="fa fa-star-of-david nav-icon"></i>
                            <p>Trusted Companies</p>
                        </a>
                    </li>
                @endcanany

                @canany(['we do care create', 'we do care edit', 'we do care delete', 'we do care status'])
                    <li class="{{ getActiveClassByController('WeDoCareController') }} nav-item">
                        <a class="nav-link" href="{{ route('admin.we-do-cares.index') }}">
                            <i class="fa fa-people-carry nav-icon"></i>
                            <p>We Do Care</p>
                        </a>
                    </li>
                @endcanany

                @canany(['we offer create', 'we offer edit', 'we offer delete', 'we offer status'])
                    <li class="{{ getActiveClassByController('WeOfferController') }} nav-item">
                        <a class="nav-link" href="{{ route('admin.we-offers.index') }}">
                            <i class="fa fa-gavel nav-icon"></i>
                            <p>We Offers</p>
                        </a>
                    </li>
                @endcanany

                @canany(['subscriber show', 'subscriber delete'])
                    <li class="{{ getActiveClassByController('SubscriberController') }} nav-item">
                        <a class="nav-link" href="{{ route('admin.subscribers.index') }}">
                            <i class="fa fa-subscript nav-icon"></i>
                            <p>Subscribers</p>
                        </a>
                    </li>
                @endcanany

                {{--                @canany(['subscriber show', 'subscriber delete'])--}}
                <li class="nav-item {{ getActiveClassByController('CareerController') }}">
                    <a class="nav-link" href="{{ route('admin.careers.index') }}">
                        <i class="fa fa-briefcase nav-icon"></i>
                        <p>Careers</p>
                    </a>
                </li>
                {{--                @endcanany--}}

                @canany(['why choose create', 'why choose edit', 'why choose delete', 'why choose status'])
                    <li class="{{ getActiveClassByController('WhyChooseController') }} nav-item">
                        <a class="nav-link" href="{{ route('admin.why-chooses.index') }}">
                            <i class="fa fa-eye nav-icon"></i>
                            <p>Why Chooses</p>
                        </a>
                    </li>
                @endcanany

                @php($active_class2 = getActiveClassByController('SettingController')
                                    || getActiveClassByController('SocialController')
                                    || getActiveClassByController('ContactController')
                                    )

                @canany(['setting create', 'site title edit',  'setting edit', 'social create', 'social edit',
                         'social delete', 'social status', 'contact create', 'contact edit'
                        ])
                    <li class="nav-item">
                        <a href="#" class="nav-link  {{ $active_class2 ? 'activeMenu' : ''}}">
                            <i class="fa fa-cogs nav-icon"></i>
                            <p>Manage Setting<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview" style="display: {{ $active_class2 ? 'block' : '' }}">

                            @canany(['setting create', 'setting edit'])
                                <li class="nav-item {{ getActiveClassByController('SettingController') }}">
                                    <a class="nav-link" href="{{ route('admin.settings.index') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Settings</p>
                                    </a>
                                </li>
                            @endcanany

                            @canany(['social create', 'social edit', 'social delete', 'social status'])
                                <li class="{{ getActiveClassByController('SocialController') }} nav-item">
                                    <a class="nav-link" href="{{ route('admin.socials.index') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Socials</p>
                                    </a>
                                </li>
                            @endcanany

                            @canany(['site title edit'])
                                <li class="{{ getActiveClassByController('SiteTitleController') }} nav-item">
                                    <a class="nav-link" href="{{ route('admin.site.title.edit') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Site Titles</p>
                                    </a>
                                </li>
                            @endcanany

                            @canany(['contact create', 'contact edit'])
                                <li class="nav-item {{ getActiveClassByController('ContactController') }}">
                                    <a href="{{ route('admin.contacts.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contacts</p>
                                    </a>
                                </li>
                            @endcanany

                            <li class="nav-item {{ getActiveClassByController('TermsOfUseController') }}">
                                <a href="{{ route('admin.terms-of-use.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Terms Of Use</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endcanany

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


{{--<nav class="navbar-default navbar-static-side" role="navigation">--}}
{{--    <div class="sidebar-collapse">--}}
{{--        <ul class="nav metismenu" id="side-menu">--}}
{{--            <li class="nav-header">--}}
{{--                <div class="dropdown profile-element">--}}
{{--                    <img width="48" alt="image" class="rounded-circle"--}}
{{--                         src="{{ Auth::user()->image->url }}"/>--}}
{{--                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">--}}
{{--                        <span class="block m-t-xs font-bold">--}}
{{--                            @auth--}}
{{--                                {{ auth()->user()->name }}--}}
{{--                            @endauth--}}
{{--                        </span>--}}
{{--                        <span class="text-muted text-xs block">Administrator<b class="caret"></b></span>--}}
{{--                    </a>--}}
{{--                    <ul class="dropdown-menu animated fadeInRight m-t-xs">--}}
{{--                        <li><a class="dropdown-item" href="{{ route('admin.profile') }}">Profile</a></li>--}}
{{--                        <li class="dropdown-divider"></li>--}}
{{--                        <li>--}}
{{--                            <a class="dropdown-item" href="javascript:void(0)"--}}
{{--                               onclick="document.getElementById('logout-form').submit()">Logout</a>--}}
{{--                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"--}}
{{--                                  style="display: none;">--}}
{{--                                @csrf--}}
{{--                            </form>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="logo-element">--}}
{{--                    IN+--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            <li class="{{ getActiveClassByRoute('admin.dashboard') }}">--}}
{{--                <a href="{{ route('admin.dashboard') }}">--}}
{{--                    <i class="fa fa-th-large"></i>--}}
{{--                    <span class="nav-label">Dashboards</span>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="{{ getActiveClassByController('SlidersController') }}">--}}
{{--                <a href="{{ route('admin.sliders.index') }}"><i class="fa fa-photo"></i>--}}
{{--                    <span class="nav-label">Sliders</span>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="{{ getActiveClassByController('SettingController') }}">--}}
{{--                <a href="javascript:void(0)"><i class="fa fa-bar-chart-o"></i>--}}
{{--                    <span class="nav-label">Manage Settings</span>--}}
{{--                    <span class="fa arrow"></span>--}}
{{--                </a>--}}
{{--                <ul class="nav nav-second-level collapse">--}}
{{--                    <li><a href="{{ route('admin.settings.index') }}">Site Setting</a></li>--}}
{{--                    <li><a href="{{ route('admin.contacts.index') }}">Contact</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</nav>--}}
