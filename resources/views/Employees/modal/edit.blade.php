<div class="modal fade text-left" id="ModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Edit User') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="form" action="" method="post" enctype="multipart/form-data"
                    onsubmit=" validateMyForm();">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="id" name="id">
                    <div class="form-group label-floating is-empty">
                        <strong>{{ __('Full Name') }}:</strong>
                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'id' => 'name']) !!}
                        <span class="material-input"></span>
                    </div>
                    <div class="input-group">
                        <div class="form-group">
                            <strong>{{ __('Ngày Sinh') }}:</strong>
                            {!! Form::text('birthday', null, [
                                'placeholder' => 'Name',
                                'class' => 'form-control datetimepicker',
                                'id' => 'birthday',
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group label-floating is-empty">
                        <strong>{{ __('Email Address') }}:</strong>
                        {!! Form::text('email', null, [
                            'placeholder' => 'Name',
                            'class' => 'form-control',
                            'type' => 'email',
                            'id' => 'email',
                        ]) !!}

                        <span class="material-input"></span>
                    </div>
                    <div class="form-group label-floating is-empty">
                        <label class="control-label">
                            Password
                            <small>*</small>
                        </label>
                        <input class="form-control" name="password" id="registerPassword" type="password"
                            required="true" aria-required="true">
                        <span class="material-input"></span>
                    </div>
                    <input type="hidden" name="store_id" id="store_in">
                    <div class="form-group label-floating is-empty">
                        <strong>{{ __('Cửa hàng') }}:</strong>
                        <div class="btn-group bootstrap-select show-tick open">
                            <select class="store selectpicker" data-style="select-with-transition" title="Chọn cửa hàng"
                                data-size="7" tabindex="-98" id="store_sl">
                                <option disabled="">Chọn cửa hàng</option>
                                @foreach ($stores as $store)
                                    {{ $store->id }}
                                    <option value="{{ $store->id }}">
                                        {{ $store->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit" onclick="fill()">
                        <span class="btn-label">
                        </span>
                        Sửa
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.open_modal', function() {
        var url = "employees/edit/";
        var employee = $(this).val();
        var action = "{{ route('employee.update', ['employee' => '1']) }}"
        $.ajax({
            type: 'get',
            url: url + employee,
            success: function(data) {
                console.log(data);
                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#birthday').val(data.birthday);
                $('#email').val(data.email);
                $('#store_sl').val(data.store_id).trigger("change");
                $('#form').attr('action', action.substring(0, action.length - 1) + data
                    .id);
                $('#ModalEdit').modal('show');
            }
        });
    });

    function fill() {
        $('#store_in').val($('#store_sl').val())
    }
</script>
