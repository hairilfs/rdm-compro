@extends('layouts.app')

@section('title', 'Prize')

@section('head')
<link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Prize
			<small>{{ $prize->id ? 'Edit' : 'Add' }} here.</small>
		</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		@if (Session::has('success'))
			<div class="callout callout-success">
	            <p><i class="fa fa-check"></i> {{ Session::get('success') }}</p>
	        </div>
		@endif
		<form role="form" method="post">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-8">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Main Data</h3>
					</div>

					<div class="box-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name" value="{{ $prize->name }}" placeholder="Enter name" required>
						</div>
						<div class="form-group">
							<label for="qty">Quantity / Stock</label>
							<input type="number" min="0" class="form-control" id="qty" name="qty" value="{{ $prize->qty_current }}" placeholder="Enter qty" required>
						</div>
						<div class="form-group">
							<label for="win_text">Win Text</label>
							<textarea name="win_text" class="form-control" id="win_text">{{ $prize->win_text }}</textarea>
						</div>
						<div class="form-group">
							<label for="lose_text">Lose Text</label>
							<textarea name="lose_text" class="form-control" id="lose_text">{{ $prize->lose_text }}</textarea>
						</div>
						<div class="form-group">
			                <label for="color">Color</label>
			                <div class="input-group my-colorpicker">
			                  	<input type="text" class="form-control" name="color" id="color" value="{{ $prize->color or '#000000'}}" required="">
			                  	<div class="input-group-addon">
			                    	<i></i>
			                  	</div>
			                </div>
			            </div>
			            <div class="form-group">
							<label for="probability">Probability</label>
							<input type="number" min="0" max="100" class="form-control" name="probability" id="probability" value="{{ $prize->probability or 0 }}" placeholder="Enter probability" required>
						</div>
						
						<div class="checkbox">
							<label>
								<input type="checkbox" name="publish" value="1" {{ $prize->publish ? 'checked' : '' }}> Publish?
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="win" value="1" {{ $prize->win ? 'checked' : '' }}> Win Category?
							</label>
						</div>

					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Winners</h3>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table class="table table-condensed table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Email</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($prize->winner as $key => $element)
									<tr>
										<td>{{ $key+1 }}</td>
										<td>{{ $element->email }}</td>
										<td>{{ $element->pivot->created_at }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		</form>

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@push('scripts')
<script src="bower_components/ckeditor/ckeditor.js"></script>
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script type="text/javascript">
	// CKEDITOR.replace('editor1');
	$('.my-colorpicker').colorpicker();
</script>

@endpush