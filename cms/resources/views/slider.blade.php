@extends('layouts.app')

@section('title', 'Slider')

@section('head')

<link rel="stylesheet" href="assets/js/plugins/dropzonejs/dropzone.min.css">

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
            <div class="col-md-7">
                <div class="block block-bordered">
                    <div class="block-header">
                        <h3 class="block-title">Images</h3>
                    </div>

                    <div class="block-content">
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="block block-bordered">
                    <div class="block-header">
                        <h3 class="block-title">Action</h3>
                    </div>
                    <div class="block-content">
                        <div class="form-group">
                            <form class="dropzone" action="{{ url()->current() }}"></form>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-primary" type="button" onclick="return document.getElementById('form_slider').submit();">Save</button>
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

<script src="assets/js/plugins/dropzonejs/dropzone.min.js"></script>
<script type="text/javascript">
    CKEDITOR.config.toolbar = [
       ['Format'],
       ['Bold','Italic','Underline','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace'],
       ['Source']
    ];
    jQuery(function () {
        // Init page helpers (BS Datepicker + BS Datetimepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs + AutoNumeric plugins)
        App.initHelpers(['datepicker', 'datetimepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs', 'autonumeric']);
    });
</script>

@endpush
