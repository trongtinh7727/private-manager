<div class="modal fade text-left" id="ModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Edit Detail') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <form id="e_form" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row input-group">
                        <div class="col-md-4 col-md-offset-1">
                            <strong>{{ __('Mã máy') }}:</strong>
                            <input type="text" name="machine_id" id="machine_id" disabled>
                        </div>
                        <div class="col-md-4 col-md-offset-1">
                            <strong>{{ __('Ngày') }}:</strong>
                            <input type="text" name="date" id="e_date" disabled>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">east</i>
                        </span>
                        <div class="form-group">
                            <strong>{{ __('Điểm vào') }}:</strong>
                            <input class="form-control" name="entry_point" id="e_entry_point" type="text"
                                required="true" aria-required="true">
                            <span class="material-input"></span>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">west</i>
                        </span>
                        <div class="form-group">
                            <strong>{{ __('Điểm ra') }}:</strong>
                            <input class="form-control" name="exit_point" id="e_exit_point" type="text"
                                required="true" aria-required="true">
                            <span class="material-input"></span>
                        </div>
                        <input name="employee_id" type="hidden">
                        <input class="form-control" name="machine_id" id="e_machine" type="hidden">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">description</i>
                        </span>
                        <div class="form-group">
                            <strong>{{ __('Giờ KM + Tên') }}:</strong>
                            <input class="form-control" name="note" id="e_note" type="text">
                            <span class="material-input"></span>
                        </div>
                    </div>
                    <input type="hidden" id="id" name="id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '.open_modal', function() {
        var url = "details/edit";
        var detail = $(this).val();
        var action = "{{ route('detail.update', ['detail' => '1']) }}"
        $.ajax({
            type: 'get',
            url: url + '/' + detail,
            data: {
                '_token': CSRF_TOKEN,
            },
            success: function(data) {
                console.log(data);
                $('#id').val(data.id);
                $('#machine_id').val(data.machine_id);
                $('#e_date').val(data.created_at);
                $('#e_entry_point').val(data.entry_point);
                $('#e_exit_point').val(data.exit_point);
                $('#e_note').val(data.note);
                $('#e_form').attr('action', action.substring(0, action.length - 1) + data.id);
                $('#ModalEdit').modal('show');
            }
        });
    });
</script>
