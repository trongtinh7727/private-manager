<div class="modal fade text-left" id="ModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Edit User') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store.update', $store) }}" id="form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="id" name="id">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">store</i>
                        </span>
                        <div class="form-group">
                            <strong>{{ __('Tên cửa hàng') }}:</strong>
                            {!! Form::text('name', null, [
                                'placeholder' => 'Name',
                                'class' => 'form-control',
                                'required' => 'true',
                                'id' => 's_name',
                            ]) !!}
                            <span class="material-input"></span>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">store</i>
                        </span>
                        <div class="form-group">
                            <strong>{{ __('Địa chỉ') }}:</strong>
                            {!! Form::text('address', null, [
                                'placeholder' => 'Name',
                                'class' => 'form-control',
                                'required' => 'true',
                                'id' => 's_address',
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
<script>
    $(document).on('click', '.open_modal', function() {
        var url = "stores/edit";
        var store = $(this).val();
        var action = "{{ route('store.update', ['store' => '1']) }}"

        $.ajax({
            type: 'get',
            url: url + '/' + store,
            success: function(data) {
                //success data
                console.log(data);
                $('#id').val(data.id);
                $('#s_address').val(data.address);
                $('#s_name').val(data.name);
                $('#form').attr('action', action.substring(0, action.length - 1) + data
                    .id);
                $('#ModalEdit').modal('show');
            }
        });
    });
</script>
