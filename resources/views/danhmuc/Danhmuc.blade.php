<x-app-layout>
    {{-- KHách hàng --}}
    @if (session('statusKH'))
      <div class="alert alert-success" role="alert">
            {{ session('status') }}
      </div>
    @endif
    <div class="form-group">
    <h2 class="text-center mx-4" style="color: crimson;font-weight: 800">Danh mục Khách hàng</h2>
      <form action="/create-kh" method="POST">
        @csrf
          <table class="table table-striped" id="exampleKH">
            <thead>
              <tr>           
                <th scope="">Họ tên KH</th>
                <th scope="">SDT</th>
                <th scope="">Email</th>
                <th scope="">Loại KH</th>
                <th scope="">C.ty</th>
                <th scope=""></th>
              </tr>
            </thead>
          
            <tbody id="content" >
              
                <tr>
                  <td>
                    <input type="text" class="form-control"   name="Hoten" value="">
                  </td>
                  <td>
                    <input type="text" class="form-control"  name="SDT" value="">
                  </td>
                  <td>
                      <input type="text" class="form-control"  name="Email" value="">
                  </td>
                  <td>
                      {{-- <input type="text" class="form-control" id="Don_gia" name="Don_gia[]" value=""> --}}
                      <select class="custom-select"  name="typeKH" value="">
                          <option value="Thường">Thường</option>
                          <option value="Khách quen" >Khách quen</option>
                          <option value="VIP">VIP</option>
                      </select>
                      {{-- <div class="invalid-tooltip">
                      Nhập đầy đủ thông tin
                      </div> --}}
                  </td>
                  <td>
                      <input type="text" class="form-control" name="Cty" value="">
                  </td>
                  <th scope="">
                    <button type="submit" class="btn addRow"><i class="fas fa-plus"></i></button>
                    
                  </th>

                </tr>
                @foreach ($kh as $item)
                <tr>
                  <td>{{$item->Hoten}}</td>
                  <td>{{$item->SDT}}</td>
                  <td>{{$item->Email}}</td>
                  <td>{{$item->typeKH}}</td>
                  <td>{{$item->Cty}}</td>
                  <td>
                    {{-- <a type="submit" class="btn  "><i class="far fa-edit"></i></a> --}}
                    <a type="button" href="/edit-kh/{{{$item->id}}}" class="btn"><i class="far fa-edit"></i></a>

                    <a href="/del-kh/{{$item->id}}" type="submit" class="btn  "><i class="fas fa-trash-alt"></i></a>
                  </td>
                
                </tr>
                
                @endforeach

            </tbody>
          
          </table>
      </form>
    </div>

    {{-- end khách hàng --}}
    <hr>
    {{-- Vật liệu --}}
    <div class="form-group">
      <h2 class="text-center mx-4" style="color: teal;font-weight: 800">Vật liệu</h2>
        <form action="/create-vl" method="POST">
          @csrf
            <table class="table table-striped" id="exampleVL">
              <thead>
                <tr>           
                  <th scope="">#</th>
                  <th scope="">Tên VL</th>
                  <th scope="">SL Tồn </th>
                  <th scope="">Don_gia</th>
                  <th scope="">Donvi_tinh</th>
                  <th scope="">NCC</th>
                  <th scope=""></th>
                </tr>
              </thead>
            
              <tbody id="content" >
                
                  <tr>
                    <td>
                    </td>
                    <td>
                      <input type="text" class="form-control"   name="TenVL" value="">
                    </td>
                    <td>
                      <input type="number" min="0" class="form-control"  name="Soluong_ton" value="" >
                    </td>
                    <td>
                        <input type="number" min="0" class="form-control"  name="Don_gia" value="">
                    </td>
                    <td>
                        {{-- <input type="text" class="form-control" id="Don_gia" name="Don_gia[]" value=""> --}}
                        <select class="custom-select"  name="Donvi_tinh" value="">

                            <option selected>Chọn...</option>
                            <option value="Cái">Cái</option>
                            <option value="Cuộn">Cuộn</option>
                            <option value="Tấm">Tấm</option>
                            <option value="Mét vuông">Mét vuông</option>
                            <option value="Khác">Khác</option>

                        </select>
                        
                    </td>
                    <td>
                        {{-- <input type="text" class="form-control" name="id_ncc" value=""> --}}
                        <select class="custom-select"  name="id_ncc" value="">
                          <option value="">Chọn</option>
                            @foreach ($ncc as $item)
                              <option value="{{$item->id}}">{{$item->TenNCC}}</option>
                            @endforeach

                      </select>
                    </td>
                    <td scope="">
                      <button type="submit" class="btn addRow"><i class="fas fa-plus"></i></button>
                    </td>
                  </tr>
                  {{--  --}}
                  @foreach ($vl as $item)
                  <tr>
                    <td>
                      {{$item->id}}
                    </td>
                    <td>
                      {{$item->TenVL}}
                    </td>
                    <td>
                      {{$item->Soluong_ton}}
                    </td>
                    <td>
                      {{$item->Don_gia}}
                    </td>
                    <td>
                      {{$item->Donvi_tinh}}
                    </td>
                    <td>
                      @foreach ($ncc as $nc)
                          @if ($nc->id===$item->id_ncc)
                            {{$nc->TenNCC}}
                          @endif
                      @endforeach
                    </td>
                    <td scope="">
                      <a type="button" href="/edit-vl/{{$item->id}}" class="btn"><i class="far fa-edit"></i></a>

                      <a href="/del-vl/{{$item->id}}" type="submit" class="btn"><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  
              </tbody>
            
            </table>
        </form>
      </div>
    <hr>
    {{--  --}}
     @if (session('statusBG'))
       <div class="alert alert-success" role="alert">
             {{ session('statusBG') }}
       </div>
     @endif
    <h2 class="text-center" style="color: blue;font-weight: 800">Báo giá loại mặt hàng</h2>
    {{--  --}}
      <div class="form-group">
            <form action="/create-bg" method="POST">
              @csrf
                <table class="table table-striped" id="exampleBG">
                  <thead>
                    <tr>           
                      <th scope="">TenLoai</th>
                      <th scope="">Dongia</th>
                      <th scope="">Donvi</th>
                      <th scope=""></th>
                    </tr>
                  </thead>
                
                  <tbody id="content" >
                    
                      <tr>
                        <td>
                          <input type="text" class="form-control"  name="TenLoai" value="">
                        </td>
                        <td>
                          <input type="text" class="form-control"  name="Dongia" value="">
                        </td>
                        <td>
                            {{-- <input type="text" class="form-control" id="Don_gia" name="Don_gia[]" value=""> --}}
                            <select class="custom-select" name="Donvi">
                              <option selected>Chọn...</option>
                              <option value="Cái">Cái</option>
                              <option value="Cuộn">Cuộn</option>
                              <option value="Tấm">Tấm</option>
                              <option value="Mét vuông">Mét vuông</option>
                              <option value="Khác">Khác</option>
                            </select>
                            {{-- <div class="invalid-tooltip">
                            Nhập đầy đủ thông tin
                            </div> --}}
                        </td>
                      
                        <th scope="">
                          <button type="submit" class="btn addRow"><i class="fas fa-plus"></i></button>
                        </th>
      
                      </tr>
                      @foreach ($bg as $item)
                      <tr>
                        <td>{{$item->TenLoai}}</td>
                        <td>{{number_format($item->Dongia)}}</td>
                        <td>{{$item->Donvi}}</td>
                        <td>
                          {{-- <a type="submit" class="btn  "><i class="far fa-edit"></i></a> --}}
                          <a type="button" href="/edit-bg/{{{$item->id}}}" class="btn"><i class="far fa-edit"></i></a>
      
                          <a href="/del-bg/{{$item->id}}" type="submit" class="btn  "><i class="fas fa-trash-alt"></i></a>
                        </td>
                      
                      </tr>
                      
                      @endforeach
      
                  </tbody>
                
                </table>
            </form>
           </div>
     
      {{--  --}}
      <hr>
    {{-- ---------------------------- --}}
      @if (session('statusBG'))
      <div class="alert alert-success" role="alert">
            {{ session('statusNCC') }}
      </div>
      @endif
      <h2 class="text-center" style="color:orangered;font-weight: 800">Nhà cung cấp</h2>
            {{--  --}}
    <div class="form-group">
            <form action="/create-kh" method="POST">
              @csrf
                <table class="table table-striped" id="exampleNCC">
                  <thead>
                    <tr>           
                      <th scope="">Tên Nhà cung cấp</th>
                      <th scope="">Địa chỉ</th>
                      <th scope="">Hotline</th>
                      <th scope="">Đại diện</th>
                      <th scope=""></th>
                    </tr>
                  </thead>
                
                  <tbody id="content" >
                    
                      <tr>
                        <td>
                          <input type="text" class="form-control"   name="TenNCC" value="">
                        </td>
                        <td>
                          <input type="text" class="form-control"  name="DiaChi" value="">
                        </td>
                        <td>
                            <input type="text" class="form-control"  name="Hotline" value="">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="Daidien" value="">
                        </td>
                        <th scope="">
                          <button type="submit" class="btn addRow"><i class="fas fa-plus"></i></button>
                          
                        </th>
      
                      </tr>
                      @foreach ($ncc as $item)
                      <tr>
                        <td>{{$item->TenNCC}}</td>
                        <td>{{$item->DiaChi}}</td>
                        <td>{{$item->Hotline}}</td>
                        <td>{{$item->Daidien}}</td>
                        <td>
                          {{-- <a type="submit" class="btn  "><i class="far fa-edit"></i></a> --}}
                          <a type="button" href="/edit-ncc/{{{$item->id}}}" class="btn"><i class="far fa-edit"></i></a>
      
                          <a href="/del-ncc/{{$item->id}}" type="submit" class="btn  "><i class="fas fa-trash-alt"></i></a>
                        </td>
                      
                      </tr>
                      
                      @endforeach
      
                  </tbody>
                
                </table>
            </form>
    </div>


    {{--  --}}
</x-app-layout>

<script>
    $(document).ready(function() {
    $('#exampleKH').DataTable();
    $('#exampleBG').DataTable();
    $('#exampleNCC').DataTable();
    $('#exampleVL').DataTable();
} );

</script>
{{-- <script>
    $('thead').on('click','.addRow',function(){
      var tr =  '';
      $('#content').append(tr);
    });

    $('tbody').on('click','.deleteRow',function(){
      $(this).parent().parent().remove();
    });
</script> --}}