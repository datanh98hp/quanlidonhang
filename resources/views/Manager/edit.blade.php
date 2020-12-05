<x-app-layout>
  @section('title','Edit User')
    <div class="card border-light mb-3 center" style="max-width: 50rem;">
        <div class="card-header">Cập nhật thông tin người dùng</div>
        <div class="card-body">
        <form action="/user/update/{{$users->id}}" method="POST">
              {{csrf_field()}}
              {{method_field('PUT')}}
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputCity">Email</label>
                  <input type="text" disabled name="email" value="{{$users->email}}" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">Position
                </label>
                <select id="inputState" class="form-control" name="type" value="{{$users->type}}" name="type">
                    <option selected>Chọn...</option>
                    <option value="1">Admin</option>
                    <option value="2">Ke toan</option>
                    <option value="3">Designer</option>
                  </select>
                </div>
                
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
      </div>
</x-app-layout>