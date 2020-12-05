
<x-app-layout>
  <h1 class="text-center text-primary">Báo cáo đơn hàng</h1>
  @if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
  @endif
  <div class="center">
    <form action="/create/bc-dh" method="POST">
      @csrf
      {{-- {{csrf_field()}}
          {{method_field('PUT')}} --}}
      <div class="form-row align-items-baseline mx-auto">
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
        <div class="col-auto mx-auto">
          <button type="submit" class="btn btn-success">Xem</button>
        </div>
      </div>
    </form>
  </div>

      <div class="wrap">
        <h3 class="text-center my-5">Danh sách đơn hàng</h3>
        <div class="row justify-content-center">
          <div class="col-sm-8">
            <table class="table" id="dataTable">
              <thead class="thead-light">
                <tr>
                  <th scope="col" style="width: 300px">Tên DH</th>
                  <th scope="col">Khách hàng</th>
                  <th scope="col">Thời gian giao</th>
                  <th scope="col">Giá đơn hàng</th>
                  <th scope="col">Trạng thái</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach ($dh as $item)
                  <tr>
                    <th scope="row">{{$item->TenDH}}</th>
                    <td>
                      @foreach ($kh as $it)
                          @if ($it->id==$item->id_Khachhang)
                          {{$it->Hoten}}
                          @endif
                      @endforeach 
                    </td>
                    <td>{{$item->Tg_giao}}</td>
                    <td>{{ number_format($item->Tong_gia)}} </td>
                    <td>{{$item->Trang_thai}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
</x-app-layout>
<script>
 $(document).ready(function() {
  var table = $('#dataTable').DataTable({
    "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
        }
  });
 }
</script>