<x-app-layout>
   <style>
      .selected{
        background-color: slategrey;
        cursor: pointer;
    }
   </style>
   <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <div>
               <table class="table table-responsive-sm" id="dataTable" >
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Username</th>
                      <th scope="col">Email</th>
                      <th scope="col">Type</th>
                      <th scope="col">#Act</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ($listUser as $item)
                     <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                           @if($item->type===1)
                           Admin
                           @elseif($item->type===2)
                           KE TOAN
                           @elseif($item->type===3)
                           DESIGNER
                           @endif
                        </td>
                        <td>
                          {{-- <a class="btn btn-success"><i class="far fa-file-alt"></i></a> --}}
                        <a class="btn btn-warning" href="{{url("edit/user/".$item->id)}}" ><i class="far fa-edit"></i></a>

                        {{-- <a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a> --}}

                        </td>
                      </tr>
                     @endforeach
                    
                   
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Thông tin người dùng</h5>
            @if (session('status'))
               <div class="alert alert-success" role="alert">
                     {{ session('status') }}
                  </div>
            @endif
            <div class="card md-3 center" style="max-width: 100%;">
               <div class="row no-gutters">
                 <div class="col-md-4">
                   <img src="https://i.pinimg.com/originals/ff/a0/9a/ffa09aec412db3f54deadf1b3781de2a.png" style="margin-top: 0" alt="...">
                 </div>
                 <div class="col-md-8">
                   <div class="card-body" style="padding: 2%">
                   {{-- <form action="/user/update/" method="POST"> --}}
                        <div class="form-row align-items-center">
                          <div class="col-auto my-1">
                           {{-- <input type="text" class="form-control mb-2" name="id" value="" id="inputId" placeholder="ID" > --}}
                           <div class="">
                              <label class="sr-only" for="inlineFormInput">Name</label>
                           <input type="text" class="form-control mb-2" name="username" value="" id="inputName" placeholder="User name">
                            </div>
                            {{-- <select class="custom-select mr-sm-2" name="type" id="inputType" required>
                              <option selected>Chọn...</option>
                              <option value="1">Admin</option>
                              <option value="2">KE TOAN</option>
                              <option value="3">DESIGNER</option>
                            </select> --}}
                            <div class="">
                              <label class="sr-only" for="inlineFormInput">Type</label>
                           <input type="text" class="form-control mb-2" name="type" value="" id="inputType" placeholder="Type user">
                          </div>
                          
                        </div>
                      {{-- </form> --}}
                   </div>
                 </div>
               </div>
             </div>
          </div>
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
      $('#inputId').val(data[0]);
      $('#inputName').val(data[1]);
      var type = data[3];
      $('#inputType').val(type);
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