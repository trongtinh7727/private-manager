<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm máy</h5>
            </div>
            <div class="modal-body">
                <form id="createForm" name="createForm" action="{{ route('detail.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">code</i>
                        </span>
                        <div class="form-group">
                            <strong>{{ __('Mã máy') }}:</strong>
                            <input class="form-control" name="machine" id="machine" type="text" required="true"
                                aria-required="true">
                            <span class="material-input"></span>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">east</i>
                        </span>
                        <div class="form-group">
                            <strong>{{ __('Điểm vào') }}:</strong>
                            <input class="form-control" name="entry_point" id="entry_point" type="text"
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
                            <input class="form-control" name="exit_point" id="exit_point" type="text" required="true"
                                aria-required="true">
                            <span class="material-input"></span>
                        </div>
                        <input id="store" name="store" type="hidden">
                        <input id="date" name="date" type="hidden">
                        <input name="email" type="hidden">
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
<script>
    $('#createForm').on('submit', function() {
        document.createForm.store.value = $(".store.selectpicker").val()
        document.createForm.date.value = $("#date").val()
        document.createForm.email.value = "trongtinh7727@gmail.com"
        return true;
    });
</script>
