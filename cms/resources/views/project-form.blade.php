@extends('layouts.app')

@section('title', 'Project Form')

@section('head')
<link rel="stylesheet" href="assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="assets/js/plugins/select2/select2.min.css">
{{-- <link rel="stylesheet" href="assets/js/plugins/select2/select2-bootstrap.min.css"> --}}
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
                        <div class="block-header">
                            <ul class="block-options">
                                <li>
                                    <button type="button"><i class="si si-settings"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Main Data</h3>
                        </div>
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
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        @php
                                            $selected_category = explode(',', $project->project_category);
                                        @endphp
                                        <select class="js-select2 form-control" id="project_category" name="project_category[]" style="width: 100%;" data-placeholder="Choose categories.." multiple>
                                            <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            @foreach ($category as $element)
                                            <option value="{{ $element->slug }}" {{ in_array($element->slug, $selected_category) ? 'selected' : '' }}>{{ $element->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="project_category">Categories</label>
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
                        <div class="block-header">
                            <ul class="block-options">
                                <li>
                                    <button type="button"><i class="si si-settings"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Main Data</h3>
                        </div>
                        <div class="block-content">
                            
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <img src="{{ $project->getImgUrl('portrait') }}" class="push-10-t" {!! $project->img_portrait_url ? 'width="100%"' : '' !!}>
                                        <input type="file" class="upload-preview push-10-t" id="img_portrait" name="img_portrait">
                                        <label for="img_portrait">Portrait Image</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <img src="{{ $project->getImgUrl('landscape') }}" class="push-10-t" {!! $project->img_landscape_url ? 'width="100%"' : '' !!}>
                                        <input type="file" class="upload-preview push-10-t" id="img_landscape" name="img_landscape">
                                        <label for="img_landscape">Landscape Image</label>
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
                                <div class="col-sm-12">
                                    <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>     
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="block block-bordered">
                    <div class="block-header">
                        <div class="block-options-simple block-options">
                            <button class="btn btn-xs btn-success" type="button" data-toggle="modal" data-target="#modal_module"><i class="fa fa-fw fa-plus"></i> Add new</button>
                        </div>
                        <h3 class="block-title">Modules</h3>
                    </div>
                    <div class="block-content">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- END Page Content -->

    <!-- Normal Modal -->
    <div class="modal" id="modal_module" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Lists of Modules</h3>
                    </div>
                    <div class="block-content">
                        <div class="content-grid">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="block block-link-hover2" href="{{ url('module/text') }}?project={{ $project->project_cid}}">
                                        <div class="block-content block-content-full bg-primary clearfix">
                                            <i class="si si-speech fa-2x text-white pull-right"></i>
                                            <span class="h4 text-white-op">Simple Text</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6">
                                    <a class="block block-link-hover2" href="javascript:void(0)">
                                        <div class="block-content block-content-full bg-city clearfix">
                                            <i class="si si-picture fa-2x text-white pull-right"></i>
                                            <span class="h4 text-white-op">Single Image</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="block block-link-hover2" href="javascript:void(0)">
                                        <div class="block-content block-content-full bg-flat clearfix">
                                            <i class="si si-layers fa-2x text-white pull-right"></i>
                                            <span class="h4 text-white-op">Double Image</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6">
                                    <a class="block block-link-hover2" href="javascript:void(0)">
                                        <div class="block-content block-content-full bg-warning clearfix">
                                            <i class="si si-grid fa-2x text-white pull-right"></i>
                                            <span class="h4 text-white-op">Text &amp; Image</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Normal Modal -->
</main>

@endsection

@push('scripts')

{{-- <script src="assets/js/plugins/dropzonejs/dropzone.min.js"></script>
<script src="assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash"></script> --}}
<script src="assets/js/plugins/ckeditor/ckeditor.js"></script>
<script src="assets/js/plugins/bootstrap-datetimepicker/moment.min.js"></script>
<script src="assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script src="assets/js/plugins/select2/select2.full.min.js"></script>
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
