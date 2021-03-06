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

                    <div class="block block-bordered" id="module_list">
                        <div class="block-header">
                            <div class="block-options-simple block-options">
                                <button v-show="changed" class="btn btn-xs btn-primary" type="button" v-on:click="sorting" :disabled="isSorting"><i class="fa fa-refresh" :class="{ 'fa-spin': isSorting }"></i> Save change</button>
                                <button class="btn btn-xs btn-success" type="button" data-toggle="modal" data-target="#modal_module"><i class="fa fa-fw fa-plus"></i> Add new</button>
                            </div>
                            <h3 class="block-title">Modules</h3>
                        </div>

                        <div class="block-content" id="sortable_wrapper">

                            <div v-for="(data, index) in module" class="block block-bordered block-rounded block-module-item" :data-id="data.module_id">
                                <div class="block-content bg-gray-light" style="padding-bottom: 20px;">
                                    <div class="block-header">
                                        <ul class="block-options">
                                            <a :href="baseUrl+'module/'+moduleConfig(data.module_type)+'/'+data.module_id+'?project='+data.project_cid" title="Edit"><i class="fa fa-fw fa-pencil text-primary"></i></a>
                                            <li>
                                                <button type="button" title="Delete" v-on:click="return deleteModule(data.module_id)"><i class="fa fa-trash text-danger"></i></button>
                                            </li>
                                            <li title="Move..." style="cursor: move;">
                                                <i class="fa fa-arrows"></i>
                                            </li>
                                        </ul>
                                        <h3 class="block-title">@{{ moduleType(data.module_type) }}</h3>
                                    </div>

                                    <div class="block-content">
                                        <template v-if="data.module_type == 1">
                                            <p v-html="data.content"></p>
                                        </template>

                                        <template v-else-if="data.module_type == 2">
                                            <img :src="data.image[0]" style="height: 120px;">
                                        </template>

                                        <template v-else-if="data.module_type == 3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <img :src="data.image[0]" style="height: 120px; margin: auto;">
                                                </div>
                                                <div class="col-md-6">
                                                    <img :src="data.image[1]" style="height: 120px; margin: auto;">
                                                </div>
                                            </div>
                                        </template>

                                        <template v-else-if="data.module_type == 4">
                                            <div class="row">
                                                <div class="col-md-6" v-if="!data.content_position">
                                                    <p v-html="data.content"></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <img :src="data.image[0]" style="height: 120px; margin: auto;">
                                                </div>
                                                <div class="col-md-6" v-if="data.content_position">
                                                    <p v-html="data.content"></p>
                                                </div>
                                            </div>
                                        </template>
                                        
                                        <template v-else>
                                            <p>Unknown Module</p>
                                        </template>
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

    <!-- END Page Content -->
</main>

@include('partials.modal-module')

@endsection

@push('scripts')

<script src="assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash"></script>
<script src="assets/js/plugins/ckeditor/ckeditor.js"></script>
<script src="assets/js/plugins/bootstrap-datetimepicker/moment.min.js"></script>
<script src="assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script src="assets/js/plugins/select2/select2.full.min.js"></script>
<script src="https://unpkg.com/promise-polyfill@7.1.0/dist/promise.min.js" async=""></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js" async=""></script>
<script type="text/javascript"> 
    
    var v_module = new Vue({
        el: '#module_list',
        data: {
            module: [],
            baseUrl: '{{ url('/').'/' }}',
            changed: false,
            isSorting: false
        },
        mounted: function() {
            this.$nextTick(function(){
                $.get('{{ url('module/list/'.$project->project_cid) }}', function(response) {
                    v_module.module = response;
                }, 'json');
            });
        },
        methods: {
            moduleType: function(type) {
                switch(parseInt(type)) {
                    case 1:
                        var name = 'Simple Text';
                        break;
                    case 2:
                        var name = 'Single Image';
                        break;
                    case 3:
                        var name = 'Double Image';
                        break;
                    case 4:
                        var name = 'Text & Image';
                        break;

                    default:
                        var name = 'Other Module';
                }

                return name;
            },
            moduleConfig: function(type) {
                switch(parseInt(type)) {
                    case 1:
                        var config = 'text';
                        break;
                    case 2:
                        var config = 'image';
                        break;
                    case 3:
                        var config = 'images';
                        break;
                    case 4:
                        var config = 'text_image';
                        break;

                    default:
                        var config = 'Other Module';
                }

                return config;
            },
            sorting: function() {
                v_module.isSorting = true;
                var sorting = [];

                _.forEach($('#sortable_wrapper').find('.block-module-item'), function(value, key){
                    sorting.push({ module_id: $(value).data('id'), text: 'true', sort: key });
                })

                $.post('{{ url('module/sort') }}', { _token: '{{ csrf_token() }}', sorting, module: true }, function(response){
                    if(response.counter) {
                        v_module.changed = false;
                        v_module.isSorting = false;
                        popup_notif('fa fa-check', 'Changes saved!', 'success');
                    }
                }, 'json');
            },
            deleteModule: function(id) {

                swal({
                    title: 'Are you sure want to delete?',
                    animation: false,
                    // customClass: 'animated fadeInDown',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {            

                        $.post('{{ url('module/delete') }}', { _token: '{{ csrf_token() }}', id: id }, function(response){
                            if(response.status) {

                                var idx = _.findIndex(v_module.module, ['module_id', id]);
                                v_module.module.splice(idx, 1);

                                popup_notif('fa fa-check', 'Delete success!', 'success');
                            }
                        }, 'json');
                    }
                });
            }

        }
    });

    jQuery(function () {
        App.initHelpers(['ckeditor', 'datetimepicker', 'select2']);

        $( "#sortable_wrapper").sortable({
            update: function( event, ui ) {
                v_module.changed = true;
            }
        });

        CKEDITOR.config.toolbar = [
           ['Format'],
           ['Bold','Italic','Underline'],
           ['Source']
        ];

        CKEDITOR.config.allowedContent = true;
        CKEDITOR.config.extraAllowedContent = '*(*);*{*}';
    });
</script>

@endpush
