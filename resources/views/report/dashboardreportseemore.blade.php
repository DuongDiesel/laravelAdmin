@extends('layouts.master')

@section('title')
    Dashboard-Safety check report
@endsection

@section('l1')
    class="active "
@endsection

@section('head')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKnLShvSaO30x2wxVJh7zocMd0VGt-e4w&callback=initMap"async defer></script>
@endsection

@section('content')

<!-- start table 1 row-->
<div class="row">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">登録情報</h4>
      </div>
      <div class="card-body">
        @if($safecheck3 == null)
          <h3>データが見つかりませんでした</h3>
              
        @else  

        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>LINE ID</th>
              <th>安全状態</th>
              <th>メッセージ</th>   
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
        <h4 class="card-title">学生の情報</h4>
      </div>
      <div class="card-body">
        @if($safecheck4 == null)
          <h3>データが見つかりませんでした</h3>
              
        @else  

        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>学生番号</th>
              <th>名前</th>
              <th>住所</th>   
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

  <!-- start table 3 row-->
<div class="row">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">登録時間</h4>
      </div>
      <div class="card-body">
        @if($safecheck3 == null)
          <h3>データが見つかりませんでした </h3>
              
        @else  

        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              
              <th>時間</th>   
            </thead>
            <tbody>                
              
                <tr>

                <td>{{ $todate }}</td>
                               
                </tr>
                           
          @endif     
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- end table row 4 -->

  <!-- start table 3 row-->
  <div class="row">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">緯度経度</h4>
      </div>
      <div class="card-body">
        @if($safecheck3 == null)
          <h3>データが見つかりませんでした </h3>
              
        @else  

        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              
              <th>緯度経度</th>   
            </thead>
            <tbody>                
              @foreach ($safecheck3 as $rowsafecheck3)
                <tr>

                <td>{{ $rowsafecheck3->location}}</td>
                              
                </tr>
              @endforeach            
          @endif     
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- end table row 4 -->

  <!-- start table 3 row-->
  <div class="row">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">居場所</h4>
      </div>
      <div class="card-body">
        @if($safecheck3 == null)
          <h3>データが見つかりませんでした</h3>
              
        @else  

        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              
              <th>居場所</th>   
            </thead>
            <tbody>                
              {!! $map['html'] !!}
              
                            
          @endif     
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- end table row 4 -->

 
@endsection

@section('scripts')
<script type="text/javascript" src="js/app.js"></script>
{!! $map['js'] !!}
@endsection



