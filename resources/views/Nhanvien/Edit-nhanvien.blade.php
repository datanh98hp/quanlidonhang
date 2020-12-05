<x-app-layout>
    
    
    <div class="card border-secondary mb-3 center" style="width: 60rem; ">
      <div class="card-body">
        <h5 class="card-title"><span>Nhân viên : {{$nhanvien->Hoten}}</span></h5>
        <h6 class="card-subtitle mb-2 text-muted">{{$nhanvien->Position}}</h6>
        <form action="/update-nhanvien/{{$nhanvien->id}}" method="POST">
          {{csrf_field()}}
          {{method_field('PUT')}}
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Họ tên:</label>
                <input type="text" class="form-control" id="recipient-name" name="Hoten" value="{{$nhanvien->Hoten}}" placeholder="Họ và tên">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">SDT:</label>
                <input type="text" class="form-control" id="recipient-name" value="{{$nhanvien->sdt}}" name="sdt" placeholder="SDT">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Thời gian bắt đầu làm việc</label>
                <input type="datetime-local" class="form-control" value="{{$nhanvien->start_work}}" id="message-text" name="start_work">
              </div>
              <div class="form-group">
                  <label for="message-text" class="col-form-label">Thời gian kết thúc làm việc</label>
                  <input type="datetime-local" class="form-control" value="{{$nhanvien->start_work}}"  id="message-text" name="end_work">
              </div>
              <div class="form-group">
                  <label for="message-text" class="col-form-label">Vị trí làm việc</label>
                  {{-- <div class="input-group-prepend" >
                      <label class="input-group-text" for="inputGroupSelect01">Vị trí làm việc</label>
                    </div> --}}
                    <select class="custom-select" id="inputGroupSelect01"  name="Position" required>
                      <option selected value="{{$nhanvien->Position}}">Chọn...</option>
                      <option value="admin">Admin</option>
                      <option value="ketoan">KẾ TOÁN</option>
                      <option value="designer">DESIGNER</option>
                      <option value="thi_cong">Thi công</option>
                    </select>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Số $/ giờ</label>
                <input type="text" class="form-control" id="message-text" value="{{$nhanvien->luong_h}}" name="luong_h">
            </div>
              <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                <button type="submit" class="btn btn-primary">Lưu</button>
              </div>
            </form>
      </div>
    </div>
      
</x-app-layout>