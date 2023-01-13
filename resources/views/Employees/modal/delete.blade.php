<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form style="display: inline" action="{{ route('employee.destroy', ['employee' => $user ?? '0']) }}"
                method="POST">
                <div class="modal-header">
                    @csrf
                    @method('DELETE')
                    <h5 class="modal-title" id="deleteModalLabel">Xóa Nhân viên</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="" id="employee_id" name="id">
                    Nếu xóa thì không thể khôi phục đâu á. Chắc chưa?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
