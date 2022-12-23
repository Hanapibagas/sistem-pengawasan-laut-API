<div class="header">
    <div class="logo logo-dark">
        <a href="index.html">
            <img src="{{ asset('admin/images/logo/1-removebg-preview.png') }}" style="width: 110px; margin-top: -5px" alt="Logo">
            {{-- <img class="logo-fold" src="{{ asset('admin/images/logo/download-removebg-preview.png') }}"  style="width: 70px; margin-top: 10px; margin-left: 5px" alt="Logo"> --}}
        </a>
    </div>
    <div class="logo logo-white">
        <a href="index.html">
            <img src="{{ asset('admin/images/logo/1-removebg-preview.png') }}" style="width: 110px; margin-top: -5px" alt="Logo">
            {{-- <img class="logo-fold" src="{{ asset('admin/images/logo/1.jpeg') }}" alt="Logo"> --}}
        </a>
    </div>
    <div class="nav-wrap">
        <ul class="nav-left">
            <li class="desktop-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon"></i>
                </a>
            </li>
            <li class="mobile-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon"></i>
                </a>
            </li>
        </ul>
        <ul class="nav-right">
            <li class="dropdown dropdown-animated scale-left">
                <div class="dropdown-menu pop-notification">
                    <div class="relative">
                        <div class="overflow-y-auto relative scrollable" style="max-height: 300px">
                            <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                <div class="d-flex">
                                    <div class="avatar avatar-blue avatar-icon">
                                        <i class="anticon anticon-mail"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-dark">You received a new message</p>
                                        <p class="m-b-0"><small>8 min ago</small></p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                <div class="d-flex">
                                    <div class="avatar avatar-cyan avatar-icon">
                                        <i class="anticon anticon-user-add"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-dark">New user registered</p>
                                        <p class="m-b-0"><small>7 hours ago</small></p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item d-block p-15 border-bottom">
                                <div class="d-flex">
                                    <div class="avatar avatar-red avatar-icon">
                                        <i class="anticon anticon-user-add"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-dark">System Alert</p>
                                        <p class="m-b-0"><small>8 hours ago</small></p>
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item d-block p-15 ">
                                <div class="d-flex">
                                    <div class="avatar avatar-gold avatar-icon">
                                        <i class="anticon anticon-user-add"></i>
                                    </div>
                                    <div class="m-l-15">
                                        <p class="m-b-0 text-dark">You have a new update</p>
                                        <p class="m-b-0"><small>2 days ago</small></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="dropdown dropdown-animated scale-left">
                <div class="pointer" data-toggle="dropdown">
                    <div class="avatar avatar-image  m-h-10 m-r-15">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" height="60" class="rounded-circle"/>
                        {{-- <img class="img-profile rounded-circle" src="{{ asset('admin/images/avatars/undraw_posting_photo.svg') }}"> --}}
                    </div>
                </div>
                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                    <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                        <div class="d-flex m-r-50">
                            {{-- <div class="avatar avatar-lg avatar-image"> --}}
                                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" height="60" class="rounded-circle"/>
                                {{-- <img style="width: 40%" class="img-profile rounded-circle" src="{{ asset('admin/images/avatars/undraw_posting_photo.svg') }}">
                            </div> --}}
                            <div class="m-l-10">
                                <p class="m-b-0 text-dark font-weight-semibold">{{ Auth::user()->name }}</p>
                                {{-- <img style="width: 40%; height: 50px;"  class="img-profile rounded-circle" src="{{ asset('admin/images/avatars/undraw_posting_photo.svg') }}"> --}}
                                <p class="m-b-0 opacity-07">ADMIN</p>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" href="#" type="submit">
                                        <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                </div>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">
                    <i class="anticon anticon-appstore"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
