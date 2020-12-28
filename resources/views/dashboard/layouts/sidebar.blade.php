<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('design/dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('design/dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth('admin')->user()->name}}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{__('admin.admin')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('moderator.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.show_all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('moderator.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.add')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                                   {{__('admin.users')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('user.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.show_all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.index')}}?level=user" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> {{__('admin.user')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.index')}}?level=vendor" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.vendor')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.index')}}?level=company" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.company')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.add')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{__('admin.countries')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('country.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.show_all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('country.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.add')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{__('admin.cities')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('city.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> {{__('admin.show_all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('city.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.add')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{__('admin.states')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('state.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.show_all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('state.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.add')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{__('admin.department')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('department.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.show_all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('department.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.add')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{__('admin.trademarks')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('trademarks.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.show_all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('trademarks.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.add')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{__('admin.manufacturers')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('manufacturers.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.show_all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('manufacturers.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.add')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{__('admin.shipping')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('shipping.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.show_all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('shipping.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.add')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{__('admin.malls')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('malls.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.show_all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('malls.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.add')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{__('admin.colors')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('colors.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.show_all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('colors.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.add')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{__('admin.sizes')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('sizes.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.show_all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('sizes.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.add')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{__('admin.weights')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('weights.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.show_all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('weights.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.add')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{__('admin.products')}}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('products.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.show_all')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('products.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('admin.add')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="{{route('setting.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-chalkboard"></i>
                        <p>
                            {{__('admin.settings')}}

                        </p>
                    </a>

                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
