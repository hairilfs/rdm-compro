<!-- Normal Modal -->
<div class="modal" id="modal_module" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Lists of Modules</h3>
                </div>
                <div class="block-content">
                    <div class="content-grid">
                        <div class="row">
                            <div class="col-lg-6">
                                <a class="block block-link-hover2" href="{{ url('module/text') }}?project={{ $project->project_cid}}">
                                    <div class="block-content block-content-full bg-primary clearfix">
                                        <i class="si si-speech fa-2x text-white pull-right"></i>
                                        <span class="h4 text-white-op">Simple Text</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <a class="block block-link-hover2" href="{{ url('module/image') }}?project={{ $project->project_cid}}">
                                    <div class="block-content block-content-full bg-city clearfix">
                                        <i class="si si-picture fa-2x text-white pull-right"></i>
                                        <span class="h4 text-white-op">Single Image</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <a class="block block-link-hover2" href="{{ url('module/images') }}?project={{ $project->project_cid}}">
                                    <div class="block-content block-content-full bg-flat clearfix">
                                        <i class="si si-layers fa-2x text-white pull-right"></i>
                                        <span class="h4 text-white-op">Double Image</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <a class="block block-link-hover2" href="{{ url('module/text_image') }}?project={{ $project->project_cid}}">
                                <a class="block block-link-hover2" href="javascript:void(0)">
                                    <div class="block-content block-content-full bg-warning clearfix">
                                        <i class="si si-grid fa-2x text-white pull-right"></i>
                                        <span class="h4 text-white-op">Text &amp; Image</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Normal Modal -->