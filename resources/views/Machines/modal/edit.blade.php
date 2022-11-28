<div class="modal fade text-left" id="ModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Edit User') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" id="form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" name="store_id" id="store_in">
                    <div class="form-group label-floating is-empty">
                        <strong>{{ __('Full Name') }}:</strong>
                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'id' => 'm_name']) !!}
                    </div>

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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="fill()">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<script>
    $(document).on('click', '.open_modal', function() {
        var url = "machines/edit";
        var machine = $(this).val();
        var action = "{{ route('machine.update', ['machine' => '1']) }}"

        $.ajax({
            type: 'get',
            url: url + '/' + machine,
            success: function(data) {
                //success data
                console.log(data);
                $('#id').val(data.id);
                $('#m_name').val(data.name);
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
