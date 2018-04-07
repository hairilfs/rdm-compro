@extends('layouts.app')

@section('title', 'Project Category')

@section('content')
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Project Category
                </h1>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content" id="vue_project_category">
        <div class="row">
            <div class="col-md-8">
                <div class="block block-bordered">
                    <div class="block-header">
                        <div class="block-options-simple block-options">
                            <button v-show="!empty" class="btn btn-xs btn-primary" type="button" v-on:click="sorting" :disabled="isSorting"><i class="fa fa-refresh" :class="{ 'fa-spin': isSorting }"></i> Save change</button>
                        </div>
                        <h3 class="block-title">Project Category Lists</h3>
                    </div>

                    <div class="block-content" id="sortable_wrapper">

                        <div v-for="data in category" class="block block-bordered block-rounded block-project-item" :data-id="data.project_category_cid">
                            <div class="block-content bg-gray-light">
                                <ul class="block-options">
                                    <li>
                                        <button type="button" title="Delete" v-on:click="return deleteCategory(data.project_category_cid)"><i class="fa fa-trash text-danger"></i></button>
                                    </li>
                                    <li title="Move..." style="cursor: move;">
                                        <i class="fa fa-arrows"></i>
                                    </li>
                                </ul>
                                <p>@{{ data.name }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block block-bordered">
                    <div class="block-header">
                        <h3 class="block-title">New Category</h3>
                    </div>
                    <div class="block-content">
                        <form action="{{ url()->current() }}" method="post" v-on:submit.prevent="onSubmit('save', $event)">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="new_procat">Project Category</label>
                                <input class="form-control" type="text" id="new_procat" name="name" placeholder="Enter new project category.." required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-sm btn-primary" type="submit">Save</button>
                            </div>
                        </form>
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
<script src="assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash"></script>

<script type="text/javascript">    
    jQuery(function () {
        $("#sortable_wrapper").sortable({
            update: function( event, ui ) {
                vue_project_category.empty = false;
            }
        });        
    });

    var vue_project_category = new Vue({
        el: '#vue_project_category',
        data: {
            category: [],
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
                    if(response) {
                        vue_project_category.category = response;
                    }
                });
            },
            sorting: function() {
                vue_project_category.isSorting = true;
                var sorting = [];

                _.forEach($('#sortable_wrapper').find('.block-project-item'), function(value, key){
                    sorting.push({ project_category_cid: $(value).data('id'), sort: key+1 });
                })

                $.post('{{ url()->current().'/sort' }}', { _token: '{{ csrf_token() }}', sorting }, function(response){
                    if(response.counter) {
                        vue_project_category.empty = true;
                        vue_project_category.isSorting = false;
                        popup_notif('fa fa-check', 'Changes saved!', 'success');
                    }
                }, 'json');
            },
            deleteCategory: function(id) {

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

                                var idx = _.findIndex(vue_project_category.category, ['id', id]);
                                vue_project_category.category.splice(idx, 1);

                                popup_notif('fa fa-check', 'Delete success!', 'success');
                            }
                        }, 'json');
                    }
                });
            },
            onSubmit: function(message, event) {

                $.post('{{ url()->current() }}', $(event.target).serialize(), function(response){
                    if(response) {
                        vue_project_category.category.push(response);
                        popup_notif('fa fa-check', 'New category added!', 'success');

                        $('#new_procat').val('');
                    }
                }, 'json');
            }
        }
    });

</script>

@endpush
