@extends('layouts.app')

@section('content')
<div >
  <div >
    <div >
      <div >
        <div >Chart Demo</div>

        

        <hr>
        {!!$pie->html() !!}
      </div>
    </div>
  </div>
</div>
{!! Charts::scripts() !!}


{!! $pie->script() !!}

@endsection