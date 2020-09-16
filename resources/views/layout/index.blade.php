<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title></title>
        <base href="  {{asset('') }}">
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="bower_components/google-material-icons/google-material-icons.css">
        <link rel="stylesheet" href="{{ asset(mix('/css/index.css')) }}">
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        @include('layout.script')
    </head>
    <body>
        <div class="container-xl">
            @if (count($errors)>0)
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
                                <h2>{{ trans('language.manage') }} <b>{{ trans('language.user') }} </b></h2>
                            </div>
                            <div class="col-sm-6">
                                <a href="user/create" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>{{ trans('language.add_new_user') }}</span></a>
                                <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span> {{ trans('language.delete') }}</span></a>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
        <div id="deleteEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h4 class="modal-title">{{ trans('language.delete_user') }}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>{{ trans('language.delete_user_mess1') }}</p>
                            <p class="text-warning"><small>{{ trans('language.delete_user_mess2') }}</small></p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="{{ trans('language.cancel') }}">
                            <input type="submit" class="btn btn-danger" value="{{ trans('language.delete') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
