@extends('layout.index')
@section('content')
<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <a href="{{ route('orders.index') }}" class="manage">{{ trans('language.manage') }} <b>{{ trans('language.user') }} </b></a>
                    {{ trans('language.or') }}
                    <a href="{{ route('users.index') }}" class="manage">{{ trans('language.manage') }} <b>{{ trans('language.order') }} </b></a>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('orders.create') }}" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>{{ trans('language.add_new_order') }}</span></a>
                </div>
            </div>
        </div>
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
                            <textarea class="form-control" name="address" required>{{ $user->address }}</textarea>
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
    </div>
</div>
@endsection
