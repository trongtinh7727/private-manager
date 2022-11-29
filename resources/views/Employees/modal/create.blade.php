<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">face</i>
                                </span>
                                <div class="form-group label-floating is-empty">
                                    <strong>{{ __('Full Name') }}:</strong>
                                    <input name="name" type="text" class="form-control" required="true"
                                        aria-required="true" value="{{ old('name') }}">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">today</i>
                                </span>
                                <div class="form-group">
                                    <strong>{{ __('BirthDay') }}:</strong>
                                    <input type="text" class="form-control datetimepicker" name="birthday"
                                        value="{{ old('birthday') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div class="col-sm-6">
                                <div class="form-group label-floating is-empty">
                                    <strong>{{ __('Email Address') }}:</strong>
                                    <input class="form-control" name="email" type="email" required="true"
                                        aria-required="true" value="{{ old('email') }}">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group label-floating is-empty">
                                    <strong>{{ __('Password') }}:</strong>
                                    <input class="form-control" name="password" id="registerPassword" type="password"
                                        required="true" aria-required="true">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group label-floating is-empty">
                                    <strong>{{ __('Confirm Password') }}:</strong>
                                    <input class="form-control" name="password_confirmation"
                                        id="registerPasswordConfirmation" type="password" required="true"
                                        equalto="#registerPassword" aria-required="true">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group label-floating is-empty">
                                    <strong>{{ __('Vai trò') }}:</strong>
                                    <input class="form-control" name="level" type="text" required="true"
                                        aria-required="true" value="{{ old('level') }}">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-7 col-sm-offset-1">
                            <div class="form-group label-floating is-empty">
                                <strong>{{ __('Address') }}:</strong>
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                                <span class="material-input"></span>
                            </div>
                        </div>
                        <div class="col-sm-7 col-sm-offset-1">
                            <div class=" col-sm-7">
                                <div class="btn-group bootstrap-select show-tick open">

                                    @hasrole(['SupperAdmin'])
                                        <select class="store selectpicker" name="store_id"
                                            data-style="select-with-transition" title="Chọn cửa hàng" data-size="7"
                                            tabindex="-98">
                                            <option disabled="">Chọn cửa hàng</option>
                                            @foreach ($stores as $store)
                                                <option value="{{ $store->id }}">{{ $store->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select class="store selectpicker" name="store_id"
                                            data-style="select-with-transition" title="Chọn cửa hàng" data-size="7"
                                            tabindex="-98">
                                            <option value="{{ Auth::user()->employee->store->id }}" selected>
                                                {{ Auth::user()->employee->store->name }}</option>
                                        </select>
                                    @endhasrole
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
