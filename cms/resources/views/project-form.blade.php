@extends('layouts.app')

@section('title', 'Project Form')

@section('head')
<link rel="stylesheet" href="assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="assets/js/plugins/select2/select2-bootstrap.min.css">
<link rel="stylesheet" href="assets/js/plugins/select2/select2.min.css">
@endsection

@section('content')
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    {{ $project->project_cid ? 'Edit' : 'Add'}} Project
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Project</li>
                    <li><a class="link-effect" href="javascript:void(0)">{{ $project->project_cid ? 'Edit' : 'Add'}}</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">
        <form class="form-horizontal push-5-t" action="" method="post" enctype="multipart/form-data">
        	{{ csrf_field() }}
	        <div class="row">
	            <div class="col-md-8">
	                <div class="block block-bordered">
	                    <div class="block-content">
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="title" name="title" value="{{ $project->title }}" placeholder="Enter title..." required>
                                        <label for="title">Title</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <textarea class="form-control" id="excerpt" name="excerpt" rows="3" placeholder="Enter excerpt...">{{ $project->excerpt }}</textarea>
                                        <label for="excerpt">Excerpt</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <textarea class="ckeditor" id="description" name="description">{!! $project->description !!}</textarea>
                                        <label for="description">Description</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="partner" name="partner" value="{{ $project->partner }}" placeholder="Enter partner...">
                                        <label for="partner">Partner</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="project_status" name="project_status" value="{{ $project->project_status }}" placeholder="Enter project status...">
                                        <label for="project_status">Project Status</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <div class="form-material">
                                        <input class="form-control" type="number" min="1" max="9999" id="year" name="year" value="{{ $project->year }}" placeholder="Enter year...">
                                        <label for="year">Year</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="youtube_url" name="youtube_url" value="{{ $project->youtube_url }}" placeholder="Enter youtube link...">
                                        <label for="youtube_url">Youtube URL (optional)</label>
                                    </div>
                                </div>
                            </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-4">
	                <div class="block block-bordered">
	                    <div class="block-content">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <select class="js-select2 form-control" id="project_category" name="project_category" style="width: 100%;" data-placeholder="Choose categories.." multiple>
                                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            <option value="1">HTML</option>
                                            <option value="2">CSS</option>
                                            <option value="3">JavaScript</option>
                                            <option value="4">PHP</option>
                                            <option value="5">MySQL</option>
                                            <option value="6">Ruby</option>
                                            <option value="7">AngularJS</option>
                                        </select>
                                        <label for="project_category">Categories</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-8">
                                    <div class="form-material">
                                        <input class="js-datetimepicker form-control" type="text" id="published_at" name="published_at" value="{{ $project->getPublish() }}" placeholder="Choose a date..">
                                        <label for="published_at">Publish Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-8">
                                    <div class="form-material">
                                        <label class="css-input css-checkbox css-checkbox-success">
                                            <input type="checkbox" value="1" name="is_publish" {{ $project->is_publish ? 'checked' : '' }}><span></span> Publish?
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </form>
    </div>
    <!-- END Page Content -->
</main>

@endsection

@push('scripts')

<script src="assets/js/plugins/dropzonejs/dropzone.min.js"></script>
<script src="assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash"></script>
<script src="assets/js/plugins/ckeditor/ckeditor.js"></script>
<script src="assets/js/plugins/bootstrap-datetimepicker/moment.min.js"></script>
<script src="assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script src="assets/js/plugins/select2/select2.full.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script type="text/javascript">    
    jQuery(function () {
        App.initHelpers(['ckeditor', 'datetimepicker', 'select2']);

        CKEDITOR.config.toolbar = [
		   ['Format'],
		   ['Bold','Italic','Underline','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace'],
		   ['Source']
		] ;
    });
</script>

@endpush
