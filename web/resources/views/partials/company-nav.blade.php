<nav id="company-top-nav">
    <div class="container">
        <div class="nav--inner flexed">
            <h5{!! url()->current() == url('about') ? ' class="active"' : '' !!}><a href="{{ url('about') }}" class="link">Who</a></h5>
            <h5{!! url()->current() == url('about/what') ? ' class="active"' : '' !!}><a href="{{ url('about/what') }}" class="link">What</a></h5>
            <h5{!! url()->current() == url('about/how') ? ' class="active"' : '' !!}><a href="{{ url('about/how') }}" class="link">How</a></h5>
            <h5{!! url()->current() == url('about/why') ? ' class="active"' : '' !!}><a href="{{ url('about/why') }}" class="link">Why</a></h5>
        </div>
    </div>
</nav>