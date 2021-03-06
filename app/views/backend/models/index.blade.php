@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Asset Models ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
	<h3>
		Asset Models

		<div class="pull-right">
			<a href="{{ route('create/model') }}" class="btn-flat success"><i class="icon-plus-sign icon-white"></i> Create New</a>
		</div>
	</h3>
</div>

<table id="example">
	<thead>
		<tr role="row">
			<th class="span3">@lang('admin/models/table.title')</th>
			<th class="span2">@lang('admin/models/table.modelnumber')</th>
			<th class="span1">@lang('admin/models/table.numassets')</th>
			<th class="span2">Depreciation</th>
			<th class="span1">Category</th>
			<th class="span2">@lang('table.actions')</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($models as $model)
		<tr>
			<td><a href="{{ route('update/model', $model->id) }}">{{{ $model->name }}}</a></td>
			<td>{{ $model->modelno }}</td>
			<td><a href="{{ route('view/model', $model->id) }}">{{ ($model->assets->count()) }}</a></td>
			<td>
			@if ($model->depreciation)
			{{ $model->depreciation->name }}
			 ({{ $model->depreciation->months }} months)
			@endif

			</td>
			<td>
			@if ($model->category)
			{{ $model->category->name }}
			@endif</td>
			<td>
				<a href="{{ route('update/model', $model->id) }}" class="btn-flat white">@lang('button.edit')</a>
				<a data-html="false" class="btn-flat danger delete-asset" data-toggle="modal" href="{{ route('delete/model', $model->id) }}" data-content="Are you sure you wish to delete this model?" data-title="Delete {{ htmlspecialchars($model->name) }}?" onClick="return false;">@lang('button.delete')</a>

			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop
