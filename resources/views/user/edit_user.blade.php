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
                    <input type="text" class="form-control"  value="{{ $user->name }}" name="name" required="">
                </div>
                <div class="form-group">
                    <label>{{ trans('language.email') }}</label>
                    <input type="email" class="form-control"  value="{{ $user->email }}" name="email" required="">
                </div>
                <div class="form-group">
                    <label>{{ trans('language.address') }}</label>
                    <textarea class="form-control" name="address">{{ $user->address }} required</textarea>
                </div>
                <div class="form-group">
                    <label>{{ trans('language.phone') }}</label>
                    <input type="text" class="form-control"  value="{{ $user->phone }}" name="phone" required="">
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
