@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
	@if ($model->id)
		Update Model
	@else
		Create Model
	@endif
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
	<h3>
		@if ($model->id)
		Update Model
		@else
			Create New Model
		@endif

		<div class="pull-right">
			<a href="{{ route('models') }}" class="btn-flat gray"><i class="icon-circle-arrow-left icon-white"></i> Back</a>
		</div>
	</h3>
</div>

<form class="form-horizontal" method="post" action="" autocomplete="off">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />


		<!-- General tab -->
		<div class="tab-pane active" id="tab-general">
			<!-- Model Title -->
			<div class="control-group {{ $errors->has('name') ? 'error' : '' }}">
				<label class="control-label" for="name">Model Name</label>
				<div class="controls">
					<input type="text" name="name" id="name" value="{{ Input::old('name', $model->name) }}" />
					{{ $errors->first('name', '<span class="help-inline">:message</span>') }}
				</div>
			</div>

			<div class="control-group {{ $errors->has('modelno') ? 'error' : '' }}">
				<label class="control-label" for="modelno">Model No.</label>
				<div class="controls">
					<input type="text" name="modelno" id="modelno" value="{{ Input::old('modelno', $model->modelno) }}" />
					{{ $errors->first('modelno', '<span class="help-inline">:message</span>') }}
				</div>
			</div>


			<!-- Depreciation -->
			<div class="control-group {{ $errors->has('depreciation_id') ? 'error' : '' }}">
				<label class="control-label" for="parent">Depreciation</label>
				<div class="controls">
					{{ Form::select('depreciation_id', $depreciation_list , Input::old('depreciation_id', $model->depreciation_id), array('class'=>'select2', 'style'=>'width:250px')) }}
					{{ $errors->first('depreciation_id', '<span class="help-inline">:message</span>') }}
				</div>
			</div>

			<!-- Category -->
			<div class="control-group {{ $errors->has('category_id') ? 'error' : '' }}">
				<label class="control-label" for="parent">Category</label>
				<div class="controls">
					{{ Form::select('category_id', $category_list , Input::old('category_id', $model->category_id), array('class'=>'select2', 'style'=>'width:250px')) }}
					{{ $errors->first('category_id', '<span class="help-inline">:message</span>') }}
				</div>
			</div>


	</div>

	<!-- Form Actions -->
	<div class="control-group">
		<div class="controls">
			<a class="btn btn-link" href="{{ route('models') }}">@lang('general.cancel')</a>
			<button type="submit" class="btn-flat success"><i class="icon-ok icon-white"></i> @lang('general.save')</button>
		</div>
	</div>
</form>
@stop
