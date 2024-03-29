<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Quản Lý Cửa Hàng</title>
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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Báo cáo tổng hợp</h4>
                                    <div class="table-responsive">
                                        <div class="toolbar" style="min-height: 150px">
                                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                                            <div class=" col-sm-2">
                                                <div class="btn-group bootstrap-select show-tick open">
                                                    @hasrole(['SupperAdmin'])
                                                        <select class="store selectpicker"
                                                            data-style="select-with-transition" title="Chọn cửa hàng"
                                                            data-size="7" tabindex="-98">
                                                            <option disabled="">Chọn cửa hàng</option>
                                                            @foreach ($stores as $store)
                                                                <option value="{{ $store->id }}">{{ $store->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        <select class="store selectpicker"
                                                            data-style="select-with-transition" title="Chọn cửa hàng"
                                                            data-size="7" tabindex="-98">
                                                            <option value="{{ Auth::user()->employee->store->id }}"
                                                                selected>
                                                                {{ Auth::user()->employee->store->name }}</option>
                                                        </select>
                                                    @endhasrole
                                                </div>
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <input type="text" class="form-control datepicker" id="date"
                                                    value="{{ date('Y/m/d') }}">
                                                <span class="material-input"></span>
                                            </div>
                                            {{-- TODO:  --}}
                                            <div class="col-xs-16 form-group" style="display: flex">
                                                <a href="#">
                                                    <button class="btn btn-info" id="search">
                                                        <span class="btn-label">
                                                            <i class="material-icons">
                                                                search
                                                            </i>
                                                        </span>
                                                        Tra cứu
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="col-xs-16 form-group" style="display: flex">
                                                <a href="#">
                                                    <button class="btn btn-success" data-toggle="modal"
                                                        data-target="#modalCreate">
                                                        <span class="btn-label">
                                                            <i class="material-icons">add</i>
                                                        </span>
                                                        Thêm
                                                    </button>
                                                </a>
                                                <form action="{{ route('detail.export') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="store" id="ex_store">
                                                    <input type="hidden" name="date" id="ex_date">
                                                    <button type="submit" class="btn btn-success export">
                                                        <span class="btn-label">
                                                            <i class="material-icons">add</i>
                                                        </span>
                                                        Xuất File Excel
                                                    </button>
                                                </form>
                                            </div>
                                            @include('Details.modal.create')
                                            @include('Details.modal.edit')
                                        </div>

                                        <table class="table">
                                            @if (session()->has('message'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session()->get('message') }}
                                                </div>
                                            @endif
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Danh mục</th>
                                                    <th>Điểm vào</th>
                                                    <th>Điểm ra</th>
                                                    <th>Điểm lời mới</th>
                                                    <th>Điểm lời cũ</th>
                                                    <th>TC Thành Tiền</th>
                                                    <th>Giờ KM + Ten</th>
                                                    @hasrole(['SupperAdmin', 'Admin'])
                                                        <th class="text-center">Log</th>
                                                    @endhasrole
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--  end card  -->
                        </div>
                        <!-- end col-md-12 -->
                        
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="blue">
                                <i class="material-icons">timeline</i>
                            </div>
                            <div class="card-content">
                                <h4 class="card-title"> Phân phối điểm vào
                                    <small> - Rounded</small>
                                </h4>
                            </div>
                            <canvas id="colouredBarsChart" class="ct-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
@include('Layout.footer')
@include('Details.modal.delete')
<script type="text/javascript">
    document.getElementById("detail").classList.add("active");
    demo.initFormExtendedDatetimepickers()
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $('#search').on('click', function() {
        $.ajax({
            type: 'post',
            url: '{{ route('detail.getdetails') }}',
            data: {
                '_token': CSRF_TOKEN,
                'store': $(".store.selectpicker").val(),
                'date': $("#date").val()
            },
            success: function(data) {
                 console.log(data);
                $('tbody').html(data['trans']);
                datasets = data['datasets'];
                labels = data['labels'];
                const ctx = document.getElementById('colouredBarsChart');
                data = [];
                datasets.forEach(dataset => {
                    data.push({
                        label: dataset[0],
                        data: dataset[1],
                        borderWidth: 1
                    })
                });
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: data,
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        });
    })
    $(document).on('click', '.delete_e', function(e) {
        e.preventDefault();
        var detail = $(this).val();
        $('#detail_id').val(detail)
        $('#deleteModal').modal('show')
    });
    $(document).on('click', '.export', function(e) {
        $('#ex_store').val($(".store.selectpicker").val());
        $('#ex_date').val($("#date").val());
        return true;
    });
</script>

</html>
