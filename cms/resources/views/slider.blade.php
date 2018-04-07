@extends('layouts.app')

@section('title', 'Slider')

@section('head')

<link rel="stylesheet" href="assets/js/plugins/dropzonejs/dropzone.min.css">
{{-- <link rel="stylesheet" href="assets/js/plugins/sweetalert2/sweetalert2.min.css"> --}}

@endsection

@section('content')
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Slider - {{ $category }} <small>All summary here.</small>
                </h1>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-md-7" id="vue_slider">
                <div class="block block-bordered">
                    <div class="block-header">
                        <div class="block-options-simple block-options">
                            <button v-show="!empty" class="btn btn-xs btn-primary" type="button" v-on:click="sorting" :disabled="isSorting"><i class="fa fa-refresh" :class="{ 'fa-spin': isSorting }"></i> Save change</button>
                        </div>
                        <h3 class="block-title">Images</h3>
                    </div>

                    <div class="block-content" id="sortable_wrapper">
                        {{-- <p v-show="empty">No images, please upload &raquo;</p> --}}

                        <div v-for="data in images" class="block block-bordered block-rounded block-slider-item" :data-id="data.id">
                            <div class="block-content bg-gray-light" style="padding-bottom: 20px;">
                                <ul class="block-options">
                                    <li>
                                        <button type="button" title="Delete" :data-id="data.id" v-on:click="return deleteImage(data.id)"><i class="fa fa-trash text-danger"></i></button>
                                    </li>
                                    <li title="Move..." style="cursor: move;">
                                        <i class="fa fa-arrows"></i>
                                    </li>
                                </ul>
                                <img :src="data.url" style="height: 120px;">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="block block-bordered">
                    <div class="block-header">
                        <h3 class="block-title">Drop Image</h3>
                    </div>
                    <div class="block-content">
                        <div class="form-group">
                            <form class="dropzone" id="slider-dropzone" action="{{ url()->current() }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>

{{-- <iframe src="http://localhost:81/rdm-wheel/cms/public/prize" width="100%"></iframe> --}}
@endsection

@push('scripts')

<script src="https://unpkg.com/promise-polyfill@7.1.0/dist/promise.min.js" async=""></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js" async=""></script>
<script src="assets/js/plugins/dropzonejs/dropzone.min.js"></script>
<script src="assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash"></script>

<script type="text/javascript">    
    jQuery(function () {
        $( "#sortable_wrapper").sortable({
            update: function( event, ui ) {
                vue_slider.empty = false;
            }
        });        
    });

    Dropzone.options.sliderDropzone = {
        paramName: 'file',
        maxFilesize: 5, // MB
        maxFiles: 10,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        init: function() {
            this.on("success", function(file, server) {
                console.log(file.status, file.name); 
                vue_slider.images.push({ id: server.slider_id, url: file.dataURL });
                setTimeout(function(){
                    vue_slider.sorting();
                }, 1000);
            });
        }
    };

    var vue_slider = new Vue({
        el: '#vue_slider',
        data: {
            images: [],
            empty: true,
            isSorting: false
        },
        mounted: function() {
            this.$nextTick(function () {
                this.getList();
            });
        },
        methods: {
            getList: function() {
                $.get('{{ url()->current().'/list' }}', function(response){
                    if(response.length) {
                        _.forEach(response, function(value, key){
                            vue_slider.images.push({ id: value.slider_id, url: value.image_url});
                        })
                    }
                });
            },
            sorting: function() {
                vue_slider.isSorting = true;
                var sorting = [];

                _.forEach($('#sortable_wrapper').find('.block-slider-item'), function(value, key){
                    sorting.push({ slider_id: $(value).data('id'), sort: key+1 });
                })

                $.post('{{ url()->current().'/sort' }}', { _token: '{{ csrf_token() }}', sorting }, function(response){
                    if(response.counter) {
                        vue_slider.empty = true;
                        vue_slider.isSorting = false;
                        popup_notif('fa fa-check', 'Changes saved!', 'success');
                    }
                }, 'json');
            },
            deleteImage: function(id) {

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

                        $.post('{{ url()->current().'/delete' }}', { _token: '{{ csrf_token() }}', id: id }, function(response){
                            if(response.status) {

                                var idx = _.findIndex(vue_slider.images, ['id', id]);
                                vue_slider.images.splice(idx, 1);

                                popup_notif('fa fa-check', 'Delete success!', 'success');
                            }
                        }, 'json');
                    }
                });
            }
        }
    });

</script>

@endpush
