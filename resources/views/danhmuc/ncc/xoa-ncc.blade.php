<div>
    <form id="formXoa" action="/del-ncc/{{$id}}" method="POST">
        {{ @csrf_field() }}
        {{method_field('DELETE')}}
        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
    </form>
</div>
 
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $("button").trigger('click');
    });
  </script>
    