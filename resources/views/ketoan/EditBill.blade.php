<x-app-layout>
    <h2 class="text-center">Thông tin đơn hàng</h2>
    <div class="form-group center">
      <a class="btn btn-link" style="margin:0% 48%" href="/print-donhang/{{$donhang->id}}"> <i class="fas fa-print"></i> In </a>
    </div>
    <div class="card  border-danger col-md-9" style="margin:0% 15%">
      @if (session('status'))
      <div class="alert alert-success" role="alert">
            {{ session('status') }}
      </div>
      @endif
        <div class="form-froup">
          @if ($donhang->Trang_thai==='Hoàn thành')

            <form class="form" action="/undo-hoanthanh-donhang/{{$donhang->id}}" method="POST" style="margin: 2% 0% 0% 70%">
              {{ csrf_field() }}
              {{method_field('PUT')}}
              <button type="submit" class="btn btn-light "><i class="fas fa-uncheck"></i> <span style="color: green"> Hủy chốt đơn </span></button>
            </form>
   
          @else
            
            <form class="form" action="/hoanthanh-donhang/{{$donhang->id}}" method="POST" style="margin: 2% 0% 0% 70%">
              {{ csrf_field() }}
              {{method_field('PUT')}}
              <button type="submit" class="btn btn-light "><i class="fas fa-check"></i> <span style="color: green">Chốt đơn hàng</span></button>
            </form>
          @endif
        </div>
        {{--  --}}
        <form action="/update-donhang/{{$donhang->id}}" method="POST">
            {{ csrf_field() }}
            {{method_field('PUT')}}
         
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Người lập đơn hàng:</label>
            <input type="text" class="form-control" id="recipient-name" name="" value="{{$username}}" disabled placeholder="Họ và tên">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tên Mặt hàng:</label>
     
            <table class="table table-borderless">
              <thead>
                <tr>
                  {{-- <th scope="col">#</th> --}}
                  <th scope="" style="width:300px">Mặt hàng</th>
                  <th scope="">Số lượng</th>
                  <th scope=""><a href="javascript:;" class="btn btn-success addRow">+</a></th>
                  <th scope=""></a></th>
               
                </tr>
              </thead>
              <tbody id="content" >
                @foreach ($mathang as $item)
                  @if ($item->id_Donhang === $donhang->id )
                  
                  <tr>
                    <td>
                      {{-- <input type="text" class="form-control"  id="TenMH" name="TenMH[]" value="{{$item->TenMH}}"> --}}
                        <select id="inputState" class="form-control" name="id_Banggia[]">
                          <option>Chọn...</option>
                            @foreach ($bg as $it)
                              <option value="{{$it->id}}"                   
                                    @if ($it->id==$item->id_Banggia)
                                      selected="true" 
                                    @endif
                                >{{$it->TenLoai}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                      <input type="number" min="0" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" class="form-control" name="Soluong[]" value="{{$item->Soluong}}">
                    </td>
              
                    <td><a href="javascript:;" class="btn btn-dark deleteRow">-</a></td>
                    <td>
                        <a href="/del-one-mathang/{{$item->id}}"><i class="far fa-trash-alt"></i> Xóa mặt hàng</a>
                    </td>
                  </tr>
                  @endif
                       
                @endforeach
            
              </tbody>

            </table>
          </div>

          <div class="form-group">
              <label for="message-text" class="col-form-label">Ngày trả</label>
          <input type="text"   class="form-control"  name="Tg_giao" value="{{$donhang->Tg_giao}}"> 
      
          </div>
        
          <div class="form-group">
            <label for="message-text" class="col-form-label">Cọc trước</label>
            <input type="text" class="form-control"  name="Coc_truoc" value="{{$donhang->Coc_truoc}}">
        </div>
          <div class="modal-footer">
            <button type="submit" @if($donhang->Trang_thai==="Hoàn thành"){ disabled } @endif class="btn btn-primary">Lưu</button>
          </div>

        </form>
      </div>
     

</x-app-layout>
<script>
    $('thead').on('click','.addRow',function(){
      var tr = '<tr>'+
                    '<td>'+
                      
                       '<select id="inputState" class="form-control" name="id_Banggia[]">'+
                          '<option selected>Chọn...</option>'+
                          '@foreach ($bg as $it)'+
                            '<option value="{{$it->id}}">{{$it->TenLoai}}</option>'+
                          '@endforeach'+
                        '</select>'+
                    '</td>'+
                    '<td>'+
                      '<input type="number" min="0" class="form-control" name="Soluong[]" value="">'+
                    '</td>'+
              
                    '<td><a href="javascript:;" class="btn btn-dark deleteRow">-</a></td>'+
                    '<td>'+
                        // '<a href="/del-one-mathang/">Xóa</a>'+
                    '</td>'+
                  '</tr>';
      $('#content').append(tr);
    });

    $('tbody').on('click','.deleteRow',function(){
      $(this).parent().parent().remove();
    });
  </script>