@extends('layouts.master')

@section('title')
    Dashboard1-Temp check
@endsection

@section('l2')
    class="active "
@endsection

@section('content')

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">登録している学生</h4>
      </div>
      <div class="card-body">
        @if($tempcheck == null)
          <h3>データが見つかりませんでした </h3>
              
        @else  
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>学生番号</th>
              <th>名前</th>
              <th>体温</th>
              <th>登録時間</th>                    
            </thead>
            <tbody>                
              @foreach ($tempcheck as $rowtempcheck)
                <tr>
                <td>{{ $rowtempcheck->user_id }}</td>
                <td>{{ $rowtempcheck->user_name }}</td>
                <td>{{ $rowtempcheck->temp }}</td>
                <td>{{ $rowtempcheck->temp_time }}</td>
                </tr>
              @endforeach                   
            @endif  
            </tbody>
          </table>
        </div>
      </div>
    </div>


    {{-- <div class="card">
      <div class="card-header">
        <h4 class="card-title">safecheck2-lated submit per user</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>line_id</th>
              <th>is_safe</th>
              <th>time_update</th>                    
            </thead>
            <tbody>                
              @foreach ($safecheck2 as $rowsafecheck2)
                <tr>
                <td>{{ $rowsafecheck2->line_id }}</td>
                <td>{{ $rowsafecheck2->is_safe }}</td>
                <td>{{ $rowsafecheck2->time_update }}</td>                    
                </tr>
              @endforeach                   
              
            </tbody>
          </table>
        </div>
      </div>
    </div> --}}


    {{-- <div class="card">
      <div class="card-header">
        <h4 class="card-title">safecheck3-lated submit per user and not safe</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>line_id</th>
              <th>is_safe</th>
              <th>time_update</th>                    
            </thead>
            <tbody>                
              @foreach ($safecheck3 as $rowsafecheck3)
                <tr>
                <td>{{ $rowsafecheck3->line_id }}</td>
                <td>{{ $rowsafecheck3->is_safe }}</td>
                <td>{{ $rowsafecheck3->time_update }}</td>                    
                </tr>
              @endforeach                   
              
            </tbody>
          </table>
        </div>
      </div>
    </div> --}}

  
  

@endsection

@section('scripts')
<script type="text/javascript" src="js/app.js"></script>
    
@endsection



