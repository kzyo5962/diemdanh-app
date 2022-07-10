<!-- Delete Modal-->
<div class="modal fade" id="deletedteacherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn chắc chắn muốn
                    xóa {{ $subject }}?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Thông tin {{ $subject }}: <br />
                <strong>{{ $teacher->fullName }}</strong> thuộc quản lý của giáo vụ
                <strong>{{ $teacher->supervisor->fullName }}</strong>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                <form action="{{ route('teachers.destroy', ['teacher' => $teacher]) }}" class="d-inline"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Đồng ý</button>
                </form>
            </div>
        </div>
    </div>
</div>
