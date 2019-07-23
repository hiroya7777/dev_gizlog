@extends ('common.user')
@section ('content')

<h2 class="brand-header">質問投稿</h2>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => 'question.store']) !!}
      <div class="form-group">
        {{ Form::select('tag_category_id', ['' => 'Select category', '1' => 'front', '2' => 'back', '3' => 'infra', '4' => 'others'], null, ['class' => 'form-control selectpicker form-size-small', 'id' => 'pref_id']) }}
        <span class="help-block"></span>
      </div>
      <div class="form-group">
        <input class="form-control" placeholder="title" name="title" type="text">
        <span class="help-block"></span>
      </div>
      <div class="form-group">
        <textarea class="form-control" placeholder="Please write down your question here..." name="content" cols="50" rows="10"></textarea>
        <span class="help-block"></span>
      </div>
      <input name="confirm" class="btn btn-success pull-right" type="submit" value="create">
    {!! Form::close() !!}
  </div>
</div>

@endsection

