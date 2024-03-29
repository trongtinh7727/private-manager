<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
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
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Máy game</h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#modalCreate">
                                            <span class="btn-label">
                                                <i class="material-icons">add</i>
                                            </span>
                                            Thêm
                                        </button>
                                        @include('Machines.modal.create')
                                    </div>
                                    <div class="material-datatables">
                                        @if (session()->has('message'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session()->get('message') }}
                                            </div>
                                        @endif
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                            cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#Mã máy</th>
                                                    <th>Tên máy</th>
                                                    <th>Cửa hàng</th>

                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>#Mã máy</th>
                                                    <th>Tên máy</th>
                                                    <th>Cửa hàng</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach ($machines as $machine)
                                                    <tr>
                                                        <td>{{ $machine->id }}</td>
                                                        <td>{{ $machine->name }}</td>
                                                        <td>{{ $machine->store->name }}</td>
                                                        <td class="text-right">
                                                            <button
                                                                class="btn btn-simple btn-warning btn-icon edit open_modal"
                                                                value="{{ $machine->id }}">
                                                                <i class="material-icons">dvr</i>
                                                            </button>
                                                            <button href="" value="{{ $machine->id }}"
                                                                class="btn btn-simple btn-danger btn-icon delete_e">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </td>
                                                        @include('Machines.modal.edit')
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @include('Machines.modal.delete')
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
@include('Layout.footer')
<script type="text/javascript">
    document.getElementById("machine").classList.add("active");
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

        $('.card .material-datatables label').addClass('form-group');
    });
    $(document).on('click', '.delete_e', function(e) {
        e.preventDefault();
        var machine = $(this).val();
        $('#machine_id').val(machine)
        $('#deleteModal').modal('show')
    });
</script>

</html>
