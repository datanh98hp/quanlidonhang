<x-app-layout>
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <form class="form-group" action="/update-bg/{{$bg->id}}" method="POST">
                {{ csrf_field() }}
                {{method_field('PUT')}}

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Tên loại:</label>
                  <input type="text" class="form-control" id="recipient-name" name="TenLoai" value="{{$bg->TenLoai}}">
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label" >Đơn giá:</label>
                  <input class="form-control" id="" value="{{$bg->Dongia}} " name="Dongia" >
                </div>
                <div class="form-group">
                    
                        <label for="validationTooltip04">Đơn vị</label>
                        <select class="custom-select" id="validationTooltip04" name="Donvi" value="{{$bg->Donvi}}" required>
                            <option value="Cái" @if ($bg->Donvi==="Cái")
                                selected="true"
                            @else
                            
                            @endif>Cái</option>
                            <option value="Tờ" @if ($bg->Donvi==="Tờ")
                              selected="true"
                          @else
                         
                          @endif>Tờ</option>
                          <option value="Mét vuông" @if ($bg->Donvi==="Mét vuông")
                            selected="true"
                        @else
                       
                        @endif>Mét vuông</option>
                        <option value="Hộp" @if ($bg->Donvi==="Hộp")
                            selected="true"
                        @else
                       
                        @endif>Hộp</option>
                        </select>
                        <div class="invalid-tooltip">
                         Nhập đầy đủ thông tin
                        </div>
        
                </div>
                
                <div class="form-group">
                    <button class="btn btn-success">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
    
