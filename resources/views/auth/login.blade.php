@include('common.header')

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h2 class="text-center login-title">Sign in</h2>
            <br>
            <div class="account-wall">
                <div class="col-md-12 login_error">
                    @if (count($errors))
                        <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    @endif
                </div>
                {!!Form::open(array('url'=>'/auth/login'))!!}
                    <div class="form-group col-md-12">
                        <input type="email" name="email" class="form-control custom-text" placeholder="Your email as user*" required value="{{ old('email') }}">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="password" name="password" id="password" class="form-control custom-text" placeholder="Your password *" required>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="checkbox" name="remember"> Remember Me
                        <a class="pull-right" href="{!! url('password/email') !!}">Forgot password ?</a>
                    </div>
                    <div class="form-group col-md-12">
                        <button class="btn btn-default col-md-12 custom-text" type="submit">Login</button>
                    </div>
                {!!Form::close()!!}
            </div>
            <div class="sign-bottom"></div>
        </div>
    </div>
</div>
@include('common.footer')