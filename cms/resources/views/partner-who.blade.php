@extends('layouts.app')

@section('title', 'Partner')

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
                    Partner &bull; <small>About-Who</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Partner</li>
                    <li><a class="link-effect" href="javascript:void(0)">About-Who</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-md-7" id="vue_partner">
                <div class="block block-bordered">
                    <div class="block-header">
                        <div class="block-options-simple block-options">
                            <button v-show="!empty" class="btn btn-xs btn-primary" type="button" v-on:click="sorting" :disabled="isSorting"><i class="fa fa-refresh" :class="{ 'fa-spin': isSorting }"></i> Save change</button>
                        </div>
                        <h3 class="block-title">Images</h3>
                    </div>

                    <div class="block-content" id="sortable_wrapper">
                        {{-- <p v-show="empty">No images, please upload &raquo;</p> --}}

                        <div v-for="data in images" class="block block-bordered block-rounded block-partner-item" :data-id="data.id">
                            <div class="block-content bg-gray" style="padding-bottom: 20px;">
                                <ul class="block-options">
                                    <li>
                                        <button type="button" title="Delete" :data-id="data.id" v-on:click="return deleteImage(data.id)"><i class="fa fa-trash text-danger"></i></button>
                                    </li>
                                    <li title="Move..." style="cursor: move;">
                                        <i class="fa fa-arrows"></i>
                                    </li>
                                </ul>
                                <img :src="data.url">
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
                            <form class="dropzone" id="partner-dropzone" action="{{ url()->current() }}" enctype="multipart/form-data">
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
                vue_partner.empty = false;
            }
        });        
    });

    Dropzone.options.partnerDropzone = {
        paramName: 'file',
        maxFilesize: 5, // MB
        maxFiles: 10,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        init: function() {
            this.on("success", function(file, server) {
                console.log(file.status, file.name); 
                vue_partner.images.push({ id: server.partner_id, url: file.dataURL });
                setTimeout(function(){
                    vue_partner.sorting();
                }, 1000);
            });
        }
    };

    var vue_partner = new Vue({
        el: '#vue_partner',
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
                            vue_partner.images.push({ id: value.partner_id, url: value.image_url});
                        })
                    }
                });
            },
            sorting: function() {
                vue_partner.isSorting = true;
                var sorting = [];

                _.forEach($('#sortable_wrapper').find('.block-partner-item'), function(value, key){
                    sorting.push({ partner_id: $(value).data('id'), sort: key+1 });
                })

                $.post('{{ url()->current().'/sort' }}', { _token: '{{ csrf_token() }}', sorting }, function(response){
                    if(response.counter) {
                        vue_partner.empty = true;
                        vue_partner.isSorting = false;
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

                                var idx = _.findIndex(vue_partner.images, ['id', id]);
                                vue_partner.images.splice(idx, 1);

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
