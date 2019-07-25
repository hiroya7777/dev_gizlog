@extends ('common.user')
@section ('content')

<h1 class="brand-header">質問編集</h1>

<div class="main-wrap">
  <div class="container">
  {!!  Form::open(['route' => 'question.confirm']) !!}
      <div class="form-group">
        <select name='tag_category_id' class = "form-control selectpicker form-size-small" id ="pref_id">
          <option value="{{ $question->tag_category_id }}">{{ $question->category->name }}</option>
          @foreach($allcategories as $allcategory )
            <option value= "{{$allcategory->id}}" >{{ $allcategory->name }}</option>
          @endforeach
        </select>
        <span class="help-block"></span>
      </div>
      <div class="form-group">
        {!! Form::input('text', 'title', $question->title, ['class' => 'form-control']) !!}
        <span class="help-block"></span>
      </div>
      <div class="form-group">
        {!! form::textarea('content', $question->content, ['class' => 'form-control', 'placeholder' => 'Please write down your question here...']) !!}
        <span class="help-block"></span>
      </div>
      <input name="confirm" class="btn btn-success pull-right" type="submit" value="update">
    {!! Form::close() !!}
  </div>
</div>

@endsection

