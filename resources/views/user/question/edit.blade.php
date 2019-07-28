@extends ('common.user')
@section ('content')

<h1 class="brand-header">質問編集</h1>

<div class="main-wrap">
  <div class="container">
  {!! Form::open(['route' => 'question.confirm']) !!}
    <div class="form-group @if(!empty($errors->first('tag_category_id'))) has-error @endif">
      <select name='tag_category_id' class = "form-control selectpicker form-size-small" id ="pref_id">
        <option value="{{ $question->tag_category_id }}">{{ $question->category->name }}</option>
      @foreach($allcategories as $allcategory)
        <option value= "{{$allcategory->id}}" >{{ $allcategory->name }}</option>
      @endforeach
      </select>
      <span class="help-block">{{ $errors->first('tag_category_id') }}</span>
    </div>
    <div class="form-group @if(!empty($errors->first('title'))) has-error @endif">
      {!! Form::input('text', 'title', $question->title, ['class' => 'form-control']) !!}
      <span class="help-block">{{ $errors->first('title') }}</span>
      </div>
    <div class="form-group @if(!empty($errors->first('content'))) has-error @endif">
      {!! form::textarea('content', $question->content, ['class' => 'form-control', 'placeholder' => 'Please write down your question here...']) !!}
      <span class="help-block">{{ $errors->first('content') }}</span>
    </div>
      {!! Form::submit('UPDATE', ['class' => 'btn btn-success pull-right']) !!}
  {!! Form::close() !!}
  </div>
</div>

@endsection

