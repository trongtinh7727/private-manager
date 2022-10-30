<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Material Dashboard Pro by Creative Tim</title>
    @include('header')
</head>

<body>
    <div class="wrapper">
        @include('sidebar')
        <div class="main-panel">
            @include('headerbar')
            <!-- TODO: Content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="wizard-container">
                        <div class="card wizard-card active" data-color="rose" id="wizardProfile">
                            <form action="{{ route('employee.store') }}" method="POST" novalidate="novalidate">
                                @csrf
                                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                        Thêm nhân viên
                                    </h3>
                                </div>
                                <div class="wizard-navigation">
                                    <ul class="nav nav-pills">
                                        <li class="active" style="width: 33.3333%;">
                                            <a href="#about" data-toggle="tab" aria-expanded="true">About</a>
                                        </li>
                                        <li style="width: 33.3333%;">
                                            <a href="#account" data-toggle="tab">Account</a>
                                        </li>
                                        <li style="width: 33.3333%;">
                                            <a href="#address" data-toggle="tab">Address</a>
                                        </li>
                                    </ul>
                                    <div class="moving-tab"
                                        style="width: 260.221px; transform: translate3d(-8px, 0px, 0px); transition: all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1) 0s;">
                                        About</div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="about">
                                        <div class="row">

                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">face</i>
                                                    </span>
                                                    <div class="form-group label-floating is-empty">
                                                        <strong>{{ __('Full Name') }}:</strong>

                                                        <input name="name" type="text" class="form-control"
                                                            required="true" aria-required="true"
                                                            value="{{ old('name') }}">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="input-group">

                                                    <span class="input-group-addon">
                                                        <i class="material-icons">today</i>
                                                    </span>
                                                    <div class="form-group">
                                                        <strong>{{ __('BirthDay') }}:</strong>
                                                        <input type="text" class="form-control datetimepicker"
                                                            name="birthday" value="{{ old('birthday') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="account">

                                        <div class="row">
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <div class="col-sm-6">
                                                    <div class="form-group label-floating is-empty">
                                                        <strong>{{ __('Email Address') }}:</strong>
                                                        <input class="form-control" name="email" type="email"
                                                            required="true" aria-required="true"
                                                            value="{{ old('email') }}">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group label-floating is-empty">
                                                        <strong>{{ __('Password') }}:</strong>
                                                        <input class="form-control" name="password"
                                                            id="registerPassword" type="password" required="true"
                                                            aria-required="true">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group label-floating is-empty">
                                                        <strong>{{ __('Confirm Password') }}:</strong>
                                                        <input class="form-control" name="password_confirmation"
                                                            id="registerPasswordConfirmation" type="password"
                                                            required="true" equalto="#registerPassword"
                                                            aria-required="true">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group label-floating is-empty">
                                                        <strong>{{ __('Vai trò') }}:</strong>
                                                        <input class="form-control" name="level" type="text"
                                                            required="true" aria-required="true"
                                                            value="{{ old('level') }}">
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="address">
                                        <div class="row">
                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating is-empty">
                                                    <strong>{{ __('Address') }}:</strong>
                                                    <input type="text" class="form-control" name="address"
                                                        value="{{ old('address') }}">
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-7 col-sm-offset-1">
                                                <div class="form-group label-floating is-empty">
                                                    <strong>{{ __('Store') }}:</strong>
                                                    <input class="form-control" name="store" id="store"
                                                        type="text" required="true" aria-required="true"
                                                        value="{{ old('store') }}">
                                                    <span class="material-input"></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type="button" class="btn btn-next btn-fill btn-rose btn-wd"
                                            name="next" value="Next">
                                        <input type="submit" class="btn btn-finish btn-fill btn-rose btn-wd"
                                            name="finish" value="Finish" style="display: none;">

                                    </div>
                                    <div class="pull-left">
                                        <input type="button"
                                            class="btn btn-previous btn-fill btn-default btn-wd disabled"
                                            name="previous" value="Previous">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>

        </div>
    </div>
</body>
@include('footer')
<script type="text/javascript">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            demo.showNotification('top', 'center', '{{ $error }}', 'danger');
        @endforeach
    @endif

    $('.datetimepicker').datetimepicker({
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
        }
    });

    $(document).ready(function() {
        demo.initMaterialWizard();
        setTimeout(function() {
            $('.card.wizard-card').addClass('active');
        }, 600);
    });
</script>

</html>
