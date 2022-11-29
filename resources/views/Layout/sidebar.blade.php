<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="../../assets/img/sidebar-1.jpg">
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="../../assets/img/faces/marc.jpg" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        {{ Auth::user()->name }}
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="{{ route('profile') }}">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span class="sidebar-mini"> L </span>
                                <span class="sidebar-normal"> Logout </span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="" id="home">
                <a href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            @hasrole(['SupperAdmin'])
                <li class="" id="store">
                    <a href="{{ route('store.index') }}">
                        <i class="material-icons">store</i>
                        <p> Cửa Hàng</p>
                    </a>
                </li>
            @endhasrole
            @hasrole(['Admin', 'SupperAdmin'])
                <li class="" id="employee">
                    <a href="{{ route('employee.index') }}">
                        <i class="material-icons">badge</i>
                        <p> Nhân viên </p>
                    </a>
                </li>

                <li class="" id="machine">
                    <a href="{{ route('machine.index') }}">
                        <i class="material-icons">sports</i>
                        <p> Máy game</p>
                    </a>
                </li>
            @else
            @endhasrole

            <li class="" id="detail">
                <a href="{{ route('detail.index') }}">
                    <i class="material-icons">paid</i>
                    <p>Thống kê</p>
                </a>
            </li>
        </ul>
    </div>
</div>
