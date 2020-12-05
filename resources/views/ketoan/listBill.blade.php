<x-app-layout>
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
{{-- <div class="wrap"> --}}
  
  {{-- Modal thêm mới --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm mới đơn hàng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body col-md-12">
          <form action="/create-donhang" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Người lập đơn hàng:</label>
              <input type="text" class="form-control" id="recipient-name" name="" value="{{$username}}" disabled placeholder="Họ và tên">
            </div>
            {{--  --}}
            <div class="container">

              <label for="recipient-name" class="col-form-label">*Thông tin Khách hàng:*</label>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">*Tên KH:*</label>
                <select class="custom-select" id="kh_old"  name="id_Khachhang" id="">
                  <option value="">...Khác...</option>
                  @foreach ($kh as $item)
                    <option value="{{$item->id}}">{{$item->Hoten}}</option>
                  @endforeach
                </select>
              </div>
              {{-- <label for="recipient-name" class="col-form-label">*KH mới:*</label>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Tên KH:*</label>
                <input type="text" id="kh_new" class="form-control" id="recipient-name" name="Hoten" value="" placeholder="Thêm mới KH">
                
              </div> --}}
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">SDT:*</label>
                <input type="text" class="form-control" id="recipient-name" name="SDT" value=""  placeholder="SDT">
              </div>  
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Email:</label>
                <input type="text" class="form-control" id="recipient-name" name="Email" value=""  placeholder="Email">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">C.ty:</label>
                <input type="text" class="form-control" id="recipient-name" name="Cty" value="" placeholder="Cty">
              </div>
                          
          </div>
            {{--  --}}
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Tên Đơn hàng:</label>
              <input type="text" class="form-control" id="recipient-name" name="TenDH" value="" placeholder="Tên mô tả đơn hàng">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Thêm mặt hàng:</label>
       
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="" style="width:500px">Mặt hàng</th>
                    <th scope="" style="width:200px">Số lượng/ Số Diện tích</th>
                    <th scope=""><a href="javascript:;" class="btn btn-success addRow">+</a></th>
                  </tr>
                </thead>
                <tbody id="content">
                  <tr>
                    <td>
          
                        <select id="inputState" class="form-control" name="id_Banggia[]">
                          <option selected>Chọn...</option>
                          @foreach ($bg as $item)
                            <option value="{{$item->id}}">{{$item->TenLoai}}</option>
                          @endforeach
                        </select>
                      
                    </td>
                    <td>
                      <input type="number" min="0" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" class="form-control" name="Soluong[]">
                    </td>
                    <td scope="col"><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="form-group">
                <label for="message-text" class="col-form-label">Ngày trả</label>
                <input type="datetime-local" class="form-control" id="message-text" name="Tg_giao">
            </div>
          
            <div class="form-group">
              <label for="message-text" class="col-form-label">Cọc trước</label>
              <input type="text" class="form-control" id="message-text" name="Coc_truoc">
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
  {{-- end --}}
  {{-- <div class="container"> --}}
    <div class="card border-danger" >
      <div class="card-body mx-2 ">
        <h3 class="card-title text-center"> Danh sách đơn hàng</h3>
        @if (session('status'))
          <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div>
          <button type="button" class="btn btn-primary text-center" data-toggle="modal" style="margin-bottom: 2%" data-target="#exampleModal" data-whatever="@fat">Thêm mới</button>
        </div>
        <table class="table " id="dataTable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Người_lập</th>
              <th scope="col">Tên DH</th>
              <th scope="col">T.gian lập</th>
              <th scope="col">Trạng thái</th>
              <th scope="col">Ngày trả</th>
              <th scope="col">Đặt cọc trước</th>
              <th scope="col">Tổng giá</th>
              <th scope="col">Còn lại</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($donhang as $item)
            <tr>
              <td scope="row">{{$item->id}}</td>
              <td>{{$item->id_user}}</td>
              <td>{{$item->TenDH}}</td>
              <td>{{$item->created_at}}</td>
              <td style="color: green" class="center">
              @if ($item->Trang_thai==='Hoàn thành')
                <i class="fas fa-check"></i>
              @elseif($item->Trang_thai==='Đang xử lí')
                <i class="fas fa-spinner"></i>
              @endif
              </td>
              <td>{{$item->Tg_giao}}</td>
              <td>{{ number_format($item->Coc_truoc)}}</td>
              <td>{{ number_format($item->Tong_gia)}}</td>
              <td>{{ number_format($item->Tong_gia - $item->Coc_truoc)}}</td>
              <td>
                <a class="btn btn-info" href="/edit-donhang/{{$item->id}}"><i class="far fa-edit"></i></a>
                
            </td>
            <td>
              <form action="/del-donhang/{{$item->id}}" method="POST">
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
    </div>
  {{-- </div> --}}
{{-- </div> --}}
<script>
  $('thead').on('click','.addRow',function(){
    var tr = '<tr>'+
                    '<td>'+
                        '<select id="inputState" class="form-control" name="id_Banggia[]">'+
                          '<option selected>Chọn...</option>'+
                         '@foreach ($bg as $item)'+
                            '<option value="{{$item->id}}">{{$item->TenLoai}}</option>'+
                          '@endforeach'+
                        '</select>'+
                    '</td>'+
                    '<td>'+
                      '<input type="number" min="0" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" class="form-control" name="Soluong[]">'+
                    '</td>'+
                    '<td scope="col"><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>'+
              '</tr>';
    $('#content').append(tr);
  });
  $('tbody').on('click','.deleteRow',function(){
    $(this).parent().parent().remove();
  });
</script>
<script>
  $(document).ready(function() {
  var table = $('#dataTable').DataTable({
    "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
        }
  });

$('#dataTable tbody').on('click', 'tr', function () {
  var data = table.row( this ).data();
  
  $('.id_bill').text(''+data[0]);
  ///
  if ( $(this).hasClass('selected') ) {
      $(this).removeClass('selected');

  }
  else {
      table.$('tr.selected').removeClass('selected');
      $(this).addClass('selected');
  }
} );
} );
</script>
<script>
  
</script>
</x-app-layout>