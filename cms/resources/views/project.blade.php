@extends('layouts.app')

@section('title', 'Project Lists')

@section('head')
<link rel="stylesheet" href="assets/js/plugins/datatables/jquery.dataTables.min.css">
@endsection

@section('content')
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    Project Lists
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Projects</li>
                    <li><a class="link-effect" href="javascript:void(0)">List</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content" id="vue_project_category">
        <div class="row">
            <div class="block">
                <div class="block-content">
                    <table class="table table-bordered table-striped js-dataTable-custom">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Published Date</th>
                                <th class="text-center" style="width: 10%;">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>

<!-- Small Modal -->
<div class="modal" id="vue_project" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <div class="block-options-simple block-options">
                        <button v-show="changed" class="btn btn-xs btn-primary" type="button" v-on:click="sorting" :disabled="isSorting"><i class="fa fa-refresh" :class="{ 'fa-spin': isSorting }"></i> Save change</button>
                    </div>
                    <h3 class="block-title">Sorting</h3>
                </div>
                <div class="block-content" id="sortable_wrapper">

                    <div v-for="data in project" class="block block-bordered block-rounded block-project-item" :data-id="data.id">
                        <div class="block-content bg-gray-light">
                            <ul class="block-options">
                                <li title="Sort..." style="cursor: move;">
                                    <i class="fa fa-arrows"></i>
                                </li>
                            </ul>
                            <p>@{{ data.title }}</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                <button v-show="changed" class="btn btn-sm btn-primary" type="button" v-on:click="sorting" :disabled="isSorting"><i class="fa fa-refresh" :class="{ 'fa-spin': isSorting }"></i> Save change</button>
            </div>
        </div>
    </div>
</div>
<!-- END Small Modal -->

@endsection

@push('scripts')
<script src="assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/promise-polyfill@7.1.0/dist/promise.min.js" defer=""></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js" defer=""></script>
<script src="https://cdn.jsdelivr.net/npm/lodash" defer=""></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>

<script type="text/javascript">
    jQuery(function () {
        $("#sortable_wrapper").sortable({
            update: function( event, ui ) {
                vue_project.changed = true;
            }
        });

    });

    function deletePopup(id) {
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
                window.location = '{{ url('about/who-project/delete') }}/'+id;
            }
        });
    }

    var dt_conf =  {
        'ajax' : '{{ url("project/datatables") }}',
        'columns' : [
            { data: 'title', name: 'title' },
            { data: 'is_publish', name: 'is_publish' },
            { data: 'published_at', name: 'published_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        'order': [[ 2, 'desc' ]],
        'columnDefs' : [ { orderable: false, targets: [ 3 ] } ],
        'pageLength' : 10,
        'lengthMenu' : [[5, 10, 15, 20], [5, 10, 15, 20]],
        'formUrl': '{{ url('project/form') }}',
        'customButton': '<button type="button" class="btn btn-default" data-toggle="modal" data-target="#vue_project" style="margin-right: 15px;"><i class="fa fa-sort"></i> Sort</a>'

    };

    var vue_project = new Vue({
        el: '#vue_project',
        data: {
            project: [],
            isSorting: false,
            changed: false
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
                            vue_project.project.push({ id: value.project_cid, title: value.title });
                        })
                    }
                });
            },
            sorting: function() {
                vue_project.isSorting = true;
                var sorting = [];

                _.forEach($('#sortable_wrapper').find('.block-project-item'), function(value, key){
                    sorting.push({ project_cid: $(value).data('id'), sort: key+1 });
                })

                $.post('{{ url()->current().'/sort' }}', { _token: '{{ csrf_token() }}', sorting }, function(response){
                    if(response.counter) {
                        vue_project.isSorting = false;
                        vue_project.changed = false;
                        $('#vue_project').modal('hide');
                        popup_notif('fa fa-check', 'Changes saved!', 'success');
                    }
                }, 'json');
            }
        }
    });

</script>
<script src="assets/js/pages/base_tables_datatables.js"></script>

@endpush