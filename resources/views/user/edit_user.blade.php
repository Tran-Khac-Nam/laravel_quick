@extends('layout.index')
@section('content')
<div class="modal-dialog">
    <div class="modal-content">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @method('PUT');
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">{{ trans('language.edit') }} {{ trans('language.user') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>{{ trans('language.name') }}</label>
                    <input type="text" class="form-control"  placeholder="{{ $user->name }}" name="name">
                </div>
                <div class="form-group">
                    <label>{{ trans('language.email') }}</label>
                    <input type="email" class="form-control"  placeholder="{{ $user->email }}" name="email">
                </div>
                <div class="form-group">
                    <label>{{ trans('language.address') }}</label>
                    <textarea class="form-control" placeholder="{{ $user->address }}" name="address"></textarea>
                </div>
                <div class="form-group">
                    <label>{{ trans('language.phone') }}</label>
                    <input type="text" class="form-control"  placeholder="{{ $user->phone }}" name="phone">
                </div>
            </div>
            <div class="modal-footer">
                <a href="user"><input type="button" class="btn btn-default" data-dismiss="modal" value="{{ trans('language.cancel') }}"></a>
                <input type="submit" class="btn btn-info" value="{{ trans('language.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
