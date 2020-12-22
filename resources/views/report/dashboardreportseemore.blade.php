@extends('layouts.master')

@section('title')
    Dashboard-Safety check report
@endsection

@section('l1')
    class="active "
@endsection

@section('content')

<!-- start table 1 row-->
<div class="row">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Submit Info</h4>
      </div>
      <div class="card-body">
        @if($safecheck3 == null)
          <h3>No Data Was Found </h3>
              
        @else  

        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>line_id</th>
              <th>is_safe</th>
              <th>safe_mess</th>   
            </thead>
            <tbody>                
              @foreach ($safecheck3 as $rowsafecheck3)
                <tr>

                <td>{{ $rowsafecheck3->line_id }}</td>
                <td>{{ $rowsafecheck3->is_safe }}</td>
                <td>{{ $rowsafecheck3->safe_mess }}</td>
                                 
                </tr>
              @endforeach                   
          @endif     
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- end table row 1 -->
  
<!-- start table 2 row-->
<div class="row">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Student Info</h4>
      </div>
      <div class="card-body">
        @if($safecheck4 == null)
          <h3>No Data Was Found </h3>
              
        @else  

        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>Student ID</th>
              <th>State</th>
              <th>Message</th>   
            </thead>
            <tbody>                
              @foreach ($safecheck4 as $rowsafecheck4)
                <tr>

                <td>{{ $rowsafecheck4->user_id }}</td>
                <td>{{ $rowsafecheck4->user_name }}</td>
                <td>{{ $rowsafecheck4->user_address }}</td>
                                 
                </tr>
              @endforeach                   
          @endif     
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- end table row 2 -->

 
@endsection

@section('scripts')
<script type="text/javascript" src="js/app.js"></script>
    
@endsection



