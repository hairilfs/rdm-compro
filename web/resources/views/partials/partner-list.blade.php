@foreach ($partner as $element)
<div class="item">
    <figure class="no-margin text-center">
        <img src="{{ $element->getImgUrl() }}">
    </figure>
</div>
@endforeach