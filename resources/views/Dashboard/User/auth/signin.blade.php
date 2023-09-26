@extends('Dashboard.layouts.master2')
@section('css')
    <style>
        .loginfoem {
            display: none;
        }
    </style>


    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ URL::asset('Dashboard/img/media/login.png') }}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex">
                                        <div>
                                            <ul class="nav">
                                                <li class="">


                                                    <div class="dropdown  nav-itemd-none d-md-flex">
                                                        <a href="#"
                                                            class="d-flex  nav-item nav-link pl-0 country-flag1"
                                                            data-toggle="dropdown" aria-expanded="false">

                                                            <div>
                                                                <h3 style="color: black">
                                                                    {{ trans('Dashboard/Login_trans.choose_language') }}
                                                                    <img src="{{ URL::asset('Dashboard/img/flags/world.png') }}"
                                                                        alt="img" height="50px" width="50px">
                                                                </h3>
                                                            </div>

                                                            @if (App::getLocale() == 'ar')
                                                                <span
                                                                    class="avatar country-Flag mr-0 align-self-center bg-transparent">

                                                                </span>
                                                                <strong
                                                                    class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}
                                                                </strong>
                                                            @else
                                                                <span
                                                                    class="avatar country-Flag mr-0 align-self-center bg-transparent">

                                                                </span>
                                                                <strong
                                                                    class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}
                                                                </strong>
                                                            @endif
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-left"
                                                            x-plecement="bottom-end">
                                                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                                <a class="dropdown-item" rel="alternate"
                                                                    hreflang="{{ $localeCode }}"
                                                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                                    @if ($properties['native'] == 'Enflish')
                                                                        {{-- <span class="flag-icon flag-icon-ps flag-icon-us"></span> --}}
                                                                    @elseif ($properties['native'] == 'العربية')
                                                                        {{-- <span class="flag-icon flag-icon-ps flag-icon-squared"></span> --}}
                                                                    @endif
                                                                    {{ $properties['native'] }}
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    </div>


                                                </li>
                                            </ul>
                                        </div>
                                    </div>




                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>{{ trans('Dashboard/Login_trans.Welcome_back') }}</h2>

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif


                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">
                                                    {{ trans('Dashboard/Login_trans.Login_method') }} </label>
                                                <select class="form-control" id="sectionChooser">
                                                    <option value="" selected disabled>
                                                        {{ trans('Dashboard/Login_trans.Choose_list') }}
                                                    </option>
                                                    <option value="user">
                                                        {{ trans('Dashboard/Login_trans.Login_patient') }}
                                                    </option>
                                                    <option value="admin">
                                                        {{ trans('Dashboard/Login_trans.Login_admin') }}
                                                    </option>
                                                </select>
                                            </div>

                                            {{-- {Form User} --}}
                                            <div class="loginfoem" id="user">
                                                <h5 class="font-weight-semibold mb-4">
                                                    {{ trans('Dashboard/Login_trans.Login_patient') }}
                                                </h5>
                                                <form method="POST" action="{{ route('login.user') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>{{ trans('Dashboard/Login_trans.Email') }}</label>
                                                        <input class="form-control"
                                                            placeholder="{{ trans('Dashboard/Login_trans.Email') }}"
                                                            type="email" name="email" :value="old('email')" required
                                                            autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('Dashboard/Login_trans.Password') }}</label>
                                                        <input class="form-control"
                                                            placeholder="{{ trans('Dashboard/Login_trans.Password') }}"
                                                            type="password" name="password" required
                                                            autocomplete="current-password">
                                                    </div><button class="btn btn-main-primary btn-block" type="submit">Sign
                                                        In</button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i class="fab fa-facebook-f"></i>
                                                                Signup with Facebook</button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i> Signup with Twitter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">Forgot password?</a></p>
                                                    <p>Don't have an account? <a
                                                            href="{{ url('/' . ($page = 'signup')) }}">Create
                                                            an Account</a></p>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- {Form Admin} --}}
                                        <div class="loginfoem" id="admin">
                                            <h5 class="font-weight-semibold mb-4">
                                                {{ trans('Dashboard/Login_trans.Login_admin') }} </h5>
                                            <form method="POST" action="{{ route('login.admin') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>{{ trans('Dashboard/Login_trans.Email') }}</label> <input
                                                        class="form-control"
                                                        placeholder="{{ trans('Dashboard/Login_trans.Email') }}"
                                                        type="email" name="email" :value="old('email')" required
                                                        autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label>{{ trans('Dashboard/Login_trans.Password') }}</label> <input
                                                        class="form-control"
                                                        placeholder="{{ trans('Dashboard/Login_trans.Password') }}"
                                                        type="password" name="password" required
                                                        autocomplete="current-password">
                                                </div><button class="btn btn-main-primary btn-block" type="submit">Sign
                                                    In</button>
                                                <div class="row row-xs">
                                                    <div class="col-sm-6">
                                                        <button class="btn btn-block"><i class="fab fa-facebook-f"></i>
                                                            Signup with Facebook</button>
                                                    </div>
                                                    <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                        <button class="btn btn-info btn-block"><i
                                                                class="fab fa-twitter"></i> Signup with Twitter</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="main-signin-footer mt-5">
                                                <p><a href="">Forgot password?</a></p>
                                                <p>Don't have an account? <a
                                                        href="{{ url('/' . ($page = 'signup')) }}">Create
                                                        an Account</a></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#sectionChooser').change(function() {
            var myID = $(this).val();
            $('.loginfoem').each(function() {
                myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>
@endsection
