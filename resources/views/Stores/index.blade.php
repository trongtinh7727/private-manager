<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Quản Lý Cửa Hàng</title>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Cửa Hàng</h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#modalCreate">
                                            <span class="btn-label">
                                                <i class="material-icons">add</i>
                                            </span>
                                            Thêm
                                        </button>
                                        @include('stores.modal.create')
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                            cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Mã cửa hàng</th>
                                                    <th>Tên cửa hàng</th>
                                                    <th>Địa chỉ</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Mã cửa hàng</th>
                                                    <th>Tên cửa hàng</th>
                                                    <th>Địa chỉ</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach ($stores as $store)
                                                    <tr>
                                                        <td>{{ $store->id }}</td>
                                                        <td>{{ $store->name }}</td>
                                                        <td>{{ $store->address }}</td>
                                                        <td class="text-right">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#ModalEdit"
                                                                class="btn btn-simple btn-warning btn-icon edit">
                                                                <i class="material-icons">dvr</i>
                                                            </a>
                                                            <form style="display: inline"
                                                                action="{{ route('store.destroy', $store) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button href=""
                                                                    class="btn btn-simple btn-danger btn-icon remove">
                                                                    <i class="material-icons">close</i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                        @include('stores.modal.edit')
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                        <!-- end col-md-12 -->
                    </div>
                    <!-- end row -->
                </div>
            </div>

        </div>
    </div>
</body>
@include('footer')
<script type="text/javascript">
    document.getElementById("store").classList.add("active");
    $(document).ready(function() {
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
    });

    $(document).ready(function() {
        demo.initMaterialWizard();
        setTimeout(function() {
            $('.card.wizard-card').addClass('active');
        }, 600);
    });
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 5, 50, 10],
                [10, 25, 5, "All"]
            ],
            "columns": [{
                    "width": "20%"
                },
                {
                    "width": "10%"
                },
                {
                    "width": "20%"
                },
                {
                    "width": "20%"
                }
            ],
            'thead': {
                'tr': {
                    'background-color': 'blue'
                }
            },
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });
        var table = $('#datatables').DataTable();
        //Like record

        table.on('click', '.remove', function(e) {
            alter('aaaaa');

        });

        $('.card .material-datatables label').addClass('form-group');
    });
</script>

</html>
