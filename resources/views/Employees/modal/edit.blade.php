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
                <form action="{{ route('employee.update', ['employee' => $employee->email]) }}" method="post"
                    enctype="multipart/form-data" onsubmit=" validateMyForm();">
                    @csrf
                    @method('PUT')
                    <div class="form-group label-floating is-empty">
                        <strong>{{ __('Full Name') }}:</strong>
                        {!! Form::text('name', $employee->name, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                        <span class="material-input"></span>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">today</i>
                        </span>
                        <div class="form-group">
                            <strong>{{ __('Ngày Sinh') }}:</strong>
                            {!! Form::text('birthday', $employee->birthday, [
                                'placeholder' => 'Name',
                                'class' => 'form-control datetimepicker',
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group label-floating is-empty">
                        <strong>{{ __('Email Address') }}:</strong>
                        {!! Form::text('email', $employee->email, [
                            'placeholder' => 'Name',
                            'class' => 'form-control',
                            'type' => 'email',
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
                    <button class="btn btn-success" type="submit">
                        <span class="btn-label">
                        </span>
                        Sửa
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
