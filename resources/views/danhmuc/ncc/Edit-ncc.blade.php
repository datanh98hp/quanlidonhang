<x-app-layout>
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <form class="form-group" action="/update-ncc/{{$ncc->id}}" method="POST">
                {{ csrf_field() }}
                {{method_field('PUT')}}

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Tên NCC:</label>
                  <input type="text" class="form-control" id="recipient-name" name="TenNCC" value="{{$ncc->TenNCC}}">
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label" >Địa chỉ:</label>
                  <input class="form-control" id="" value="{{$ncc->DiaChi}} " name="DiaChi" >
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Hotline:</label>
                    <input type="text" class="form-control" id="recipient-name" name="Hotline" value="{{$ncc->Hotline}}">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Người đại diện:</label>
                    <input type="text" class="form-control" id="recipient-name" name="Daidien" value="{{$ncc->Daidien}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
  