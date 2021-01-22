@extends('layouts.master')

@section('title')
    Dashboard-Safety check report
@endsection

@section('l1')
    class="active "
@endsection

@section('content')

<!-- start container-->
<div class="container-fluid" style="margin-top:50px;">
  <!-- start panel-->
   <div class="panel panel-default">
     <div class="panel-heading">
         <h3 style="text-align:center;" class="panel-title">安否確認の結果</h3>
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

  <!-- start table 1 row-->
  <div class="row">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">安全ではない学生 </h4>
      </div>
      <div class="card-body">
        @if($safecheck3 == null)
          <h3>データが見つかりませんでした</h3>
              
        @else  

        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>ID</th>
              <th>LINE ID</th>
              <th>安全状態</th>
              <th>登録時間</th>   
              <th>詳しく</th>                  
            </thead>
            <tbody>                
              @foreach ($safecheck3 as $rowsafecheck3)
                <tr>
                <td>{{ $rowsafecheck3->id }}</td>
                <td>{{ $rowsafecheck3->line_id }}</td>
                <td>{{ $rowsafecheck3->is_safe }}</td>
                <td>{{ $rowsafecheck3->time_update }}</td> 
                <td>
                  <a href='/dashboardreportseemore/{{ $rowsafecheck3->id }}' >
                    <button class="btn btn-primary">詳しく見る</button>
                  </a>
              </td>                   
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
  
  <!-- start table 2row-->
  <div class="row">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">登録した全員の学生</h4>
      </div>
      <div class="card-body">
        @if($safecheck2 == null)
          <h3> データが見つかりませんでした</h3>
              
        @else     
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th> LINE ID</th>
              <th>安全状態</th>
              <th>詳しく</th>                      
            </thead>
            <tbody>                
              @foreach ($safecheck2 as $rowsafecheck2)
                <tr>
                <td>{{ $rowsafecheck2->line_id }}</td>
                <td>{{ $rowsafecheck2->is_safe }}</td>
                <td>
                  <a href='/dashboardreportseemore/{{ $rowsafecheck2->id }}' >
                    <button class="btn btn-primary">詳しく見る </button>
                  </a>
              </td>                        
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
  
</div>
<!-- end container-->

  {!! Charts::scripts() !!}

  {!! $pie_respond->script() !!}
  {!! $pie_Safe->script() !!}

@endsection

@section('scripts')
<script type="text/javascript" src="js/app.js"></script>
    
@endsection



