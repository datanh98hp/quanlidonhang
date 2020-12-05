<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<style>
  table, th, td {
   border: 1px solid black !important;
 }
 </style>
<div>
    <div class="card text-center" style="width: 100%;margin:0% ">
      <div class="card-body">
      {{-- <h5 class="card-title">Thời gian : {{now()}}</h5> --}}
        <!-- When there is no desire, all things are at peace. - Laozi -->
      <div class="row " style="text-align: center;justify-content: center">
          <div class="" style="display: flex">
            <div class="justify-content-center" style="margin-left:0%;">
                {{-- <img src="https://pngimage.net/wp-content/uploads/2018/06/webpack-logo-png.png" width="10%" alt="logo"> --}}

                <h2 class="text-center" style="font-family: 'Lexend Peta', sans-serif;color: red">TRUNG TÂM QUẢNG CÁO TRẺ</h2>
                <h1 class="text-center" style="font-family: 'Bungee Inline', cursive;color: red;">Thiện Phúc</h1>
                <span style="color: red">DC: Số 73 Trần Tất Văn - TT. An Lão - Hải Phòng * SDT: 0965 054 109 - 0867 10 03 89 </span>
              <h3 class="text-center" style=" color:black;padding:20px;font-weight: 600;text-transform: uppercase" >Báo cáo mặt hàng tồn kho theo đơn hàng </h3>
              <h6 class="my-3" style="font-style: oblique">Thời gian : <span class="address_oder">{{now()}}</span></h6>
            </div>
          </div>
        </div>
    <h6 class="">THIẾT KẾ - HOÀN THIỆN BIỂN QUẢNG CÁO THEO YÊU CẦU - IN TRÊN MỌI CHẤT LIỆU - IN PHUN KHỔ LỚN - 
        IN OFFSET - CẮT CHỮ VI TÍNH - CẤT CHỮ MICA NỔI - LẮP ĐÈN NEON SIGN - IN THIỆP CƯỚI - GIẤY KHEN - GIẤY MỜI - IN ẢNH ...
    </h6>
    <hr color="">
    <div class="collunm mx-auto my-4">
        {{-- <h5>Người lập :<p class="name_oder">{{Auth::user()->name}}</p></h5> --}}
        {{-- <h6 style="font-style: oblique">Thời gian : <span class="address_oder">{{now()}}</span></h6> --}}
        <table class="table text-center" id="table-bill" style="width:100%;padding:10% 0% 0% 0%">
            <thead class="table display thead-dark ">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên Mặt hàng</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tên Đơn hàng</th>
                <th scope="col">Thời gian giao</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($mh_ton as $item)
                    
                    <tr>
                        <th scope="row">
                          {{$item->id}}
                        </th>
                        <td>{{$item->id_Banggia}}</td>
                        <td>{{$item->Soluong}}</td>   
                        <td>
                          @foreach ($donhang as $dh)
                              @if ($dh->id == $item->id_Donhang)
                              {{$dh->TenDH}}
                              @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach ($donhang as $dh)
                              @if ($dh->id == $item->id_Donhang)
                              {{$dh->Tg_giao}}
                              @endif
                          @endforeach
                        </td>
                      </tr> 
                      
              @endforeach
            </tbody>
        </table>
       
    </div>
      </div>
      {{-- <h3 class="text-right" style="margin-right: 20px;font-weight: 1000"> Tổng :<span class="total_data" style="padding: 30px;font-weight: 600">{{ number_format($tonggia)}} VND</span></h3> --}}
    </div>

           {{--  --}}
           {{-- <hr class="center">
           <h3 class="mx-5">Thống kê số liệu</h3>
           <hr class="center">
          <div class="row mx-5">
            <div class="col-sm-6 justify-content-center">
              <table class="table center">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col" style="width: 200%">Tên mặt hàng</th>
                    <th scope="col"tyle="width: 50%">Số lượng</th>
                  </tr>
                </thead>
                <tbody>
                  @for ($i = 0; $i < count($kq_tk); $i++)
                      
                  <tr>
                    <td>{{$i}}</td>
                    <td>
                      @foreach ($ls_mh as $mh)
                          @foreach ($banggia as $bg)
                              @if ($mh->id_Banggia==$bg->id&&(key_exists($mh->id_Banggia,$kq_tk)) )
                                  {{$bg->TenLoai}}
                              @endif
                          @endforeach
                      @endforeach
                    </td>
                    <td>
                      @foreach ($ls_mh as $item)
                        @foreach ($dh_tk as $dh)
                            @if ($item->id_Donhang==$dh->id )
                              {{ $item->Soluong * $kq_tk[$item->id_Banggia]}}
                            @endif
                        @endforeach
                        
                      @endforeach
                    </td>
                  </tr>
                  
                  @endfor
                  </tbody>
              </table>
            </div>
          </div>
            --}}
            <h5 class=" mx-3 text-left my-0">Người lập đơn</h5>
            <div class="mx-5 center">
              
              <p><i>(Kí tên)</i></p>
              <p class="my-5">{{Auth::user()->name}}</p>
            </div>
  </div>
  <script>
    $(document).ready(function(){
      {
      // var txt;
      // if(confirm('Bạn có muốn In trang này')){
        window.print();
      // }else{
        
      // }
    }
    });
  </script>
  