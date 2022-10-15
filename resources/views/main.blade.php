@extends('layouts.main')

@section('content')
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" name="loginForm">
                        <input type="text" name="userName" class="form-control mt-1" placeholder="User name" required>
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="d-flex align-items-center">
                            <input type="password" name="password" class="form-control mt-1"
                                   placeholder="Password" required>
                        </div>
                      <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="signUpModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sign Up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" name="signUpForm">
                        <input type="text" name="userName" class="form-control mt-1" placeholder="User name" required>
                        <input type="email" name="userEmail"  class="form-control mt-1" placeholder="Email" required>
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="d-flex align-items-center">
                            <input type="password" name="password1" id="signUpPass1" class="form-control mt-1"
                                   placeholder="Password" required>
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="password" name="password2" id="signUpPass2" class="form-control my-1"
                                   placeholder="Repeat password"  required>
                        </div>
                        <div class="alert alert-danger" role="alert" id="signUpDangerAlert" style="display: none"></div>
                        <div class="alert alert-success" role="alert" id="successAlert" style="display: none"><span>Success sign-up</span></div>
                        <button type="submit" class="btn btn-primary">Sign-up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<div class="main-frame">
    <p class="hello">Hello :P</p>
</div>

@endsection
