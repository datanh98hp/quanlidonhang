<x-app-layout>
  <div class="row mx-auto">   
    <div class="col-sm-12">
      <h2 class="title" style="color:blue; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Danh sách vật liệu tồn kho</h2>
      <table class="table" id="dataTable_VL" style="max-width: 100%">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên VL</th>
            <th scope="col">SL</th>
            <th scope="col">Đơn vị</th>
            <th scope="col">NCC</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($ds_Vatlieu as $item)
            <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->TenVL}}</td>
              <td>{{$item->Soluong_ton}}</td>
              <td>{{$item->Donvi_tinh}}</td>
              <td>
                @foreach ($ncc as $nc)
                    @if ($nc->id === $item->id_ncc)
                        {{$nc->TenNCC}}
                    @endif
                @endforeach
              </td>
            </tr>  
          @endforeach
          
        </tbody>
      </table>
    </div>
  </div>
  <hr>
  <div class="card-group" style="margin:0% 0% 30px 0%">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Danh sách phiếu nhập</h5>
        <table class="table table-hover" id="dataTable" style="padding: 1%">
          <thead>
            <tr>
              <th scope="col" style="width:50px">#</th>
              <th scope="col" style="width:100px">Người nhập</th>
              <th scope="col" style="width:200px">T.gian nhập</th>
              <th scope="col" style="width:200px" >Mô tả</th>
              <th scope="col" style="width:100px" ></th>
            </tr>
          </thead>
          <tbody>

            @foreach ($phieunhap as $item)

            <tr>
              <th scope="row">{{$item->id}}</th>
              <td>
                @if ($item->id_user===Auth::user()->id)
                {{Auth::user()->name}}
                @endif
                {{-- {{$item->id_user}} --}}
              </td>
              <td>{{$item->Tgian_nhap}}</td>
              <td>{{substr($item->Description,0,20)}}... </td>
              <td>
                <a class="btn btn-info" href="/chitiet-phieunhap-vatlieu/{{$item->id}}">Chi tiết</a>
              </td>
            </tr>  

            @endforeach
          
          </tbody>
        </table>
        {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
      </div>
    </div>
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Danh sách phiếu xuất</h5>
        <table class="table table-hover table-dark" id="dataTable2" style="padding: 1%">
          <thead>
            <tr>
              <th scope="col" style="width:50px">#</th>
              <th scope="col" style="width:100px">Người nhập</th>
              <th scope="col" style="width:200px" >T.gian xuất</th>
              <th scope="col" style="width:100px">Đơn hàng</th>
              <th scope="col" style="width:200px">Mô tả</th>
              <th scope="col" style="width:100px"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($phieuxuat as $item)
            <tr>
              <th scope="row">{{$item->id}}</th>
              <td>
                @if ($item->id_user===Auth::user()->id)
                {{Auth::user()->name}}
                @endif
                {{-- {{$item->id_user}} --}}
              </td>
              <td>{{$item->Tgian_xuat}}</td>
              <td>{{$item->id_Donhang}}</td>
              <td>{{substr($item->Description,0,20)}}... </td>
              <td>
                <a class="btn btn-info" href="/chitiet-phieuxuat-vatlieu/{{$item->id}}">Chi tiết</a>
              </td>
            </tr>    
            @endforeach
          </tbody>
        </table>
        {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
      </div>
    </div>
  </div>

      <hr>
      {{-- @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
     @endif --}}
     @if (session('status'))
      <div class="alert alert-danger">
          {{ session('status') }}
      </div>
    @endif
      <div class="row" style="padding: 10px">
        <div class="col-sm-6">
          <div class="card border-primary mb-4" style="max-width: 100%;margin:10pt">
            <div class="card-header text-center">Phiếu nhập</div>
            <div class="card-body text-primary">
              <h5 class="card-title">Phiếu nhập vật liệu</h5>
              {{--  --}}
              <form action="/phieunhap-vatlieu" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                  <label for="">Người nhập phiếu :</label>
                  <input type="text" class="form-control" id="id_user" name="id_user" disabled value="{{$username}}" placeholder="">
                </div>
                <div class="form-group">
                  {{-- <label for="recipient-name" class="col-form-label">Danh sách vật liệu nhập <span style="margin-left: 300px; ">
                    <button type="button" id="check_input" class="btn" style="color:#000">Thay đổi phương thức nhập <i class="fas fa-exchange-alt" style="color: blue"></i> </button></span>
                  </label> --}}

                  {{-- <div class="input-group">                   
                  </div> --}}
                  <table class="table table-borderless center" >
                    <thead id="thead_Nhap">
                      <tr>
                        {{-- <th scope="col">#</th> --}}
                        <th scope="" style="width:200px">Tên vật liệu</th>
                        <th scope="" style="width:100px">Số lượng</th>
                        <th class="show_when_create" scope="" style="width:120px">Đơn giá</th>
                        <th class="show_when_create" scope="" style="width:150px">Nơi cấp</th>
                        <th class="show_when_create" scope="" style="width:130px">Đơn vị</th>
                        <th scope=""><a href="javascript:;" class="btn btn-success addRow">+</a></th>
    
                      </tr>
                    </thead>
                    <tbody id="content_Nhap">
                      <tr>
                        <td id="NhapVL"> 
                          {{-- <input type="text"  class="form-control" id="TenVL_input" name="TenVL[]" value=" "> --}}
                          {{-- <select id="TenVL_select" class="custom-select @error('title') is-invalid @enderror" name="TenVL[]">
                            <option selected value="">Chọn...</option>
                            @foreach ($ds_Vatlieu as $item)
                          <option value="{{$item->id}}">{{$item->TenVL}}</option>
                            @endforeach
                          </select> --}}
                        </td>
                        <td>
                          <input type="number" min="0" class="form-control" id="Soluong_ton" name="Soluong_ton[]">
                        </td>
                        <td  class="show_when_create">
                          <input type="text" class="form-control" id="Don_gia" name="Don_gia[]">
                        </td>
                        <td class="show_when_create">
                          {{-- <input type="text" class="form-control" id="NSX" name="id_ncc[]"> --}}
                          <select class="custom-select" name="id_ncc[]">
                            <option selected value="">...Chọn...</option>
                            @foreach ($ncc as $item)
                              <option value="{{ $item->id}}">{{ $item->TenNCC}}</option>
                            @endforeach
                          </select>
                        </td> 
                        <td class="show_when_create">
                          {{-- <input type="text" class="form-control" id="Donvi" name="Donvi[]"> --}}
                          <select class="custom-select" name="Donvi_tinh[]">
                            <option selected>Chọn...</option>
                            <option value="Cái">Cái</option>
                            <option value="Cuộn">Cuộn</option>
                            <option value="Tấm">Tấm</option>
                            <option value="Mét vuông">Mét vuông</option>
                            <option value="Khác">Khác</option>
                          </select>
                        </td>
                        
                        <td scope="col"><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
    
                <div class="form-group">
                  <label for="">Mô tả : </label>
                  <textarea class="form-control" name="Description" rows="7" cols="6"></textarea>
                </div>
                
                <div class="footer">
                  {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                  <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
              </form>
              {{--  --}}
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card border-success mb-4" style="max-width: 100%;margin:10pt">
            <div class="card-header text-center">Phiếu xuất</div>
            <div class="card-body text-primary ">
              <h5 class="card-title ">Phiếu Xuất vật liệu</h5>
              {{--  --}}
              <form action="/phieuxuat-vatlieu" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="exampleFormControlInput1">Người nhập phiếu :</label>
                  <input type="text" class="form-control" name="" value="{{$username}}" disabled placeholder="">
                  
                </div>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Chọn đơn hàng</label>
                  </div>
                  <select id="TenDH" class="custom-select" name="TenDH" required>
                    <option selected>Chọn...</option>
                    @foreach ($ds_Donhang as $item)
                  <option value="{{$item->id}}">{{$item->TenDH}}</option>
                    @endforeach
                  </select>
                  @error('TenDH')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Danh sách vật liệu xuất:</label>
           
                  <table class="table table-borderless center" style="padding: 10px">
                    <thead id="thead_Xuat">
                      <tr>
                        {{-- <th scope="col">#</th> --}}
                        <th scope="" style="width:200px">Tên vật liệu</th>
                        <th scope="" style="width:100px">Số lượng</th>
                        {{-- <th scope="" style="width:120px">Đơn giá</th>
                        <th scope="" style="width:150px">Nơi cấp</th>
                        <th scope="" style="width:130px">Đơn vị</th> --}}
                        <th scope=""><a href="javascript:;" class="btn btn-success addRow">+</a></th>
    
                      </tr>
                    </thead>
                    <tbody id="content_Xuat">
                      <tr>
                        <td>
                          {{-- <input type="text" class="form-control" id="TenVL" > --}}
                          <select id="TenVL" class="custom-select @error('title') is-invalid @enderror" name="TenVL[]" required>
                            <option selected>Chọn...</option>
                            @foreach ($ds_Vatlieu as $item)
                          <option value="{{$item->TenVL}}">{{$item->TenVL}}</option>
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <input type="number" min="0" class="form-control" id="Soluong_xuat"  name="Soluong_xuat[]">
                        </td>
                        {{-- <td>
                          <input type="text" class="form-control" id="Don_gia" name="Don_gia[]">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="Noi_cap" name="NSX[]">
                        </td> 
                        <td>
                          <select class="custom-select" name="Donvi_tinh[]">
                            <option selected>Chọn...</option>
                            <option value="Cái">Cái</option>
                            <option value="Cuộn">Cuộn</option>
                            <option value="M">M</option>
                          </select>
                        </td>
                         --}}
                        <td scope="col"><a href="javascript:;" class="btn btn-danger deleteRow">-</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
    
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Mô tả : </label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="Description" rows="5" cols="6"></textarea>
                </div>
            
                <div class="footer">
                  {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                  <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
              </form>
              {{--  --}}
            </div>
          </div>
        </div>
      </div>
      <script>
        $('#thead_Nhap').on('click','.addRow',function(){
          var tr =  '<tr>'+
                          '<td >'+
                            '<select id="TenVL" class="custom-select @error('title') is-invalid @enderror" name="TenVL[]" required>'+
                            '<option selected>Chọn...</option>'+
                            '@foreach ($ds_Vatlieu as $item)'+
                              '<option value="{{$item->id}}">{{$item->TenVL}}</option>'+
                            '@endforeach'+
                          '</select>'+
                          '</td>'+
                          '<td>'+
                            '<input type="number" min="0" class="form-control" id="Soluong" name="Soluong[]">'+
                          '</td>'+
                          // '<td class="show_when_create">'+
                          //   '<input type="text" class="form-control" id="Don_gia" name="Don_gia[]">'+
                          // '</td>'+
                          // '<td class="show_when_create">'+
                          // '<input type="text" class="form-control" id="Noi_cap" name="NSX[]">'+
                          // '</td>'+
                          // '<td class="show_when_create">'+
                          //   '<select class="custom-select" name="Donvi[]">'+
                          //     '<option value="" selected>...Chọn...</option>'+
                          //     '<option value="Cái">Cái</option>'+
                          //     '<option value="Chiếc">Chiếc</option>'+
                          //     '<option value="M">M</option>'+
                          //   '</select>'+
                          // '</td>'+
                          '<th scope="col"><a href="javascript:;" class="btn btn-danger deleteRow">-</a></th>'+
                        '</tr>';
          $('#content_Nhap').append(tr);
        });
        $('tbody').on('click','.deleteRow',function(){
          $(this).parent().parent().remove();
        });
      </script>
       <script>
        $('#thead_Xuat').on('click','.addRow',function(){
          var tr =  '<tr>'+
                          '<td>'+
                            '<select id="TenVL" class="custom-select @error('title') is-invalid @enderror" name="TenVL[]" required>'+
                            '<option selected>Chọn...</option>'+
                            '@foreach ($ds_Vatlieu as $item)'+
                              '<option value="{{$item->id}}">{{$item->TenVL}}</option>'+
                            '@endforeach'+
                          '</select>'+
                          // '</td>'+
                          '<td>'+
                            '<input type="number" min="0" class="form-control" id="Soluong" name="Soluong_xuat[]">'+
                          '</td>'+
                          
                          '<th scope="col"><a href="javascript:;" class="btn btn-danger deleteRow">-</a></th>'+
                        '</tr>';
          $('#content_Xuat').append(tr);

        });
        $('tbody').on('click','.deleteRow',function(){
          $(this).parent().parent().remove();
        });
      </script>
      <script>
         $(document).ready( function () {
            $('#dataTable').DataTable({
              "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
          
          
        }
            });
        } );
        $(document).ready( function () {
            $('#dataTable2').DataTable({
              "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
          
        }
            });
        } );
        $(document).ready( function () {
            $('#dataTable_VL').DataTable({
              "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json",
          
        }
            });
        } );
      </script>
      <script>
       
      //  $('#TenVL_input').hide();
       $('#NhapVL').append('<select id="TenVL_select" class="custom-select @error('title') is-invalid @enderror" name="TenVL[]">'+
                            '<option selected value="">Chọn...</option>'+
                            '@foreach ($ds_Vatlieu as $item)'+
                          '<option value="{{$item->TenVL}}">{{$item->TenVL}}</option>'+
                            '@endforeach'+
                          '</select>');
        var timeClick = 1;
        $('.show_when_create').hide();

        $('#check_input').click(function(){
         
          timeClick++;
          if(timeClick % 2===0){
            
            $('#TenVL_select').remove();
            $('#TenVL_input').remove();
            $('.show_when_create').show();
            $('#NhapVL').append('<input type="text" class="form-control" id="TenVL_input" name="TenVL[]">').show();
            }else if(timeClick % 2!==0){
            
            $('#TenVL_input').remove();
            $('#TenVL_select').remove();
            $('.show_when_create').hide();
            $('#NhapVL').append('<select id="TenVL_select" class="custom-select @error('title') is-invalid @enderror" name="TenVL[]">'+
                            '<option selected value="">Chọn...</option>'+
                            '@foreach ($ds_Vatlieu as $item)'+
                          '<option value="{{$item->TenVL}}">{{$item->TenVL}}</option>'+
                            '@endforeach'+
                          '</select>');
           
          }
          console.log(timeClick);
        });
      
      </script>
</x-app-layout>