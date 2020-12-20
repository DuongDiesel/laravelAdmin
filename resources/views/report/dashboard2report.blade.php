@extends('layouts.master')

@section('title')
    Dashboard1-Safety check
@endsection

@section('l2')
    class="active "
@endsection

@section('content')


    <div class="card">
      <div class="card-header">
        <h4 class="card-title">safecheck</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>user_id</th>
              <th>user_name</th>
              <th>line_id</th>
              <th>is_safe</th>
              <th>safe_location</th> 
              <th>safe_mess</th> 
              <th>time_update</th>                    
            </thead>
            <tbody>                
              @foreach ($safecheck as $rowsafecheck)
                <tr>
                <td>{{ $rowsafecheck->user_id }}</td>
                <td>{{ $rowsafecheck->user_name }}</td>
                <td>{{ $rowsafecheck->line_id }}</td>
                <td>{{ $rowsafecheck->is_safe }}</td>
                <td>{{ $rowsafecheck->safe_location }}</td>
                <td>{{ $rowsafecheck->safe_mess }}</td> 
                <td>{{ $rowsafecheck->time_update }}</td>
                </tr>
              @endforeach                   
              
            </tbody>
          </table>
        </div>
      </div>
    </div>


    <div class="card">
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
    </div>


    <div class="card">
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
    </div>

  
  

@endsection

@section('scripts')
<script type="text/javascript" src="js/app.js"></script>
    
@endsection



