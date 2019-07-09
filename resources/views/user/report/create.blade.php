@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報作成</h2>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => 'report.store']) !!}
      {!! Form::input('hidden', 'user_id', null, ['class' => 'form-control']) !!}
        <div class="form-group form-size-small">
          {!! Form::input('date', 'reporting_time', null, ['class' => 'form-control']) !!}
            <span class="help-block"></span>
        </div>
        <div class="form-group @if(!empty($errors->first('title'))) has-error @endif">
          {!! Form::input('text', 'title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
            <span class="help-block">{{ $errors->first('title') }}</span>
        </div>
        <div class="form-group @if(!empty($errors->first('content'))) has-error @endif">
          {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Content']) !!}
            <span class="help-block">{{ $errors->first('content') }}</span>
        </div>
      {!! Form::submit('Add', ['class' => 'btn btn-success pull-right']) !!}
    {!! Form::close() !!}
  </div>
</div>

@endsection
