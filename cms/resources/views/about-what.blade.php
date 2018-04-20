@extends('layouts.app')

@section('title', 'About')

@section('content')
<main id="main-container">
    <!-- Page Header -->
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-7">
                <h1 class="page-heading">
                    About <small> &bull; {{ title_case($section) }}</small>
                </h1>
            </div>
            <div class="col-sm-5 text-right hidden-xs">
                <ol class="breadcrumb push-10-t">
                    <li>About</li>
                    <li><a class="link-effect" href="javascript:void(0)">{{ title_case($section) }}</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <!-- Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="block block-bordered">
                    <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
                        @foreach ($about as $key => $element)
                        <li{!! $loop->first ? ' class="active"' : '' !!}>
                            <a href="#tab-{{ str_slug($key) }}">{{ $key }}</a>
                        </li>
                        @endforeach
                    </ul>

                    <form action="" method="post" class="form-horizontal" id="form_setting" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="block-content tab-content"> 
                        @foreach ($about as $key => $element)
                        <div class="tab-pane{!! $loop->first ? ' active' : '' !!}" id="tab-{{ str_slug($key) }}">
                            @foreach ($element as $value)
                                @if ($value['setting_type'] == config('extra.setting_type.text'))
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="form-material">
                                            <input class="form-control" type="text" id="{{ $value['setting_key'] }}" name="{{ $value['setting_key'] }}" placeholder="Please enter {{ $value['name'] }}" value="{{ $value['content'] }}">
                                            <label for="{{ $value['setting_key'] }}">{{ $value['name'] }}</label>
                                        </div>
                                    </div>
                                </div>
                                
                                @elseif ($value['setting_type'] == config('extra.setting_type.number'))
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="number" id="{{ $value['setting_key'] }}" name="{{ $value['setting_key'] }}" placeholder="Please enter {{ $value['name'] }}" value="{{ $value['content'] }}">
                                                <label for="{{ $value['setting_key'] }}">{{ $value['name'] }}</label>
                                            </div>
                                        </div>
                                    </div>

                                @elseif ($value['setting_type'] == config('extra.setting_type.email'))
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="email" id="{{ $value['setting_key'] }}" name="{{ $value['setting_key'] }}" placeholder="Please enter {{ $value['name'] }}" value="{{ $value['content'] }}">
                                                <label for="{{ $value['setting_key'] }}">{{ $value['name'] }}</label>
                                            </div>
                                        </div>
                                    </div>

                                @elseif ($value['setting_type'] == config('extra.setting_type.textarea'))
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="form-material">
                                                <textarea class="form-control" id="{{ $value['setting_key'] }}" name="{{ $value['setting_key'] }}" placeholder="Please enter {{ $value['name'] }}" rows="3">{{ $value['content'] }}</textarea>
                                                <label for="{{ $value['setting_key'] }}">{{ $value['name'] }}</label>
                                            </div>
                                        </div>
                                    </div>

                                @elseif ($value['setting_type'] == config('extra.setting_type.texteditor'))
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="form-material">
                                                <textarea class="ckeditor" name="{{ $value['setting_key'] }}">{{ $value['content'] }}</textarea>
                                                <label for="{{ $value['setting_key'] }}">{{ $value['name'] }}</label>
                                            </div>
                                        </div>
                                    </div>

                                @elseif ($value['setting_type'] == config('extra.setting_type.file'))
                                    <div class="form-group">
                                        <label class="col-xs-12" for="{{ $value['setting_key'] }}">{{ $value['name'] }}</label>
                                        <div class="col-sm-12">
                                            @if (str_contains($value['file_type'], 'image'))
                                            <img src="{{ env('WEB_BASE_URL')."uploads/about/{$value['content']}" }}" style="margin-bottom: 10px; max-width: 100%;">
                                            @endif
                                            <input type="file" id="{{ $value['setting_key'] }}" name="{{ $value['setting_key'] }}">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                    </form>                       
                </div>
            </div>
            <div class="col-md-3">
                <div class="block block-bordered">
                    <div class="block-header">
                        <h3 class="block-title">Action</h3>
                    </div>
                    <div class="block-content">
                        <div class="form-group">
                            <button class="btn btn-sm btn-primary" type="button" onclick="return document.getElementById('form_setting').submit();">Save</button>
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
<script src="assets/js/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.config.toolbar = [
       ['Format'],
       ['Bold','Italic','Underline','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace'],
       ['Source']
    ];
</script>
@endpush
