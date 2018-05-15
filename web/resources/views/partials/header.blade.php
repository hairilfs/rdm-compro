<script type="text/template" data-template="talk-modal">
    <div id="talk-modal">
        <div class="talk--inner fheight">
            <a href="#" id="close-talk" class="css-close"></a>

            <div class="talk-content fheight">
                <form id="talk-form" class="fheight" method="post">
                	{{ csrf_field() }}
			        <div class="modal-field-container fheight">


			            <div class="modal-field flexed js-slide">
			                <div class="form-group">
			                    <label for="" class="light-weight no-margin form-slide-line">Hi :) What is your name?</label>
			                    <div class="input-container form-slide-line">
			                        <input type="text" class="form-control" name="name" placeholder="lastname, first name" required />

			                        <p class="input-msg">please enter your name</p>
			                    </div>
			                </div>            
			            </div>

			            <div class="modal-field flexed js-slide">
			                <div class="form-group">
			                    <label for="" class="light-weight no-margin form-slide-line">What's the name of your company?</label>
			                    <div class="input-container form-slide-line">
			                        <input type="text" class="form-control" name="company" placeholder="Company name" required="" />

			                        <p class="input-msg">please enter your company name</p>
			                    </div>
			                </div>            
			            </div>

			            <div class="modal-field flexed js-slide">
			                <div class="form-group">
			                    <label for="" class="light-weight no-margin form-slide-line">What is your email?</label>
			                    <div class="input-container form-slide-line">
			                        <input type="email" class="form-control" name="email" placeholder="youremail@company.com" required="" />

			                        <p class="input-msg">please enter your email</p>
			                    </div>
			                </div>            
			            </div>

			            <div class="modal-field flexed js-slide">
			                <div class="form-group">
			                    <label for="" class="light-weight no-margin form-slide-line">What is your phone number?</label>
			                    <div class="input-container form-slide-line">
			                        <input type="email" class="form-control" name="phone" placeholder="your phone number" required="" />

			                        <p class="input-msg">please enter your phone number</p>
			                    </div>
			                </div>            
			            </div>

			            <div class="modal-field flexed js-slide">
			                <div class="form-group">
			                	<input type="hidden" name="help" id="input_help">
			                    <label for="" class="light-weight no-margin form-slide-line">We can help with</label>
			                    <div class="input-container has-dropdown form-slide-line">
			                        <div class="dropdown custom-dropdown">
			                            <a href="#" class="sort-btn dropdown-toggle light-weight" role="button" id="help-type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                                Choose
			                                <i class="icon-down-open-mini"></i>
			                            </a>
			                            <div class="dropdown-menu" aria-labelledby="help-type">
			                                <a href="#" class="link link-opaque light-weight dropdown-item">Licensing</a>
			                                <a href="#" class="link link-opaque light-weight dropdown-item">Services</a>
			                                <a href="#" class="link link-opaque light-weight dropdown-item">Careers</a>
			                                <a href="#" class="link link-opaque light-weight dropdown-item">Modular</a>
			                                <a href="#" class="link link-opaque light-weight dropdown-item">Activation</a>
			                                <a href="#" class="link link-opaque light-weight dropdown-item">Everything</a>
			                            </div>
			                        </div>
			                    </div>
			                </div>            
			            </div>

			            <div class="modal-field flexed js-slide">
			                <div class="form-group">
			                    <label for="" class="light-weight no-margin form-slide-line">Tell us a bit about your needs</label>
			                    <div class="input-container form-slide-line">
			                        <input type="text" class="form-control" name="description" placeholder="Describe in a few words" required="" />
			                    </div>
			                </div>            
			            </div>

			            <div class="modal-field modal-field--success flexed js-slide">
			                <div class="form-group">
			                    <label for="" class="light-weight no-margin form-slide-line">Great! We'll get back shortly</label>
			                </div>            
			            </div>
			        </div>

			        <div class="modal-btn-container">
			            <a href="#" class="btn btn-next f-med btn-border-white pad-lg curved">Next Step <i class="icon-right"></i></a>
			            <button type="submit" class="btn btn-submit f-med btn-border-white pad-lg curved">Submit Mail <i class="icon-right"></i></button>
			            <a href="#" class="link-mail link link-opaque">biz@onerdm.com</a>
			        </div>
			    </form>
            </div>
        </div>
    </div>
</script>

