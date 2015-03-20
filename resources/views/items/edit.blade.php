@extends('app')

@section('content')
<h2 class="page-header">項目作成</h2>
{!! Form::open(['action' => ['ItemsController@postEdit', $item->id]]) !!}
<div class="form-group">
	<label>項目名</label>
	{!! Form::input('text', 'name', $item->name, ['required', 'class' => 'form-control']) !!}
	<label>テーブル名</label>
	{!! Form::input('text', 'table_name', $item->table_name, ['required', 'class' => 'form-control']) !!}
	<label>ユーザIDカラム名</label>
	{!! Form::input('text', 'user_id_column_name', $item->user_id_column_name, ['required', 'class' => 'form-control']) !!}
	<label>その他条件</label>
	{!! Form::input('text', 'other_criteria', $item->other_criteria, ['class' => 'form-control']) !!}
	<label>日付カラム名</label>
	{!! Form::input('text', 'date_column', $item->date_column, ['required', 'class' => 'form-control']) !!}
	<label>リテンション期間</label>
	{!! Form::input('number', 'retention_span', $item->retention_span, ['required', 'class' => 'form-control']) !!}
	<label>ユーザグルーピング期間</label>
	{!! Form::input('number', 'user_grouping_span', $item->user_grouping_span, ['required', 'class' => 'form-control']) !!}
	<label>開始日</label>
	{!! Form::input('date', 'start_date', $item->start_date, ['required', 'class' => 'form-control']) !!}
</div>
<button type="submit" class="btn btn-default">更新</button>
{!! Form::close() !!}
@endsection
