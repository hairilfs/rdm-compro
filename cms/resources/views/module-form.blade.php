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
                            @switch($category)
                                @case('text')
                                    <h3 class="block-title">Simple Text</h3>
                                    @break
                                @case('image')
                                    <h3 class="block-title">Single Image</h3>
                                    @break
                                @case('images')
                                    <h3 class="block-title">Double Image</h3>
                                    @break
                                @case('text_image')
                                    <h3 class="block-title">Text &amp; Image</h3>
                                    @break                            
                                @default
                                    <h3 class="block-title">Other Module</h3>
                            @endswitch                            
                        </div>

                        <div class="block-content">
                            @php
                                $obj = $module->content ? json_decode($module->content) : (object)['content' => null];
                            @endphp
                            @switch($category)
                                @case('text')
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <div class="form-material">
                                                <textarea class="ckeditor" id="text" name="text">{!! $obj->content !!}</textarea>
                                                <label for="text">Text</label>
                                            </div>
                                        </div>
                                    </div>
                                    @break

                                @case('image')
                                    <h3 class="block-title">Single Image</h3>
                                    @break
                                @case('images')
                                    <h3 class="block-title">Double Image</h3>
                                    @break
                                @case('text_image')
                                    <h3 class="block-title">Text &amp; Image</h3>
                                    @break                            
                                @default
                                    <h3 class="block-title">Other Module</h3>
                            @endswitch                                
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
                </div>
            </div>
        </form>     
    </div>

    <!-- END Page Content -->
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
