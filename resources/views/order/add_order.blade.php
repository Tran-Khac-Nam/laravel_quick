@extends('layout.index')
@section('content')
<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <a href="{{ route('orders.index') }}" class="active">{{ trans('language.manage') }} <b>{{ trans('language.order') }} </b></a>
                    {{ trans('language.or') }}
                    <a href="{{ route('users.index') }}" class="manage">{{ trans('language.manage') }} <b>{{ trans('language.user') }} </b></a>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('orders.create') }}" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>{{ trans('language.add_new_order') }}</span></a>
                </div>
            </div>
        </div>
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('orders.store') }}" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ trans('language.add_new_order') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>{{ trans('language.user_email') }}</label>
                            <select name="user_id" class="form-control">
                                <option value="">{{ trans('language.select_user_email') }}</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('language.product_name') }}</label>
                            <input type="text" class="form-control" required name="product_name">
                        </div>
                        <div class="form-group">
                            <label>{{ trans('language.price') }}</label>
                            <input type="number" class="form-control" required name="price">
                        </div>
                        <div class="form-group">
                            <label>{{ trans('language.qty') }}</label>
                            <input type="number" class="form-control" required name="qty" max="10">
                        </div>
                        <div class="form-group">
                            <label>{{ trans('language.ship_address') }}</label>
                            <textarea class="form-control" required name="ship_address"></textarea>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('language.note') }}</label>
                            <textarea class="form-control" required name="note"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="user"><input type="button" class="btn btn-default" data-dismiss="modal" value="{{ trans('language.cancel') }}"></a>
                        <input type="submit" class="btn btn-success" value="{{ trans('language.add') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
