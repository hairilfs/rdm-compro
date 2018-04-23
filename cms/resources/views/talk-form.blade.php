@extends('layouts.app')

@section('title', 'Talk Form')

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
                    {{ $talk->talk_id ? 'Edit' : 'Add'}} Talk
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>Talk</li>
                    <li><a class="link-effect" href="javascript:void(0)">{{ $talk->talk_id ? 'Edit' : 'Add'}}</a></li>
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
                        <div class="block-content">
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="name" name="name" value="{{ $talk->name }}" readonly="">
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-8">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="company" name="company" value="{{ $talk->company }}" readonly="">
                                        <label for="company">Company</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="email" name="email" value="{{ $talk->email }}" readonly="">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="phone" name="phone" value="{{ $talk->phone }}" readonly="">
                                        <label for="phone">Phone</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="help" name="help" value="{{ $talk->help }}" readonly="">
                                        <label for="help">Help</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <div class="form-material">
                                        <textarea class="form-control" name="description" id="description" readonly="">{{ $talk->description }}</textarea>
                                        <label for="description">Description</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block block-bordered">
                        <div class="block-content">
                            
                            <div class="form-group">
                                <div class="col-xs-8">
                                    <div class="form-material">
                                        <input class="js-datetimepicker form-control" type="text" id="created_at" name="created_at" value="{{ $talk->getSubmit() }}" readonly="">
                                        <label for="created_at">Submit Date</label>
                                    </div>
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

<script src="assets/js/plugins/bootstrap-datetimepicker/moment.min.js"></script>
<script src="assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript"> 

    jQuery(function () {
        App.initHelpers(['datetimepicker']);

    });
</script>

@endpush
