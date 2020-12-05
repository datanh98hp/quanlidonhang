<x-app-layout>
    <div class="container">
        <h5>Danh sách backup file</h5>
        
        <ul class="list-group">
                @for ($j = 0; $j < count($listfilenameBackUp); $j++)
                    <li class="list-group-item">
                        <i class="mx-4"><span>{{$j}}</span></i> - {{ $listfilenameBackUp[$j] }}  
                    <a class="btn btn-success inline" href="/download/backups-file/{{ $listfilenameBackUp[$j] }}"> Tải về</a>
                    </li>    
                @endfor

          </ul>
    </div>
</x-app-layout>