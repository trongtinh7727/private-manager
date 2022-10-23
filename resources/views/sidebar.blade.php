<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="../../assets/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->

    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="../../assets/img/faces/avatar.jpg" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        User name
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#">
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
                            <a href="#">
                                <span class="sidebar-mini"> S </span>
                                <span class="sidebar-normal"> Settings </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li>
                <a href="#" class="" id="Dashboard">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            <li class="" id="employee">
                <a href="{{ route('employee.index') }}">
                    <i class="material-icons">badge</i>
                    <p> Nhân viên </p>
                </a>
            </li>
            <li class="" id="store">
                <a href="{{ route('store.index') }}">
                    <i class="material-icons">store</i>
                    <p> Cửa Hàng</p>
                </a>
            </li>
            <li class="" id="machine">
                <a href="{{ route('machine.index') }}">
                    <i class="material-icons">sports</i>
                    <p> Máy game</p>
                </a>
            </li>
        </ul>
    </div>
</div>
