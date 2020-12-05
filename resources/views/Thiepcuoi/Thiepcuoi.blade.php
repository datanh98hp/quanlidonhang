<x-app-layout>
  <style>
    .selected{
        background-color: slategrey;
        cursor: pointer;
    }
    th:hover {
      background-color: darkgrey;

    }
    .center {
                display: block;
                margin-left: 25%;
                margin-right: auto;
                width: 50%;
            }
          
</style>
    {{-- <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Thiệp cưới') }}
    </h2>
</x-slot> --}}
  {{-- <x-header title="Mẫu đặt in thiệp cưới"></x-header> --}}
  <div style="margin:10px 40px 10px;" >
    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" aria-expanded="false" aria-controls="collapseExample">
       + Thêm mới
    </button>
  </div>
  
  @if (session('status'))
  <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
  @endif
    
    {{-- Edit modal --}}
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> --}}

  <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="/inthiepcuoi/create" method="POST">
          @csrf
          <div class="row">
            {{-- Nhà trai --}}
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="inputAddress2">Khách hàng : </label>
                            <input type="text" class="form-control" name="KH" placeholder="Khách Hàng">
                            {{-- <input type="text" class="form-control" name="user_id" placeholder="User id"> --}}
                        </div>
                    </div>
                    <hr>
                  <div class="form-row">
                    <div class="col-md-6">
                        <label>Nhà Trai</label>
                        <div class="form-group">
                            <label class="small mb-1" for="inputFirstName">Ông :</label>
                            <input class="form-control py-4" name="o_nhatrai" type="text" placeholder="Ông " />
                            <label class="small mb-1" for="inputFirstName">Bà :</label>
                            <input class="form-control py-4" name="b_nhatrai" type="text" placeholder="Bà" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Nhà Gái</label>
                        <div class="form-group">
                            <label class="small mb-1" for="inputLastName">Ông :</label>
                            <input class="form-control py-4" name="o_nhatgai" type="text" placeholder="Ông" />
                            <label class="small mb-1" for="inputLastName">Bà :</label>
                            <input class="form-control py-4" name="b_nhagai" type="text" placeholder="Bà" />
                        </div>
                    </div>
                     <h3 style="color: red;" class="text-center">Trân trọng 
                         <select name="qh">   
                             <option value="thân">thân</option>
                             <option value="kính">kính</option>
                         </select>
                         mời tới dự bữa cơm thân mật mừng lễ thành hôn của 
                         <select name="of">   
                            <option value="2"> 2</option>
                            <option value="2 con">2 con</option>
                            <option value="2 cháu">2 cháu</option>
                        </select>
                        chúng tôi.
                     </h3>
                    
                    
                </div>
                
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputPassword">Chú rể :</label>
                            <input class="form-control py-4" name="chure" type="text" placeholder="CHú rể" />
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Bậc</label>
                            <select class="form-control" name="bac_chure">
                              <option value="Trưởng">Trưởng</option>
                              <option value="Thứ">Thứ</option>
                              <option value="Út">Út</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputConfirmPassword">Cô dâu :</label>
                            <input class="form-control py-4" name="codau" type="text" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Bậc</label>
                            <select class="form-control" name="bac_codau">
                              <option value="Trưởng">Trưởng</option>
                              <option value="Thứ">Thứ</option>
                              <option value="Út">Út</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">  
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">Giờ ăn cơm (nhà trai):</div>
                              </div>
                              <input type="time" class="form-control" name="time_an_trai" placeholder="Username">
                              <div class="input-group-prepend">
                                <div class="input-group-text">Giờ tổ chức (nhà trai):</div>
                              </div>
                              <input type="time" class="form-control" name="time_tochuc_trai" placeholder="Username">
                            </div>
                    </div>
                    <div class="col-md-6">  
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">Giờ ăn cơm (nhà gái):</div>
                          </div>
                          <input type="time" class="form-control" name="time_an_gai" placeholder="Username">
                          <div class="input-group-prepend">
                            <div class="input-group-text">Giờ tổ chức (nhà gái):</div>
                          </div>
                          <input type="time" class="form-control" name="time_tochuc_gai" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="inputAddress2">Địa chỉ (nhà trai)</label>
                            <input type="text" class="form-control" name="diachi_nhatrai" placeholder="Địa chỉ nhà trai">
                            <div class="col-md-6">
                                <label for="inputEmail4">SĐT (trai) : </label>
                                <input type="tel" class="form-control" name="sdt_trai">
                                <label for="inputAddress2">Số lượng (nhà trai) :</label>
                                <input type="number" min="0" class="form-control" name="soluong_trai" placeholder="Số lượng">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="inputAddress2">Địa chỉ (nhà gái)</label>
                            <input type="text" class="form-control" name="diachi_nhagai" placeholder="Địa chỉ nhà gái">
                            <div class="col-md-6">
                                <label for="inputEmail4">SĐT (gái) : </label>
                                <input type="tel" class="form-control" name="sdt_gai">
                                <label for="inputAddress2">Số lượng (nhà gái) :</label>
                                <input type="number" min="0" name="soluong_gai" class="form-control" placeholder="số lượng">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Tổng số tiền :</div>
                        </div>
                        <input type="text" class="form-control" name="Tong_tien" placeholder="Tổng">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Đặt trước :</div>
                        </div>
                        <input type="text" class="form-control" name="Dat_coc" placeholder="Đặt trước">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Loại :  </div>
                        </div>
                        <input type="text" class="form-control" name="code_thiep" placeholder="Mã thiếp">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Ngày trả :</div>
                        </div>
                        <input type="date" class="form-control" name="ngay_tra" placeholder="Ngày trả">
                    </div>
                    
                </div>
                
                </div>
              </div>
    
            </div>

          </div>
          <div class="form-group mt-8 mb-8 col-sm-2 text-center ">
              <button class="btn btn-primary btn-block" type="submit">Lưu</button>
          </div>
          
          </form>
      </div>
    </div>
  </div>
    {{--  Hien thi danh sach don dat in thiep cuoi --}}
    {{-- <div class="" style="padding: 0% 10% 0 10%">
      <table class="table table-hover alight-center" id="dataTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên Khách Hàng</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Cô dâu + Chú Rể</th>
            <th scope="col">#Act</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>
              <a class="btn btn-success"><i class="far fa-file-alt"></i></a>
              <a class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="far fa-edit"></i></a>
              <a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
            </td>
          
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>
              <a class="btn btn-success"><i class="far fa-file-alt"></i></a>
              <a class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="far fa-edit"></i></a>
              <a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry the Bird</td>
            <td>@twitter</td>
            <td>@fat</td>
            <td>
              <a class="btn btn-success"><i class="far fa-file-alt"></i></a>
              <a class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="far fa-edit"></i></a>
              <a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
        </tbody>
      </table>
    </div> --}}
    <div class="col-sm-12">
      
      <div class="card text-center">
        
        <div class="card-body">
          <h3 class="card-title" style="color:red">Danh sách đơn đặt Thiệp cưới</h3>
          
          <table class="table thead-dark table-responesive display" id="dataTable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">KH</th>
                <th scope="col">Cô dâu</th>
                <th scope="col">Chú rể</th>
                <th scope="col">SL-nhà trai</th>
                <th scope="col">SL-nhà gái</th>
                <th scope="col">Ngày trả</th>
                <th scope="col">Đặt cọc trước</th>
                <th scope="col">Thành tiền</th>
                <th scope="col">Còn lại</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($thiepcuoi as $item)
              <tr>
              <th scope="row">{{$item->id}}</th>
                <td>{{$item->KH}}</td>
                <td>{{$item->codau}}</td>
                <td>{{$item->chure}}</td>
                <td>{{$item->soluong_trai}}</td>
                <td>{{$item->soluong_gai}}</td>
                <td>{{$item->ngay_tra}}</td>
                <td>{{number_format($item->Dat_coc)}} VND</td>
                <td>{{number_format($item->Tong_tien)}} VND</td>
                <td>{{number_format($item->Tong_tien - $item->Dat_coc) }} VND</td>
                <td>
                
                    <a class="btn btn-info" href="/inthiepcuoi/chitiet/{{$item->id}}"><i class="far fa-file"></i></a>
                    <a class="btn btn-warning" href="/inthiepcuoi/edit/{{$item->id}}"><i class="far fa-edit"></i></a>
                    
                </td>
                <td>
                  <form action="/inthiepcuoi/delete/{{$item->id}}" method="POST">
                    {{@csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
    <script>
      $(document).ready(function() {
      var table = $('#dataTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
        }
      });
   
  $('#dataTable tbody').on('click', 'tr', function () {
      var data = table.row( this ).data();
      // alert( 'You clicked on '+data ); 
      // $('.data_display').text(data);

      $('.name_display').text(''+data[0]);
      $('.pos_display').text(''+data[1]);
      $('.phone_display').text(''+data[3]);
      ///
      if ( $(this).hasClass('selected') ) {
          $(this).removeClass('selected');
      }
      else {
          table.$('tr.selected').removeClass('selected');
          $(this).addClass('selected');
      }
  } );
} );

  </script>
</x-app-layout>