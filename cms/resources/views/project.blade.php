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

{{-- <iframe src="http://localhost:81/rdm-wheel/cms/public/prize" width="100%"></iframe> --}}
@endsection

@push('scripts')
<script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/promise-polyfill@7.1.0/dist/promise.min.js" async=""></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js" async=""></script>
<script src="assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash"></script>

<script type="text/javascript">    

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
        'formUrl': '{{ url('project/form') }}'
    };

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
                $.get('{{ url('project-category/list') }}', function(response){
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

                $.post('{{ url('project-category/sort') }}', { _token: '{{ csrf_token() }}', sorting }, function(response){
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
                        window.location = '{{ url('project-category') }}/'+id+'/delete';
                    }
                });
            }
        }
    });

    jQuery(function () {
        $("#sortable_wrapper").sortable({
            update: function( event, ui ) {
                vue_project_category.empty = false;
            }
        });        
    });

</script>
<script src="assets/js/pages/base_tables_datatables.js"></script>

@endpush