<script type="text/template" data-template="header-menu">
	<div id="header-menu">
		<nav class="header-menu--inner fheight">
			<div class="container">
				<div class="row">
					<div class="col-md-3 menu-main">
						<a href="{{ url('/') }}" class="brand d-block">
							<img class="img-fluid" src="assets/img/rdm-logo.png" alt="RDM">
						</a>
						<ul class="menu-main-list">
							<li><a href="{{ url('projects') }}" class="link">Projects</a></li>
							<li><a href="{{ url('about') }}" class="link">About</a></li>
							<li><a href="{{ url('contact') }}" class="link">Contact</a></li>
						</ul>
					</div>
					<div class="col-md-3 push-md-1 menu-content">
						<div class="content-holder">
							<p class="small-title f-med no-margin">Contents</p>

							<ul class="social-list">
								@if ($tw = getSetting('Social Media', 'tw'))
								<li>
									<a href="{{ $tw }}" class="link link-white f-med" target="_blank">
										<i class="icon-twitter"></i>
										<span class="hidden-sm-down">Twitter</span>
									</a>
								</li>
								@endif

								@if ($ig = getSetting('Social Media', 'ig'))
								<li>
									<a href="https://{{ $ig }}" class="link link-white f-med" target="_blank">
										<i class="icon-instagram"></i>
										<span class="hidden-sm-down">Instagram</span>
									</a>
								</li>
								@endif

								@if ($fb = getSetting('Social Media', 'fb'))
								<li>
									<a href="https://{{ $fb }}" class="link link-white f-med" target="_blank">
										<i class="icon-facebook"></i>
										<span class="hidden-sm-down">Facebook</span>
									</a>
								</li>
								@endif

								@if ($li = getSetting('Social Media', 'li'))
								<li>
									<a href="https://{{ $li }}" class="link link-white f-med" target="_blank">
										<i class="icon-linkedin"></i>
										<span class="hidden-sm-down">Linkedin</span>
									</a>
								</li>
								@endif

								{{-- BP comment --}}
								{{-- @if ($ph = getSetting('Contact', 'phone'))
								<li>
		                        	<a href="tel:{{ $ph }}" class="link link-white f-med">
			                        	<i class="icon-phone"></i>
			                        	<span class="hidden-sm-down">Call Us</span>
		                        	</a>
		                        </li>
								@endif --}}

								<li>
		                        	<a href="tel:+62215502637" class="link link-white f-med">
		                        		<i class="icon-phone"></i>
		                        		<span class="hidden-sm-down">Call Us</span>
		                        	</a>
		                        </li>

		                        <li class="talk-menu">
		                        	<a href="#" id="trigger-talk" class="btn btn-trigger-talk f-bold btn-border-white curved">Talk to RDM</a>
		                        </li>
							</ul>
						</div>
					</div>
					<div class="col-md-3 push-md-2 menu-places">
						<div class="places-holder">
							<p class="small-title f-med no-margin">Places</p>

							<ul class="places-list">
								<li> 
									{!! getSetting('Address', 'address_indo') !!}
								</li>

								<li>
									{!! getSetting('Address', 'address_aus') !!}
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</div>
</script>

<header id="header" class="">
    <div class="header--inner">
        <div class="navbar">
			
			@if (!isset($landing))
			    
        		<div class="container flexed justify">

	                <div class="header-main flexed-desktop justify">
	                	<div class="header-brand flexed-mobile justify">
		                    <a href="{{ url('/') }}" class="brand"><img class="img-fluid" src="assets/img/rdm-logo.png" alt="RDM"></a>
		                </div>

		                <div id="navbarMenu" class="header-menu hidden-md-down">
		                    <ul class="headnav-list no-margin flexed-desktop">
		                        <li>
		                        	<a href="{{ url('/projects') }}" class="link link-white f-med link-opaque">Projects</a>
		                        </li>

		                        <li>
		                        	<a href="{{ url('/about') }}" class="link link-white f-med link-opaque">About</a>
		                        </li>

		                        <li>
		                        	<a href="{{ url('/contact') }}" class="link link-white f-med link-opaque">Contact</a>
		                        </li>

								{{-- BP comment --}}
		                        {{-- @if ($ph)
		                        <li>
		                        	<a href="tel:{{ $ph }}" class="link link-white link-opaque"><i class="icon-phone"></i></a>
		                        </li>
								@endif --}}

								<li>
		                        	<a href="tel:+62215502637" class="link link-white link-opaque"><i class="icon-phone"></i></a>
		                        </li>

		                        <li>
		                        	<a href="#" id="trigger-talk" class="btn btn-trigger-talk f-bold btn-border-white curved">Talk to RDM</a>
		                        </li>
		                    </ul>

		                </div>
	                </div>

	                <div class="header-button">
	                	<button type="button" id="burger" class="btn"></button>
	                </div>
	            </div>
        	
			@endif

        	@isset ($landing)        	    
        		<div class="container">

	                <div class="header-main flexed justify">
	                	<div class="header-brand">
		                    <a href="{{ url('/') }}" class="brand"><img class="img-fluid" src="assets/img/rdm-logo.png" alt="RDM"></a>
		                </div>

		                <div class="header-menu" id="navbarMenu">
						    <ul class="headnav-list no-margin flexed">
		                        <li>
		                        	<a href="#project-featured" class="link link-scroll link-white link-opaque">Projects</a>
		                        </li>

		                        <li>
		                        	<a href="#about" class="link link-scroll link-white link-opaque">About</a>
		                        </li>

		                        <li>
		                        	<a href="#contact" class="link link-scroll link-white link-opaque">Contact</a>
		                        </li>

		                        @if ($ph)
		                        <li>
		                        	<a href="tel:{{ $ph }}" class="link link-white link-opaque"><i class="icon-phone"></i></a>
		                        </li>
		                        @endif
		                    </ul>

		                </div>
	                </div>
	            </div>
        	@endisset
            
        </div>
    </div>
</header>