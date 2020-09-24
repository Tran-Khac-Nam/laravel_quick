<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title></title>
        <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/google-material-icons/google-material-icons.css') }}">
        <link rel="stylesheet" href="{{ asset(mix('/css/index.css')) }}">
        <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        @include('layout.script')
    </head>
    <body>
        <div class="container-xl">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        <strong>{{ $err }}</strong>
                    @endforeach
                </div>
            @endif
            @if (session('message'))
                <div class="alert alert-success">
                    <strong>{{ session('message') }}</strong>
                </div>
            @endif
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="users" ><h2>{{ trans('language.manage') }} <b>{{ trans('language.user') }} </b></h2></a>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{ route('users.create') }}" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>{{ trans('language.add_new_user') }}</span></a>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>
