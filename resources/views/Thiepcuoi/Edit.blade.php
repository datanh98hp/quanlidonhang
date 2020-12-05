<x-app-layout>
    <div class="col-md-10" style="margin: 0% 0% 10% 10%">
    <h2 class="text-center">Cập nhật thông tin -  {{$thiepcuoi->KH}}</h2>
        
    <form action="/inthiepcuoi/update/{{$thiepcuoi->id}}" method="POST">
        {{csrf_field()}}
          {{method_field('PUT')}}
            <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                      <div class="col-md-12">  
                          <div class="form-group">
                              <label for="inputAddress2">Khách hàng : </label>
                              <input type="text" class="form-control" name="KH" value="{{$thiepcuoi->KH}}" placeholder="Khách Hàng">
                          </div>
                      </div>
                      <hr>
                    <div class="form-row">
                      <div class="col-md-6">
                          <label>Nhà Trai</label>
                          <div class="form-group">
                              <label class="small mb-1" for="inputFirstName">Ông :</label>
                              <input class="form-control py-4" name="o_nhatrai" type="text" value="{{$thiepcuoi->o_nhatrai}}" placeholder="Ông" />
                              <label class="small mb-1" for="inputFirstName">Bà :</label>
                              <input class="form-control py-4" name="b_nhatrai" type="text" value="{{$thiepcuoi->b_nhatrai}}" placeholder="Bà" />
                          </div>
                      </div>
                      <div class="col-md-6">
                          <label>Nhà Gái</label>
                          <div class="form-group">
                              <label class="small mb-1" for="inputLastName">Ông :</label>
                              <input class="form-control py-4" name="o_nhatgai" type="text" value="{{$thiepcuoi->o_nhatgai}}" placeholder="Ông" />
                              <label class="small mb-1" for="inputLastName">Bà :</label>
                              <input class="form-control py-4" name="b_nhagai" type="text" value="{{$thiepcuoi->b_nhagai}}" placeholder="Bà" />
                          </div>
                      </div>
                       <h3 style="color: red;" class="text-center">Trân trọng 
                           <select required name="qh" name="qh"> 
                                <option value="kính" @if ($thiepcuoi->qh==="kính")
                                    selected="true"
                                @else
                                
                                @endif>kính</option>
                                <option value="thân" @if ($thiepcuoi->qh==="thân")
                                  selected="true"
                              @else
                             
                              @endif>thân</option>
                                
                              </select>
                           mời tới dự bữa cơm thân mật mừng lễ thành hôn của 
                           <select required name="of">
                                <option value="2" @if ($thiepcuoi->of==="2")
                                    selected="true"
                                @else
                                
                                @endif>2</option>
                                <option value="2 con" @if ($thiepcuoi->of==="2 con")
                                  selected="true"
                              @else
                            
                              @endif>2 con</option>
                              <option value="2 cháu" @if ($thiepcuoi->of==="2 cháu")
                                  selected="true"
                              @else
                            
                              @endif>2 cháu</option>
                          </select>
                          chúng tôi.
                       </h3>
                  </div>
                  
                  <div class="form-row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="small mb-1" for="inputPassword">Chú rể :</label>
                              <input class="form-control py-4" name="chure" value="{{$thiepcuoi->chure}}" type="text" placeholder="" />
                          </div>
                          <div class="form-group">
                              <label for="exampleFormControlSelect1">Bậc</label>
                              <select class="form-control" required name="bac_chure">
                                <option value="Trưởng" @if ($thiepcuoi->bac_chure==="Trưởng")
                                    selected="true"
                                @else
                                
                                @endif>Trưởng</option>
                                <option value="Thứ" @if ($thiepcuoi->bac_chure==="Thứ")
                                  selected="true"
                              @else
                             
                              @endif>Thứ</option>
                                <option value="Út" @if ($thiepcuoi->bac_chure==="Út")
                                  selected="true"
                              @else
                              
                              @endif>Út</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="small mb-1" for="inputConfirmPassword">Cô dâu :</label>
                              <input class="form-control py-4" name="codau" value="{{$thiepcuoi->codau}}" type="text" placeholder="" />
                          </div>
                          <div class="form-group">
                              <label for="exampleFormControlSelect1">Bậc</label>
                              <select class="form-control" required name="bac_codau">
                                <option value="Trưởng" @if ($thiepcuoi->bac_codau==="Trưởng")
                                    selected="true"
                                @else
                                
                                @endif>Trưởng</option>
                                <option value="Thứ" @if ($thiepcuoi->bac_codau==="Thứ")
                                  selected="true"
                              @else
                             
                              @endif>Thứ</option>
                                <option value="Út" @if ($thiepcuoi->bac_codau==="Út")
                                  selected="true"
                              @else
                              
                              @endif>Út</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">  
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">Giờ ăn cơm (nhà trai):</div>
                                </div>
                                <input type="time" class="form-control" name="time_an_trai" value="{{$thiepcuoi->time_an_trai}}" placeholder="Username">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">Giờ tổ chức (nhà trai):</div>
                                </div>
                                <input type="time" class="form-control" name="time_tochuc_trai" value="{{$thiepcuoi->time_tochuc_trai}}" laceholder="Username">
                              </div>
                      </div>
                      <div class="col-md-6">  
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">Giờ ăn cơm (nhà gái):</div>
                            </div>
                            <input type="time" class="form-control" name="time_an_gai" value="{{$thiepcuoi->time_an_gai}}">
                            <div class="input-group-prepend">
                              <div class="input-group-text">Giờ tổ chức (nhà gái):</div>
                            </div>
                            <input type="time" class="form-control" name="time_tochuc_gai" value="{{$thiepcuoi->time_tochuc_gai}}">
                          </div>
                      </div>
                      <div class="col-md-6">  
                          <div class="form-group">
                              <label for="inputAddress2">Địa chỉ (nhà trai)</label>
                              <input type="text" class="form-control" name="diachi_nhatrai" value="{{$thiepcuoi->diachi_nhatrai}}" placeholder="Địa chỉ nhà trai">
                              <div class="col-md-6">
                                  <label for="inputEmail4">SĐT (trai) : </label>
                                  <input type="tel" class="form-control" name="sdt_trai" value="{{$thiepcuoi->sdt_trai}}">
                                  <label for="inputAddress2">Số lượng (nhà trai) :</label>
                                  <input type="number" min="0" name="soluong_gai" class="form-control" placeholder="Số lượng" value="{{$thiepcuoi->soluong_trai}}">
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">  
                          <div class="form-group">
                              <label for="inputAddress2">Địa chỉ (nhà gái)</label>
                              <input type="text" class="form-control" name="diachi_nhagai" value="{{$thiepcuoi->diachi_nhagai}}" placeholder="Địa chỉ nhà gái">
                              <div class="col-md-6">
                                  <label for="inputEmail4">SĐT (gái) : </label>
                                  <input type="tel" class="form-control" name="sdt_gai" value="{{$thiepcuoi->sdt_gai}}">
                                  <label for="inputAddress2">Số lượng (nhà trai) :</label>
                                  <input type="number" min="0" class="form-control" name="soluong_trai" placeholder="số lượng" value="{{$thiepcuoi->soluong_gai}}">
                              </div>
                          </div>
                      </div>
                      <hr>
                      <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">Tổng số tiền :</div>
                          </div>
                          <input type="text" class="form-control" name="Tong_tien" placeholder="Tổng tiền" value="{{$thiepcuoi->Tong_tien}}">
                      </div>
                      <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">Đặt trước :</div>
                          </div>
                          <input type="text" class="form-control" name="Dat_coc" placeholder="Đặt trước" value="{{$thiepcuoi->Dat_coc}}">
                      </div>
                      <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">Code thiệp :  </div>
                          </div>
                          <input type="text" class="form-control" name="code_thiep" placeholder="Mã thiếp" value="{{$thiepcuoi->code_thiep}}">
                      </div>
                      <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">Ngày trả :</div>
                          </div>
                          <input type="datetime" class="form-control" name="ngay_tra" placeholder="Ngày trả" value="{{ $thiepcuoi->ngay_tra }}">
                      </div>
                      
                  </div>
                  
                  </div>
                </div>
                <div class="form-group mt-8 mb-8 col-sm-2 text-center ">
                    <button class="btn btn-primary btn-block" type="submit">Lưu</button>
                </div>
              </div>
        </form>
    </div>
    

    </x-app-layout>