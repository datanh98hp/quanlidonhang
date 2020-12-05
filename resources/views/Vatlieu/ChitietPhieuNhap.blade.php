<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title" lang="en">Thời gian:{{now()}} </h5>
        </div>
        <div class="card-body">
            
            <!-- When there is no desire, all things are at peace. - Laozi -->
            <div class="row text-center">
                
                <div class="center" style="text-align: center;">
                    <h3 class="" style="font-family: 'Lexend Peta', sans-serif;color: red">TRUNG TÂM QUẢNG CÁO TRẺ</h3>
                    <h2 class="" style="font-family: 'Bungee Inline', cursive;color: red;font-size:30px">Thiện Phúc</h2>
                    <h6><span style="color: red">DC: Số 73 Trần Tất Văn - TT. An Lão - Hải Phòng * SDT: 0965 054 109 - 0867 10 03 89 </span></h6>
                    <h6 class="" style=" color: red;font-size:20px ;text-transform: uppercase;font-weight: 800;padding:30px" >Chi tiết phiếu nhập</h6>
                    <h6 class="" style="text-align: center">THIẾT KẾ - HOÀN THIỆN BIỂN QUẢNG CÁO THEO YÊU CẦU - IN TRÊN MỌI CHẤT LIỆU - IN PHUN KHỔ LỚN - 
                    IN OFFSET - CĂT CHỮ VI TÍNH - CẤT CHỮ MICA NỔI - LẮP ĐÈN NEON SIGN - IN THIỆP CƯỚI - GIẤY KHEN - GIẤY MỜI - IN ẢNH ...
                </h6>
                </div>
                
            </div>
            <hr color="lightred">
            <h3 class="text-center">Danh sách vật liệu nhập</h3>
            <table class="table table-borderless" id="list_vl_nhap" style="margin:0% 10% 5% 5%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên vật liệu</th>
                    <th scope="col">Số lượng thêm</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Tổng</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($VL as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->TenVL}}</td>
                        <td>{{$item->last_change}}</td>
                        <td>{{ number_format($item->Don_gia)}} VND</td>
                        <td>{{number_format($item->Don_gia * $item->last_change) }} VND</td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              
      </div>
      <span class="text-right" style="padding:10px" id="display_Tonggia"> <b><span>Tổng tiền : </span></b> {{number_format($coutnTongGia)}} VND</span>

      <label class="text-left" style="margin: 20% 10% 0% 10%; font-weight: 800">Người lập </label>
    <p class="text-left" style="margin: 3% 0% 0% 10%; font-weight: 400">{{$user}}</p>
      </div>
  </div>
  <script>
    $(document).ready(function(){
      {
      var txt;
      if(confirm('Bạn có muốn In trang này')){
        window.print();
      }else{
        
      }
    }
    });
  </script>
  