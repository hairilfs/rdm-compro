<div class="preview-row" data-columns="true">
    <div class="row">
    	@if (!$data->content_position)
    		<div class="preview-text">
	            {!! $data->content !!}
	        </div>
    	@endif

        <figure class="no-margin">
            <a class="d-block" data-fancybox="project" href="{{ $image->getImgUrl($data->project_cid) }}">
                <img class="w-fit" src="{{ $image->getImgUrl($data->project_cid) }}">
            </a>
        </figure>

    	@if ($data->content_position)
    		<div class="preview-text">
	            {!! $data->content !!}
	        </div>
    	@endif
        
    </div>
</div>