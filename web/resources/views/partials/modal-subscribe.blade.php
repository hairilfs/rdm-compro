<div id="subscribe-modal" class="modal-for-subscribe has-pattern modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="css-close"></span>
        </button>
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class="f-reg">RDM News</h3>
                <p>Sign up today for a chance to win cool gifts and to get the latest news of any campaign or activation that are run by RDM!</p>

                <form id="subscribe-form" method="post" class="subscribe">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="" class="d-block no-margin">
                            <input type="text" class="rdm-form" name="email" placeholder="Enter your email..." required />
                        </label>
                        <button type="submit" class="btn"><i class="icon-right-open-big"></i></button>                    
                    </div>
                    @if ($errors->has('email'))
                        <span>{{ $errors->first('email') }}</span>
                    @endif
                    @if (Session::has('success'))
                        <span>{{ Session::get('success') }}</span>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>