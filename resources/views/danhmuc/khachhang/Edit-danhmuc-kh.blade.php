<x-app-layout>
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <form class="form-group" action="/update-vl/{{$kh->id}}" method="POST">
                {{ csrf_field() }}
                {{method_field('PUT')}}

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Ho tên KH:</label>
                  <input type="text" class="form-control" id="recipient-name" name="Hoten" value="{{$kh->Hoten}}">
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label" >SDT:</label>
                  <input class="form-control" id="" value="{{$kh->SDT}} " name="SDT" >
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Email:</label>
                    <input type="email" class="form-control" id="recipient-name" name="Email" value="{{$kh->Email}}">
                </div>
                <div class="form-group">
                    
                        <label for="validationTooltip04">Loại KH</label>
                        <select class="custom-select" id="validationTooltip04" name="typeKH" value="{{$kh->typeKH}}" required>
                            <option value="Thường" @if ($kh->typeKH==="Thường")
                                selected="true"
                            @else
                            
                            @endif>Thường</option>
                            <option value="Khách quen" @if ($kh->typeKH==="Khách quen")
                              selected="true"
                          @else
                         
                          @endif>Khách quen</option>
                          <option value="VIP" @if ($kh->typeKH==="VIP")
                            selected="true"
                        @else
                       
                        @endif>VIP</option>
                        </select>
                        <div class="invalid-tooltip">
                         Nhập đầy đủ thông tin
                        </div>
        
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Công ty:</label>
                    <input type="text" class="form-control" id="recipient-name" name="Cty" value="{{$kh->Cty}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
    