    @php($i = 1)
    @foreach ($users as $user)
        <div class="modal fade text-left" id="ModalEdit{{ $i }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <form id="form" action="{{ route('employee.update', $user) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- <input type="hidden" id="id" name="id"> --}}
                            <div class="form-group label-floating is-empty">
                                <strong>{{ __('Name') }}:</strong>
                                {!! Form::text('name', $user->name, ['placeholder' => 'Name', 'class' => 'form-control', 'id' => 'name']) !!}
                                <span class="material-input"></span>
                            </div>
                            <div class="form-group label-floating is-empty">
                                <strong>{{ __('Email Address') }}:</strong>
                                {!! Form::text('email', $user->email, [
                                    'placeholder' => 'Name',
                                    'class' => 'form-control',
                                    'type' => 'email',
                                    'id' => 'email',
                                ]) !!}
                                <span class="material-input"></span>
                            </div>
                            <div class="form-group label-floating is-empty">
                                <strong>{{ __('Vai trò') }}:</strong>
                                <div class="btn-group bootstrap-select show-tick open">
                                    <select name="role_id" class="store selectpicker"
                                        data-style="select-with-transition" title="Chọn vai trò" data-size="7"
                                        tabindex="-98" id="role_sl{{ $i }}">
                                        <option disabled="">Chọn vai trò</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                @hasrole($role)
                                                selected
                                                @endhasrole>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="store_id" id="store_in{{ $i }}">
                            <input type="hidden" name="role_id" id="role_in{{ $i }}">
                            <div class="form-group label-floating is-empty">
                                <strong>{{ __('Cửa hàng') }}:</strong>
                                <div class="btn-group bootstrap-select show-tick open">
                                    @hasrole(['SupperAdmin'])
                                        <select class="store selectpicker" name="store_id"
                                            data-style="select-with-transition" title="Chọn cửa hàng" data-size="7"
                                            tabindex="-98" id="store_sl{{ $i }}">
                                            <option disabled="">Chọn cửa hàng</option>
                                            @foreach ($stores as $store)
                                                <option value="{{ $store->id }}">{{ $store->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select class="store selectpicker" name="store_id" id="store_sl{{ $i }}"
                                            data-style="select-with-transition" title="Chọn cửa hàng" data-size="7"
                                            tabindex="-98">
                                            <option value="{{ Auth::user()->employee->store->id }}" selected>
                                                {{ Auth::user()->employee->store->name }}</option>
                                        </select>
                                    @endhasrole
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit" onclick="fill{{ $i }}()">
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
            function fill{{ $i }}() {
                $('#role_in{{ $i }}').val($('#role_sl{{ $i }}').val())
                $('#store_in{{ $i }}').val($('#store_sl{{ $i++ }}').val())
            }
        </script>
    @endforeach
