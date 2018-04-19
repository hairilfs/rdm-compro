@extends('layouts.app')

@section('title', 'Testimony Lists')

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
                    Testimony Lists
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Testimony</li>
                    <li><a class="link-effect" href="javascript:void(0)">List</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content" id="vue_testimony_category">
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

@endsection

@push('scripts')
<script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

<script type="text/javascript">    

    var dt_conf =  {
        'ajax' : '{{ url("about/who-testimony/datatables") }}',
        'columns' : [
            { data: 'name', name: 'name' },
            { data: 'is_publish', name: 'is_publish' },
            { data: 'published_at', name: 'published_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        'order': [[ 2, 'desc' ]],
        'columnDefs' : [ { orderable: false, targets: [ 3 ] } ],
        'pageLength' : 10,
        'lengthMenu' : [[5, 10, 15, 20], [5, 10, 15, 20]],
        'formUrl': '{{ url('about/who-testimony/form') }}'
    };

</script>
<script src="assets/js/pages/base_tables_datatables.js"></script>

@endpush