<x-app-layout>
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <form class="form-group" action="/update-vl/{{$vl->id}}" method="POST">
                {{ csrf_field() }}
                {{method_field('PUT')}}

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Tên Vật liệu:</label>
                  <input type="text" class="form-control" id="recipient-name" name="TenVL" value="{{$vl->TenVL}}">
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label" >Số lượng tồn:</label>
                  <input class="form-control" type="number" id="" name="Soluong_ton" value="{{$vl->Soluong_ton}}">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Đơn giá:</label>
                    <input type="text" class="form-control" id="recipient-name" name="Don_gia" value="{{$vl->Don_gia}}">
                </div>
                <div class="form-group">
                    <label for="validationTooltip04">Đơn vị</label>
                        <select class="custom-select" id="validationTooltip04" name="Donvi_tinh" value="{{$vl->Donvi_tinh}}" required>
                            <option value="Cái" @if ($vl->Donvi_tinh==="Cái")
                                selected="true"
                            @else
                            
                            @endif>Cái</option>
                            <option value="Cuộn" @if ($vl->Donvi_tinh==="Cuộn")
                              selected="true"
                          @else
                         
                          @endif>Cuộn</option>
                          <option value="Tấm" @if ($vl->Donvi_tinh==="Cuộn")
                            selected="true"
                        @else
                       
                        @endif>Tấm</option>
                        <option value="Mét vuông" @if ($vl->Donvi_tinh==="Mét vuông")
                            selected="true"
                        @else
                       
                        @endif>Mét vuông</option>
                        <option value="Khác" @if ($vl->Donvi_tinh==="Khác")
                            selected="true"
                        @else
                       
                        @endif>Khác</option>
                        </select>
                        <div class="invalid-tooltip">
                         Nhập đầy đủ thông tin
                        </div>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nhà cung cấp:</label>
                    <select class="custom-select" id="validationTooltip04" name="id_ncc" value="{{$vl->id_ncc}}">
                        @foreach ($ncc as $nc)
                            @if ($nc->id===$vl->id_ncc)
                                <option value="{{$nc->id}}" @if ($vl->id_ncc===$nc->id)
                                    selected="true"
                                @else
                            
                                @endif>{{$nc->TenNCC}}</option>
                            @else
                                <option value="{{$nc->id}}">{{$nc->TenNCC}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
  