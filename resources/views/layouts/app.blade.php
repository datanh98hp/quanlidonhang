<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
       
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Major+Mono+Display&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Peta&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&display=swap" rel="stylesheet">
        <!-- Styles -->
        {{-- <link rel="stylesheet" href="../assets/css/app.css"> --}}
        <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        @livewireStyles
        <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans container-fluid antialiased sb-nav-fixed">
        {{-- <div class="min-h-screen bg-gray-100">
            {{-- @livewire('navigation-dropdown') --}}

            <!-- Page Heading -->
            {{-- <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header> --}}
            <style>
                .center {
                    display: block;
                    margin-left: 25%;
                    margin-right: auto;
                    margin-bottom: 20px;
                    width: 50%;
                    }
            </style>
            
        </div>
        @livewire('navigation-dropdown')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="media center">
                                @if(Auth::user()->type==2)
                                    <img src="https://orbitcareers.com/wp-content/uploads/2019/04/Accounting-Icon.png" width="60%"  class="mr-3" alt="permission_avt">
                                @elseif(Auth::user()->type==1)
                                    <img src="https://www.iconfinder.com/data/icons/iphone-black-people-svg-icons/20/admin_add_user_edit_delete_worker_up_unstick_unlock-512.png" class="mr-3" alt="...">
                                @endif
                                <div class="media-body">
                                </div>
                              </div>
                            {{-- ADMIN --}}
                            @if (Auth::user()->type<=3)
                                <div class="sb-sidenav-menu-heading">Quản trị</div>
                                <a class="nav-link" href="/dashboard">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                                {{-- KE TOAN --}}
                            @elseif(Auth::user()->type<=3)
                                
                            @endif
                            {{--  --}}
                            @if(Auth::user()->type <=3)
                            <div class="sb-sidenav-menu-heading">Công việc</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTasks" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Nhắc công việc
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseTasks" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/task">Event</a>
                                    {{-- <a class="nav-link" href="/thongke">Thống kê</a> --}}
                                </nav>
                            </div>
                            @endif
                            {{--  --}}
                            @if(Auth::user()->type <=2)
                            <div class="sb-sidenav-menu-heading">Nghiệp vụ</div>
                            <a class="nav-link collapsed" href="/dathang" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Đơn đặt hàng
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/inthiepcuoi">In Thiệp Cưới</a>
                                    <a class="nav-link" href="/dathang">Đơn hàng</a>
                                    
                                </nav>
                                
                            </div>
                            @endif
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Quản lí
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            {{-- ADMIN _ KE TOAN --}}
                            @if(Auth::user()->type <=3)
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    {{-- ADMIN --}}
                                   
                                    {{-- ---Ke toan---- --}}
                                    @if (Auth::user()->type <= 3)
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Thiết bị - vật liệu
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="/vatlieu">Vật liệu</a>
                                            {{-- <a class="nav-link" href="/vattu">Vật tư</a> --}}
                                            {{-- <a class="nav-link" href="/baocao">Báo cáo</a> --}}
                                        </nav>
                                        
                                    </div>
                                    @if (Auth::user()->type <= 2)
                                        <a class="nav-link" href="/thuchi">Quản lí thu chi</a>
                                        <a class="nav-link" href="/danh-muc">Danh mục</a>
                                    @endif
                                  
                                        
                                   @endif
                                   {{-- @if (Auth::user()->type == 3)
                                   <a class="nav-link" href="/danhsachvatlieucan">
                                        Danh sách vật liệu cần   
                                    </a>
                                    @endif --}}
                                </nav>  
                            </div>
                            @endif

                            @if (Auth::user()->type==1)
                                <div class="sb-sidenav-menu-heading">Nhân sự</div>
                                @if (Auth::user()->type == 1)
                                        <a class="nav-link" href="/usermanage">
                                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                            Quản lí người dùng
                                        </a>
                                @endif
                                <a class="nav-link" href="/nhanvien">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Nhân viên
                                </a>
                                {{-- <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Bảng lương
                                </a> --}}
                            @endif
                            @if (Auth::user()->type<=2)
                               
                            <div class="sb-sidenav-menu-heading">Báo cáo</div>
                            <a href="/bao-cao" class="nav-link collapsed" href="/dathang" data-toggle="collapse" data-target="#collapseLayoutsBc" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Báo cáo thống kê
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayoutsBc" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/bao-cao-dh">Báo cáo doanh thu đơn hàng</a>
                                    {{--  --}}
                                    <a class="nav-link" href="/bao-cao-tonkho-mh">Báo cáo mặt hàng tồn kho</a>
                                    <a class="nav-link" href="/bao-cao-tonkho-vl">Báo cáo Vật liệt tồn</a>
                                    {{-- <a class="nav-link" href="#">Báo cáo thu chi</a>
                                    <a class="nav-link" href="#">Báo công nợ của KH</a> --}}
                 
                                </nav>
                                
                            </div>
                            @endif
                            {{-- Backup-file --}}
                            <a href="/backups-file" class="nav-link collapsed">
                                <div class="sb-nav-link-icon"><i class="fas fa-back-up"></i></div>
                                Backup dữ liệu
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Trung tâm</div>
                        Quảng cáo Thiện Phúc
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>  
                    
                    @section('status')
                    <div class="alert alert-success" role="alert">
                    
                    </div>
                    @endsection
                    <!-- Page Content -->
                        {{ $slot }}
                    {{-- @yield('content') --}}
                       
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        
                        <div class="d-flex align-items-center justify-content-between small">
                            <img style="max-width: 30px;" class="rounded-circle" src="https://scontent.fdad1-1.fna.fbcdn.net/v/t1.0-9/75492411_1374272992735373_3186880362290610176_n.jpg?_nc_cat=105&ccb=2&_nc_sid=7aed08&_nc_ohc=RI4XYLBtUX4AX-nver3&_nc_ht=scontent.fdad1-1.fna&oh=d6016fec497829836c525b2fc08a226b&oe=5FDFC718">
                            <div class="text-muted">Copyright &copy; CNT57CL 2020</div>
                            <div>
                                <a href="#">Ứng dụng</a>
                                &middot;
                                <a href="#">DA Terms &amp; Đồ Án Tốt Nghiệp </a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        @stack('modals')

        @livewireScripts
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/js/scripts.js')}}"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>  --}}
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/datatables-demo.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
        
        <script src=" https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
      
</html>
