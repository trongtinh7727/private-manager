<div class="modal fade text-left" id="ModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Edit User') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('machine.update', ['machine' => $machine->machine]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">code</i>
                        </span>
                        <div class="form-group">
                            <strong>{{ __('Mã máy game') }}:</strong>
                            {!! Form::text('machine', $machine->machine, [
                                'placeholder' => 'Name',
                                'class' => 'form-control',
                                'required' => 'true',
                            ]) !!}
                            <span class="material-input"></span>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">label</i>
                        </span>
                        <div class="form-group">
                            <strong>{{ __('Tên') }}:</strong>
                            {!! Form::text('name', $machine->name, [
                                'placeholder' => 'Name',
                                'class' => 'form-control',
                                'required' => 'true',
                            ]) !!}
                            <span class="material-input"></span>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">store</i>
                        </span>
                        <div class="form-group">
                            <strong>{{ __('Cửa hàng') }}:</strong>
                            {!! Form::text('store', $machine->store, [
                                'placeholder' => 'Name',
                                'class' => 'form-control',
                                'required' => 'true',
                            ]) !!}
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
</div>