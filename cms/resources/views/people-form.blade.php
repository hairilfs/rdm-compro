@extends('layouts.app')

@section('title', 'People Form')

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
                    {{ $people->people_id ? 'Edit' : 'Add'}} People
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>People</li>
                    <li><a class="link-effect" href="javascript:void(0)">{{ $people->people_id ? 'Edit' : 'Add'}}</a></li>
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
                                        <input class="form-control" type="text" id="name" name="name" value="{{ $people->name }}" placeholder="Enter name..." required>
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="position" name="position" value="{{ $people->position }}" placeholder="Enter position...">
                                        <label for="position">Position</label>
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
                                <div class="col-xs-12">
                                    <div class="form-material">
                                        <img src="{{ $people->getImgUrl() }}" class="push-10-t" {!! $people->img_url ? 'width="100%"' : '' !!}>
                                        <input type="file" class="upload-preview push-10-t" id="image" name="image">
                                        <label for="image">Image</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-8">
                                    <div class="form-material">
                                        <input class="js-datetimepicker form-control" type="text" id="published_at" name="published_at" value="{{ $people->getPublish() }}" placeholder="Choose a date..">
                                        <label for="published_at">Publish Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-8">
                                    <div class="form-material">
                                        <label class="css-input css-checkbox css-checkbox-success">
                                            <input type="checkbox" value="1" name="is_publish" {{ $people->is_publish ? 'checked' : '' }}><span></span> Publish?
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
