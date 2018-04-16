<div class="preview-row" data-columns="true">
    <div class="row">
        @foreach ($image as $element)
            <figure class="no-margin">
                <a class="d-block" data-fancybox="project" href="{{ $element->getImgUrl($data->project_cid) }}">
                    <img class="w-fit" src="{{ $element->getImgUrl($data->project_cid) }}">
                </a>
            </figure>
        @endforeach
    </div>
</div>