<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Profile</title>
    @include('Layout.header')
</head>

<body>
    <div class="wrapper">
        @include('Layout.sidebar')
        <div class="main-panel">
            @include('Layout.headerbar')
            <!-- TODO: Content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <a href="#pablo">
                                        <img class="img" src="../../assets/img/faces/marc.jpg" />
                                    </a>
                                </div>
                                <div class="card-content">
                                    <h6 class="category text-gray">
                                        @hasrole(['Admin', 'SupperAdmin'])
                                            {{ 'Quản lý' }}
                                        @else
                                            {{ 'Nhân viên' }}
                                        @endhasrole
                                    </h6>
                                    <h4 class="card-title">{{ Auth::user()->name }}</h4>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Cửa hàng (disabled)</label>
                                                <input type="text" class="form-control"
                                                    value="{{ Auth::user()->employee->store->name ?? ' ' }}" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Email address</label>
                                                <input type="email" class="form-control"
                                                    value="{{ Auth::user()->email }}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Địa chỉ cửa hàng</label>
                                                @hasrole(['SupperAdmin'])
                                                @else
                                                    <input type="text" class="form-control" disabled
                                                        value="{{ Auth::user()->employee->store->address ?? '' }}">
                                                @endhasrole
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Địa chỉ</label>
                                                <input type="text" class="form-control"
                                                    value="{{ Auth::user()->employee->address ?? '' }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@include('Layout.footer')
<script type="text/javascript"></script>

</html>
