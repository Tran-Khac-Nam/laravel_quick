@extends('layout.index')
@section('content')
<div class="modal-dialog">
    <div class="modal-content">
        <form action="{{ route('users.store') }}" method="POST">
            <div class="modal-header">
                <h4 class="modal-title">{{ trans('language.add_new_user') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label>{{ trans('language.name') }}</label>
                    <input type="text" class="form-control" required name="name">
                </div>
                <div class="form-group">
                    <label>{{ trans('language.email') }}</label>
                    <input type="email" class="form-control" required name="email">
                </div>
                <div class="form-group">
                    <label>{{ trans('language.address') }}</label>
                    <textarea class="form-control" required name="address"></textarea>
                </div>
                <div class="form-group">
                    <label>{{ trans('language.phone') }}</label>
                    <input type="text" class="form-control" required name="phone">
                </div>
            </div>
            <div class="modal-footer">
                <a href="user"><input type="button" class="btn btn-default" data-dismiss="modal" value="{{ trans('language.cancel') }}"></a>
                <input type="submit" class="btn btn-success" value="{{ trans('language.add') }}">
            </div>
        </form>
    </div>
</div>
@endsection
