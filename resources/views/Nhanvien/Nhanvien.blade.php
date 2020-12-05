<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nhân viên') }}
        </h2>
    </x-slot> --}}


   {{-- <div class="card mb-4">
   
    <p>{{$user}}</p>
    </div> --}}
    <style>
        .selected{
            background-color: slategrey;
            cursor: pointer;
        }
        .center {
                    display: block;
                    margin-left: 25%;
                    margin-right: auto;
                    width: 50%;
                }
    </style>
    <div class="card mb-3 center" style="max-width: 540px;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="https://cdn.onlinewebfonts.com/svg/img_452000.png" class="card-img" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Thông tin chi tiết</h5>
              <p class="card-text name_display"></p>
              <p class="card-text pos_display"></p>
              <p class="card-text phone_display"></p>
              <b class="card-text luong_display"></b>
              <br/>
              <br/>
              {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
            <button class="btn btn-success btn_tinhluong" onclick="Tinhluong()">Tính lương</button>
            </div>
           
          </div>
        </div>
    </div>
    {{-- Modal thêm mới --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Thêm mới nhân viên</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/create-nhanvien" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Họ tên:</label>
                  <input type="text" class="form-control" id="recipient-name" name="Hoten" placeholder="Họ và tên">
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Giới tính:</label>
                    <select class="custom-select" id="" name="Gioitinh" required>
                      <option selected >Chọn...</option>
                      <option value="0">Nam</option>
                      <option value="1">Nữ</option>
                      
                    </select>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Địa chỉ:</label>
                <input type="text" class="form-control" id="recipient-name" name="Diachi" placeholder="Địa chỉ">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Email:</label>
                <input type="text" class="form-control" id="recipient-name" name="Email" placeholder="Email">
              </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">SDT:</label>
                  <input type="text" class="form-control" id="recipient-name" name="sdt" placeholder="SDT">
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Thời gian bắt đầu làm việc</label>
                  <input type="date" class="form-control" id="message-text" name="start_work">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Thời gian kết thúc làm việc</label>
                    <input type="date" class="form-control" id="message-text" name="end_work">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Vị trí làm việc</label>
                      <select class="custom-select" id="inputGroupSelect01" name="Position" required>
                        <option selected >Chọn...</option>
                        <option value="admin">Admin</option>
                        <option value="ketoan">KẾ TOÁN</option>
                        <option value="designer">DESIGNER</option>
                        <option value="thi_cong">Thi công</option>
                      </select>
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Số $/ giờ</label>
                  <input type="text" class="form-control" id="message-text" name="luong_h">
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      {{-- end --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
           <span>Danh sách nhân viên</span>
           
        </div>
        @if (session('statusBC'))
        <div class="alert alert-danger">
            {{ session('statusBC') }}
        </div>
        @endif
        <div class="card-body">
          <div class=" d-flex justify-content-end">
          <div class="justify-content-sm-center">
            <div class="left" id="formTgBC">
                <form action="/bao-cao-ds-nhanvien" method="POST">
                  @csrf
                  <div class="form-row align-items-baseline">
                    <div class="col-sm-5 my-1">
                      
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Từ ngày</div>
                        </div>
                        <input type="date" class="form-control" name="startdate" id="" placeholder="Username">
                      </div>
                    </div>
                    <div class="col-sm-5 my-auto">
                    
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Đến ngày</div>
                        </div>
                        <input type="date" class="form-control" id="" name="enddate" placeholder="Username">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <button type="submit" class="btn btn-success">In Bảng lương</button>
                    </div>
                  </div>
                </form>
            </div>
          </div>
            {{-- <a class="btn bg-light" href="/bao-cao-ds-nhanvien">Xuất danh sách nhân viên - bảng lương</a> --}}
         </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Thêm mới</button>
            @if (session('status'))
                  <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
              @endif
            <div class="table-responsive-md text-center" style="margin: 0% 5% 0% 5%">
                
                {{-- <button type="button" class="btn btn-primary btn_modal" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> --}}
                <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Họ Tên</th>
                            <th>SDT</th>
                            <th>Ngày vào làm</th>
                            <th>Ngày kết thúc</th>
                            <th>Số ngày làm</th>
                            <th>Hệ số lương</th>
                            <th>Lương/h</th>
                            <th>Pos</th>
                            <th class="luong_display">Lương thực lĩnh</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($nhanvien as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->Hoten}}</td>
                            <th>{{$item->sdt}}</th>
                            <td>{{$item->start_work}}</td>
                            <td>{{$item->end_work}}</td>
                            <td>{{ floor( abs(strtotime($item->start_work) - strtotime($item->end_work) ) /(60*60*24) )  }}</td>
                            @switch($item->Position)
                              @case('admin')
                                <td>2</td>
                                  @break

                              @case('ketoan')
                              <td>1.5</td>
                                  @break

                              @default
                              <td>1</td>
                          @endswitch
                            {{-- <td>{{$item->Hesoluong}}</td> --}}
                            
                            <td>{{$item->luong_h}}</td>
                            <td>{{$item->Position}}</td>
                            <td class="luong_display">{{ number_format($item->Tienluong)}} VND </td>
                            <td>
                            <a class="btn btn-warning" href="/edit-nhanvien/{{$item->id}}"><i class="far fa-edit"></i></a>
                            </td>
                            <td>
                            <form action="/del-nhanvien/{{$item->id}}" method="POST">
                              {{@csrf_field()}}
                              {{method_field('DELETE')}}
                              <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a class="btn btn-link" href="/print-ds-nhanvien"> <i class="fas fa-print"></i> In danh sách nhân viên</a>
        </div>
    </div>
    <script>
        $(document).ready(function() {
        var table = $('#dataTable').DataTable({
          "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
        }
        });
        $('.btn_tinhluong').hide();
        $('.luong_display').hide();
    $('#dataTable tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        // alert( 'You clicked on '+data ); 
        // $('.data_display').text(data);

        $('.name_display').text('Họ tên: '+data[1]);
        $('.pos_display').text('Pos: '+data[8]);
        $('.phone_display').text('SDT : '+data[2]);
        $('.btn_tinhluong').show();  
        $('.luong_display').text('Lương:  '+data[9]);
        if ( $(this).hasClass('selected') ) {
          
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
    
   
} );
function Tinhluong(){
      $('.luong_display').show();

    }
    </script>
   
</x-app-layout>