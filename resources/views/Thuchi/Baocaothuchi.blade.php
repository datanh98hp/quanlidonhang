<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<div>
    <div class="card text-center" style="width: 100%;margin:0% ">
      <div class="card-body">
        <h5 class="card-title">Date: </h5>
        <!-- When there is no desire, all things are at peace. - Laozi -->
      <div class="row " style="text-align: center;justify-content: center">
          <div class="" style="display: flex">
            <div class="justify-content-center" style="margin-left:0%;">
                {{-- <img src="https://pngimage.net/wp-content/uploads/2018/06/webpack-logo-png.png" width="10%" alt="logo"> --}}

                <h2 class="text-center" style="font-family: 'Lexend Peta', sans-serif;color: red">TRUNG TÂM QUẢNG CÁO TRẺ</h2>
                <h1 class="text-center" style="font-family: 'Bungee Inline', cursive;color: red">Thiện Phúc</h1>
                <span style="color: red">DC: Số 73 Trần Tất Văn - TT. An Lão - Hải Phòng * SDT: 0965 054 109 - 0867 10 03 89 </span>
                <h3 class="center" style=" color: red;padding:20px;font-weight: 800" >ĐƠN ĐẶT HÀNG</h3>
            </div>
          </div>
        </div>
    <h6 class="">THIẾT KẾ - HOÀN THIỆN BIỂN QUẢNG CÁO THEO YÊU CẦU - IN TRÊN MỌI CHẤT LIỆU - IN PHUN KHỔ LỚN - 
        IN OFFSET - CÂT CHỮ VI TÍNH - CẤT CHỮ MICA NỔI - LẮP ĐÈN NEON SIGN - IN THIỆP CƯỚI - GIẤY KHEN - GIẤY MỜI - IN ẢNH ...
    </h6>
    <hr color="lightred">
    <div class="collunm">
        <h5>Người đặt hàng:<p class="name_oder"></p></h5>
        <h5>Địa chỉ: <p class="address_oder"></p></h5>
        <table class="table table-borderless" id="table-bill" style="width:100%;padding:2% 0% 0% 0%">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên hàng</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Thành tiền</th>
              </tr>
            </thead>
            <tbody>

                {{-- @foreach ($list_dh as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->TenMH}}</td>
                    <td>{{$item->Soluong}}</td>
                    <td>{{number_format($item->Don_gia)}} VND</td>
                    <td>{{ number_format($item->Don_gia*$item->Soluong)}} VND</td>
                  </tr>    
                @endforeach --}}
            </tbody>
        </table>
        
    </div>
      </div>
      {{-- <h3 class="text-right" style="margin-right: 20px;font-weight: 1000"> Tổng :<span class="total_data" style="padding: 30px;font-weight: 600">{{ number_format($tongGia)}} VND</span></h3> --}}
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
  