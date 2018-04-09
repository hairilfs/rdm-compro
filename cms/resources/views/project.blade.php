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
                    <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/base_tables_datatables.js -->
                    <table class="table table-bordered table-striped js-dataTable-full-pagination">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Name</th>
                                <th class="hidden-xs">Email</th>
                                <th class="hidden-xs" style="width: 15%;">Access</th>
                                <th class="text-center" style="width: 10%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="font-w600">Donald Barnes</td>
                                <td class="hidden-xs">client1@example.com</td>
                                <td class="hidden-xs">
                                    <span class="label label-danger">Disabled</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="font-w600">Laura Bell</td>
                                <td class="hidden-xs">client2@example.com</td>
                                <td class="hidden-xs">
                                    <span class="label label-primary">Personal</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="font-w600">Ann Parker</td>
                                <td class="hidden-xs">client3@example.com</td>
                                <td class="hidden-xs">
                                    <span class="label label-warning">Trial</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td class="font-w600">Evelyn Willis</td>
                                <td class="hidden-xs">client4@example.com</td>
                                <td class="hidden-xs">
                                    <span class="label label-warning">Trial</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td class="font-w600">Roger Hart</td>
                                <td class="hidden-xs">client5@example.com</td>
                                <td class="hidden-xs">
                                    <span class="label label-danger">Disabled</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td class="font-w600">Eric Lawson</td>
                                <td class="hidden-xs">client6@example.com</td>
                                <td class="hidden-xs">
                                    <span class="label label-success">VIP</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">7</td>
                                <td class="font-w600">Emma Cooper</td>
                                <td class="hidden-xs">client7@example.com</td>
                                <td class="hidden-xs">
                                    <span class="label label-primary">Personal</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">8</td>
                                <td class="font-w600">Roger Hart</td>
                                <td class="hidden-xs">client8@example.com</td>
                                <td class="hidden-xs">
                                    <span class="label label-success">VIP</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">9</td>
                                <td class="font-w600">Judy Alvarez</td>
                                <td class="hidden-xs">client9@example.com</td>
                                <td class="hidden-xs">
                                    <span class="label label-success">VIP</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">10</td>
                                <td class="font-w600">Joshua Munoz</td>
                                <td class="hidden-xs">client10@example.com</td>
                                <td class="hidden-xs">
                                    <span class="label label-danger">Disabled</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
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

</script>
<script src="assets/js/pages/base_tables_datatables.js"></script>

@endpush