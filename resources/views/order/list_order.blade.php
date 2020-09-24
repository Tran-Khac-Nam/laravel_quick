@extends('layout.index')
@section('content')
<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-4">
                    <a href="{{ route('orders.index') }}" class="active">{{ trans('language.manage') }} <b>{{ trans('language.order') }} </b></a>
                    {{ trans('language.or') }}
                    <a href="{{ route('users.index') }}" class="manage">{{ trans('language.manage') }} <b>{{ trans('language.user') }} </b></a>
                </div>
                <div class="col-sm-4">
                    @if (isset($userEmail))
                        <span>{{ trans('language.list_order_of_user_email') }}{{ $userEmail }}</span>
                    @endif
                </div>
                <div class="col-sm-4">
                    <a href="{{ route('orders.create') }}" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>{{ trans('language.add_new_order') }}</span></a>
                </div>
            </div>
        </div>
        @if ($numberOrders != 0)
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th>{{ trans('language.user_email') }}</th>
                        <th>{{ trans('language.product_name') }}</th>
                        <th>{{ trans('language.price') }}</th>
                        <th>{{ trans('language.qty') }}</th>
                        <th>{{ trans('language.ship_address') }}</th>
                        <th>{{ trans('language.note') }}</th>
                        <th>{{ trans('language.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                    <label for="checkbox1"></label>
                                </span>
                            </td>
                            <td>{{ $order->users->email }}</td>
                            <td>{{ $order->product_name }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->qty }}</td>
                            <td>{{ $order->ship_address }}</td>
                            <td>{{ $order->note }}</td>
                            <td>
                                <a href="{{ route('orders.edit', $order->id) }}" class="edit" ><i class="material-icons" title="Edit">&#xE254;</i></a>
                                <a href="#deleteEmployeeModal{{ $order->id }}" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @foreach ($orders as $order)
                <div id="deleteEmployeeModal{{ $order->id }}" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
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
            @endforeach
            <div class="clearfix">
                <div class="hint-text">{{ trans('language.showing') }} <b>{{ count($orders) }}</b> {{ trans('language.out_of') }} <b>{{ $numberOrders }}</b> {{ trans('language.entries') }}</div>
                <ul class="pagination">
                    {{ $orders->links() }}
                </ul>
            </div>
        @else
            <div class="alert alert-danger">
                <strong>{{ trans('language.order_not_available') }}</strong>
            </div>
        @endif
    </div>
</div>
@endsection
