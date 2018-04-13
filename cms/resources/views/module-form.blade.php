@extends('layouts.app')

@section('title', 'Module Form')

@section('head')
<link rel="stylesheet" href="assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
@endsection

@section('content')
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    <a href="{{ url('/project/form/'.$project->project_cid) }}" title="Back to project: {{ $project->title }}">&laquo;</a>
                    {{ $module->module_id ? 'Edit' : 'Add'}} Module <small>: {{ $project->title }}</small>                    
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Module</li>
                    <li><a class="link-effect" href="javascript:void(0)">{{ $module->module_id ? 'Edit' : 'Add'}}</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content" id="vue_module">
        <form class="form-horizontal push-5-t" action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8">
                    <div class="block block-bordered">
                        <div class="block-header">
                            @if ($category == 'text')
                                <h3 class="block-title">Simple Text</h3>

                            @elseif($category == 'image')
                                <h3 class="block-title">Single Image</h3>

                            @elseif($category == 'images')
                                <h3 class="block-title">Double Image</h3>

                            @elseif($category == 'text_image')
                                <h3 class="block-title">Text &amp; Image</h3>

                            @else
                                <h3 class="block-title">Other Module</h3>

                            @endif                                                 
                        </div>

                        <div class="block-content">                            
                            @if($category == 'text')
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material" style="padding-top: 10px;">
                                            <textarea class="ckeditor" id="text" name="text">{!! $module->content !!}</textarea>
                                            <label for="text">Text</label>
                                        </div>
                                    </div>
                                </div>                                    
                            
                            @elseif($category == 'image')
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                            <img src="{{ $module->getImgUrl() }}" class="push-10-t" width="50%">
                                            <input type="file" class="upload-preview push-10-t" id="img1" name="img1">
                                            <input type="hidden" name="old_img1" value="{{ $module->images->count() ? $module->images[0]->module_image_id : '' }}">
                                            <label for="img1">Image</label>
                                        </div>
                                    </div>
                                </div>
                            
                            @elseif($category == 'images')
                                <div class="row" id="images_wrapper">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material">
                                                    <img src="{{ $module->getImgUrl() }}" class="push-10-t" width="50%">
                                                    <input type="file" class="upload-preview push-10-t" id="img1" name="img1">
                                                    <input type="hidden" name="old_img1" value="{{ $module->images->count() ? $module->images[0]->module_image_id : '' }}">
                                                    <label for="img1">Image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material">
                                                    <img src="{{ $module->getImgUrl(1) }}" class="push-10-t" width="50%">
                                                    <input type="file" class="upload-preview push-10-t" id="img2" name="img2">
                                                    <input type="hidden" name="old_img1" value="{{ $module->images->count() ? $module->images[1]->module_image_id : '' }}">
                                                    <label for="img2">Image</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>                              
                            
                            @elseif($category == 'text_image')
                                <h3 class="block-title">Text &amp; Image</h3>
                            
                            @else
                                <h3 class="block-title">Other Module</h3>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block block-bordered">
                        <div class="block-header">
                            <h3 class="block-title">Action</h3>
                        </div>
                        <div class="block-content">                            
                            <div class="form-group">
                                <div class="col-xs-8">
                                    <div class="form-material">
                                        <input class="js-datetimepicker form-control" type="text" id="published_at" name="published_at" value="{{ $module->getPublish() }}" placeholder="Choose a date..">
                                        <label for="published_at">Publish Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-8">
                                    <div class="form-material">
                                        <label class="css-input css-checkbox css-checkbox-success">
                                            <input type="checkbox" value="1" name="is_publish" {{ $module->is_publish ? 'checked' : '' }}><span></span> Publish?
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-sm btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($module->module_id)
                    <div class="block block-bordered">
                        <div class="block-header">
                            <h3 class="block-title">Module</h3>
                        </div>
                        <div class="block-content">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal_module"><i class="fa fa-plus"></i> Add new module</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </form>     
    </div>

    <!-- END Page Content -->
</main>

@include('partials.modal-module')

@endsection

@push('scripts')
{{-- 
<script src="assets/js/plugins/dropzonejs/dropzone.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash"></script> --}}
<script src="assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
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

        $("#images_wrapper").sortable({
            update: function( event, ui ) {
                // vue_slider.changed = true;
            }
        });
    });
</script>

@endpush
