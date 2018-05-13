<section id="bottom-section" class="has-ver-padding">
    <a href="#" id="back-top" class="link link-white">
        <i class="icon-right-open-big"></i>
    </a>
    
    <div class="container">
        <div class="section--inner flexed-desktop justify">
            <figure class="no-margin">
                <img class="img-fluid" src="assets/img/rdm-logo.png">
            </figure>

            <nav class="bottom-nav">
                <ul class="nav-list text-center no-margin">
                    <li><a href="{{ url('projects') }}" class="link link-white link-opaque h4">Projects</a></li>
                    <li><a href="{{ url('about') }}" class="link link-white link-opaque h4">About</a></li>
                    <li><a href="{{ url('contact') }}" class="link link-white link-opaque h4">Contact</a></li>
                </ul>
            </nav>

            <div class="social">
                @if ($ig = getSetting('Social Media', 'ig'))
                <a href="https://{{ $ig }}" target="_blank" class="link link-white"><i class="icon-instagram"></i></a>
                @endif
                @if ($fb = getSetting('Social Media', 'fb'))
                <a href="https://{{ $fb }}" target="_blank" class="link link-white"><i class="icon-facebook"></i></a>
                @endif
                @if ($tw = getSetting('Social Media', 'tw'))
                <a href="https://{{ $tw }}" target="_blank" class="link link-white"><i class="icon-twitter"></i></a>
                @endif
            </div>
        </div>
    </div>
</section>