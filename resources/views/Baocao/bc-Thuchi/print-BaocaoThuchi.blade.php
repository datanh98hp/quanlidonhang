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

                <h2 class="text-center" >TRUNG TÂM QUẢNG CÁO TRẺ</h2>
                <h1 class="text-center" >Thiện Phúc</h1>
                <span >DC: Số 73 Trần Tất Văn - TT. An Lão - Hải Phòng * SDT: 0965 054 109 - 0867 10 03 89 </span>
              <h3 class="text-center" style=" color:black;padding:20px;font-weight: 600;text-transform: uppercase" >Báo cáo thu chi ngày {{ $start}}  - {{$end}} </h3>
              <h6 class="my-3" style="font-style: oblique">Thời gian : <span class="address_oder">{{ now() }}</span></h6>
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
            <thead class="table display thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nội dung công việc</th>
                <th scope="col">Thu</th>
                <th scope="col">Chi</th>
                <th scope="col">Còn lại</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($thuchi as $item)
                    
                    <tr>
                        <th scope="row">
                          {{$item->id}}
                        </th>
                        <td>{{$item->NDCV}}</td>
                        <td>
                            @if ($item->SoTen_Thu==null)
                                {{'---'}}
                            @else
                                {{$item->SoTen_Thu }}
                            @endif   
                        </td>   
                        <td>
                            @if ($item->SoTen_Chi==null)
                                {{'---'}}
                            @else
                            {{$item->SoTen_Chi }}
                            @endif  
                            
                        </td>
                        <td>
                          {{$item->SoTen_Thu - $item->SoTen_Chi }}
                        </td>
                      </tr> 
                      
              @endforeach
            </tbody>
        </table>
       
    </div>
      </div>
      <h4 class="text-right" style="margin-right: 20px;font-weight: 1000"> Tổng thu  :<span class="total_data" style="padding: 30px;font-weight: 600">{{ number_format($Tongthu)}} VND</span></h4>
      
      <h4 class="text-right" style="margin-right: 20px;font-weight: 1000"> Tổng Chi  :<span class="total_data" style="padding: 30px;font-weight: 600">{{ number_format($Tongchi)}} VND</span></h4>

      <h3 class="text-right" style="margin-right: 20px;font-weight: 1000"> Số dư  :<span class="total_data" style="padding: 30px;font-style: italic; font-weight: 600">{{ number_format($Tongthu - $Tongchi)}} VND</span></h3>
    </div>
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
  