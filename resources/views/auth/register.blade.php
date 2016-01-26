@include('common.header')

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h2 class="text-center login-title">New user Registration</h2>
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
                <form method="POST" action="/auth/register">
                    {!! csrf_field() !!}
                    <div class="form-group col-md-12">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control custom-text margin0" placeholder="Your Name *" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control custom-text margin0" placeholder="Your email *" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control custom-text margin0" placeholder="Password *" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="password">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control custom-text margin0" placeholder="Confirm password *" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="password">Role</label>
                        <select name="role" class="form-control custom-text margin0" required>
                            <option value="">Select Role</option>
                            <option value="admin">admin</option>
                            <option value="superadmin">superadmin</option>
                            <option value="seller">seller</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <button class="btn btn-default col-md-12 custom-text" type="submit">Register</button>
                    </div>

                </form>
            </div>
            <div class="sign-bottom"></div>
        </div>
    </div>
</div>
@include('common.footer')