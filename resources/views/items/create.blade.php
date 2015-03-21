@extends('app')

@section('content')
<h2 class="page-header">項目作成</h2>
{!! Form::open() !!}
<div class="form-group">
	<label>項目名</label>
	{!! Form::input('text', 'name', null, ['required', 'class' => 'form-control']) !!}
	<label>テーブル名</label>
	{!! Form::input('text', 'table_name', null, ['required', 'class' => 'form-control']) !!}
	<label>ユーザIDカラム名</label>
	{!! Form::input('text', 'user_id_column_name', null, ['required', 'class' => 'form-control']) !!}
	<label>その他条件</label>
	{!! Form::input('text', 'other_criteria', null, ['class' => 'form-control']) !!}
	<label>日付カラム名</label>
	{!! Form::input('text', 'date_column', null, ['required', 'class' => 'form-control']) !!}
	<label>リテンション期間</label>
	{!! Form::input('number', 'retention_span', null, ['required', 'class' => 'form-control']) !!}
	<label>ユーザグルーピング期間</label>
	{!! Form::input('number', 'user_grouping_span', null, ['required', 'class' => 'form-control']) !!}
	<label>開始日</label>
	{!! Form::input('date', 'start_date', null, ['required', 'class' => 'form-control']) !!}
</div>
<button type="submit" class="btn btn-default">作成</button>
{!! Form::close() !!}
@endsection