<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form style="display: inline" action="{{ route('machine.destroy', ['machine' => $machine ?? '0']) }}"
                method="POST">
                <div class="modal-header">
                    @csrf
                    @method('DELETE')
                    <h5 class="modal-title" id="deleteModalLabel">Xóa máy game</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="" id="machine_id" name="id">
                    Nếu xóa thì không thể khôi phục đâu á. Chắc chưa?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
