@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報作成</h2>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => 'daily_report.store']) !!}
      <input class="form-control" name="user_id" type="hidden">
      <div class="form-group form-size-small">
        <input class="form-control" name="reporting_time" type="date">
          <span class="help-block"></span>
      </div>
      <div class="form-group @if(!empty($errors->first('title'))) has-error @endif">
        {!! Form::input('text', 'title', null, ['class' => 'form-control','placeholder' => 'Title']) !!} 
          <span class="help-block">{{ $errors->first('title') }}</span>
      </div>
      <div class="form-group @if(!empty($errors->first('contents'))) has-error @endif">
        {!! Form::textarea('contents',null,['class' => 'form-control', 'placeholder' => 'Content'] ) !!}
          <span class="help-block">{{ $errors->first('contents') }}</span>
      </div>
      <button type="submit" class="btn btn-success pull-right">Add</button>
    {!! Form::close() !!}
  </div>
</div>

@endsection

