<x-app-layout>
    <!-- $slot -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <!-- Chèn view -->
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}
    <div class="row" style="margin:30px;justify-content: space-evenly">
        <a href="#" class="btn card border-primary mb-3" style="max-width: 100%;">
          {{-- <div class="card-header">Tổng hóa đơn</div> --}}
          <div class="card-body text-link mb-4 text-center">
            <h5 class="card-title">Tổng đơn hàng trong tháng</h5>
            <h3 class="card-text">{{$TongDonhang_thang}}</h3>
            <h4 class="card-text">Đơn hàng</h4>
          </div>
        </a>
          <a href="#" class="btn card border-primary mb-4" style="max-width: 100%;">
            {{-- <div class="card-header">Tổng hóa đơn</div> --}}
            <div class="card-body text-primary text-center">
              <h5 class="card-title">Tổng đơn hàng trong ngày</h5>
              <h3 class="card-text">{{$countDonhang}}</h3>
              <h4 class="card-text">Đơn hàng</h4>
            </div>
          </a>
          <a href="#" class="btn card border-success mb-4 text-center" style="max-width: 18rem;">
    
            <div class="card-body">
              <h5 class="card-title">Tổng đơn hàng hoàn thành trong ngày</h5>
              <h3 class="card-text">{{$countDh_Hoanthanh}}</h3>
              <h4 class="card-text">Đơn hàng</h4>
            </div>
          </a>
          <a href="#" class="btn card border-success mb-4 text-center" style="max-width: 18rem;">
           
            <div class="card-body text-success">
              <h5 class="card-title">Tổng thu nhập Đơn hàng trong ngày</h5>
              <h3 class="card-text">{{number_format($count_gt_Dh_ht)}}</h3>
              <h4 class="card-text">VND</h4>
            </div>
          </a>
          <a href="#" class="btn card border-danger mb-4 text-center" style="max-width: 18rem;">
           
            <div class="card-body text-danger">
              <h5 class="card-title">Tổng thu/chi tiêu trong ngày</h5>
              <h3 class="card-text">{{ number_format($day_thu).' / '.number_format($day_chi) }}</h3>
              <h4 class="card-text">VND</h4>
            </div>
          </a>
          {{-- <div class="card border-succes mb-3 text-center" style="max-width: 18rem;">
           
            <div class="card-body">
              <h5 class="card-title">Tổng lợi nhuận thu được trong ngày</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div> --}}
    </div>
    <div class="container-fluid">
        {{-- <h1 class="mt-4">Charts</h1> --}}
        {{-- <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Charts</li>
        </ol> --}}
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area mr-1"></i>
                 - Thu nhập bình quân trong tháng - {{date('m')}}
            </div> 
            {{--  --}}
            <div class="card-body">
              <canvas id="charDT" width="100%" height="30">
            </div>
            <div class="card-footer small text-muted"> Cập nhật : {{now()}}</div>
        </div>
        
    </div>
    
   
</x-app-layout>
<script>
    var month_thu = <?php echo ($month_thu); ?>;
    var month_chi = <?php echo ($month_chi); ?>;
    var ctx2 = document.getElementById('charDT');
    var myChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Thu', 'Chi'],
            datasets: [{
                label: 'Chi',
                data: [month_thu,month_chi],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
           
        }
    });
</script>
// 
