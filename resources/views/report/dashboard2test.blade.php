@extends('layouts.master')

@section('title')
    Dashboard1-Safety check
@endsection

@section('l2')
    class="active "
@endsection

@section('content')

  
<div class="col-9">
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
  </div>

  <div class="col-9">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">safecheck2</h4>
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
                <td>{{ $rowsafecheck->line_id }}</td>
                <td>{{ $rowsafecheck->is_safe }}</td>
                <td>{{ $rowsafecheck->time_update }}</td>                    
                </tr>
              @endforeach                   
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  

@endsection

@section('scripts')
<script type="text/javascript" src="js/app.js"></script>
    
@endsection


{{-- @extends('layouts.master')

@section('title')
    Dashboard1-Safety check
@endsection

@section('l2')
    class="active "
@endsection

@section('content')

  <!-- start container-->
  <div class="container-fluid" style="margin-top:50px;">
   <!-- <h3 style="text-align:center;margin-top:2%;">Make Google Pie Chart </h3> -->
   
   
   <!-- start panel-->
    <div class="panel panel-default">
      <div class="panel-heading">
          <h3 style="text-align:center;" class="panel-title">Safety Check Results</h3>
      </div>

      <!-- start chart row-->
      <div class="row">
        <div id="col1" class="col-lg-6 col-md-6 col-sm-12">
          <div class="panel-body">
            {!!$pie_Safe->html() !!}
          </div>
        </div>

        <div id="col2" class="col-lg-6 col-md-6 col-sm-12">
          <div class="panel-body">
            {!!$pie_respond->html() !!}
          </div>
        </div>
      </div>
      <!-- end row-->
    </div>
    <!-- end panel -->

  </div>
    <!-- end row-->
  
    <!-- start row 2 -->
  <div class="row" style="margin-left:20px;">
    <div id="col21" class=".col-md-3 .offset-md-3">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Fast Search</h4>
        </div>
        <div class="card-body">
          <button type="button" class="btn btn-success">Not Safe</button>
          <button type="button" class="btn btn-danger">Didn't Reply</button>
        </div>
        <h5 class="card-text" style="margin:30px;">Or Search By Student ID</h5>
        <form class="example" action="/action_page.php" style="margin:30px;max-width:200px">
          <input type="text" placeholder="Search.." name="search2">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>
    <div id="col21" class=".col-md-3 .offset-md-3">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> calendar</h4>
        </div>
      </div>
    </div>
    <!-- start Table colomn 2 -->
    <div class="col-9">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Users Table View</h4>
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
    </div>

    <!-- end Table colomn 2 -->

  </div>
  <!-- end row 2 -->

  
  </div>
  <!-- end container-->

{!! Charts::scripts() !!}


{!! $pie_respond->script() !!}
{!! $pie_Safe->script() !!}

@endsection

@section('scripts')
<script type="text/javascript" src="js/app.js"></script>
    
@endsection --}}