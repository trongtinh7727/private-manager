<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('machine.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">store</i>
                        </span>
                        <div class="form-group">
                            @hasrole(['SupperAdmin'])
                                <select class="store selectpicker" name="store_id" data-style="select-with-transition"
                                    title="Chọn cửa hàng" data-size="7" tabindex="-98">
                                    <option disabled="">Chọn cửa hàng</option>
                                    @foreach ($stores as $store)
                                        <option value="{{ $store->id }}">{{ $store->name }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <select class="store selectpicker" name="store_id" data-style="select-with-transition"
                                    title="Chọn cửa hàng" data-size="7" tabindex="-98">
                                    <option value="{{ Auth::user()->employee->store->id }}" selected>
                                        {{ Auth::user()->employee->store->name }}</option>
                                </select>
                            @endhasrole
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">label</i>
                        </span>
                        <div class="form-group">
                            <strong>{{ __('Tên máy') }}:</strong>
                            <input class="form-control" name="name" id="name" type="text" required="true"
                                aria-required="true">
                            <span class="material-input"></span>
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
