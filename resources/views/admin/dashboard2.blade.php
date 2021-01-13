@extends('layouts.master')

@section('title')
    Dashboard2-user_info
@endsection

@section('l3')
    class="active "
@endsection

@section('content')

<div class="card">
    <div class="card-header">
      <h4 class="card-title">学生情報</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead class=" text-primary">
            <th>学生番号</th>
            <th>学生名前</th>
            <th>LINE名前</th>
            <th>住所</th>  
            <th>LINE ID</th>  
            <th>登録時間</th>                      
          </thead>
          <tbody>                
            @foreach ($user_info as $rowuser_info)
              <tr>
              <td>{{ $rowuser_info->user_id }}</td>
              <td>{{ $rowuser_info->user_name }}</td>
              <td>{{ $rowuser_info->displayname }}</td>
              <td>{{ $rowuser_info->user_address }}</td>  
              <td>{{ $rowuser_info->line_userid }}</td>  
              <td>{{ $rowuser_info->time_update }}</td>                      
              </tr>
            @endforeach                   
            
          </tbody>
        </table>
      </div>
    </div>
</div>


@endsection

@section('scripts')
    
@endsection