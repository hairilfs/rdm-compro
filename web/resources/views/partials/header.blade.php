<script type="text/template" data-template="talk-modal">
    <div id="talk-modal">
        <div class="talk--inner fheight">
            <a href="#" id="close-talk" class="css-close"></a>

            <div class="talk-content fheight">
                <form id="talk-form" class="fheight">
			        <div class="modal-field-container fheight">


			            <div class="modal-field flexed js-slide">
			                <div class="form-group">
			                    <label for="" class="light-weight no-margin form-slide-line">Hi :) What is your name?</label>
			                    <div class="input-container form-slide-line">
			                        <input type="text" class="form-control" name="" placeholder="lastname, first name" />

			                        <p class="input-msg">please enter your name</p>
			                    </div>
			                </div>            
			            </div>

			            <div class="modal-field flexed js-slide">
			                <div class="form-group">
			                    <label for="" class="light-weight no-margin form-slide-line">What's the name of your company?</label>
			                    <div class="input-container form-slide-line">
			                        <input type="text" class="form-control" name="" placeholder="Company name" />

			                        <p class="input-msg">please enter your company name</p>
			                    </div>
			                </div>            
			            </div>

			            <div class="modal-field flexed js-slide">
			                <div class="form-group">
			                    <label for="" class="light-weight no-margin form-slide-line">What is your email?</label>
			                    <div class="input-container form-slide-line">
			                        <input type="email" class="form-control" name="" placeholder="youremail@company.com" />

			                        <p class="input-msg">please enter your email</p>
			                    </div>
			                </div>            
			            </div>

			            <div class="modal-field flexed js-slide">
			                <div class="form-group">
			                    <label for="" class="light-weight no-margin form-slide-line">What is your phone number?</label>
			                    <div class="input-container form-slide-line">
			                        <input type="email" class="form-control" name="" placeholder="your phone number" />

			                        <p class="input-msg">please enter your phone number</p>
			                    </div>
			                </div>            
			            </div>

			            <div class="modal-field flexed js-slide">
			                <div class="form-group">
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
			                        <input type="email" class="form-control" name="" placeholder="Describe in a few words" />
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
			            <a href="#" class="btn btn-next btn-border-white pad-lg curved">Next Step <i class="icon-right"></i></a>
			            <button type="submit" class="btn btn-submit btn-border-white pad-lg curved">Submit Mail <i class="icon-right"></i></button>
			            <a href="#" class="link-mail link link-opaque">biz@onerdm.com</a>
			        </div>
			    </form>
            </div>
        </div>
    </div>
</script>

<header id="header" class="">
    <div class="header--inner">
        <div class="navbar header-main">

        	@if (!empty($landing))
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

	                        <li>
	                        	<a href="tel:021-5502637" class="link link-white link-opaque"><i class="icon-phone"></i></a>
	                        </li>
	                    </ul>

	                </div>
                </div>
            </div>  	
        	@else
			<div class="container flexed justify">

	            <div class="header-main flexed-desktop justify">
	            	<div class="header-brand flexed-mobile justify">
	                    <a href="{{ url('/') }}" class="brand"><img src="assets/img/rdm-logo.png" alt="RDM"></a>
	                </div>

	                <div class="header-menu" id="navbarMenu">
	                    <ul class="headnav-list no-margin flexed-desktop">
	                        <li>
	                        	<a href="{{ url('projects') }}" class="link link-white link-opaque">Projects</a>
	                        </li>

	                        <li>
	                        	<a href="{{ url('about') }}" class="link link-white link-opaque">About</a>
	                        </li>

	                        <li>
	                        	<a href="{{ url('contact') }}" class="link link-white link-opaque">Contact</a>
	                        </li>

	                        <li>
	                        	<a href="#" class="link link-white link-opaque"><i class="icon-phone"></i></a>
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

        </div>
    </div>
</header>