<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ url('details/destroy') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Xóa chi tiết hóa đơn</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="detail_id" id="detail_id">
                    Nếu xóa thì không thể khôi phục đâu á. Chắc chưa?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
