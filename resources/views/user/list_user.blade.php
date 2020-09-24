@extends('layout.index')
@section('content')
@if ($numberUsers != 0)
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>
                <span class="custom-checkbox">
                    <input type="checkbox" id="selectAll">
                    <label for="selectAll"></label>
                </span>
            </th>
            <th>{{ trans('language.name') }}</th>
            <th>{{ trans('language.email') }}</th>
            <th>{{ trans('language.address') }}</th>
            <th>{{ trans('language.phone') }}</th>
            <th>{{ trans('language.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                        <label for="checkbox1"></label>
                    </span>
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phone }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="edit" ><i class="material-icons" title="Edit">&#xE254;</i></a>
                    <a href="#deleteEmployeeModal{{$user->id}}" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@foreach ($users as $user)
    <div id="deleteEmployeeModal{{ $user->id }}" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
    <div class="hint-text">{{ trans('language.showing') }} <b>{{ count($users) }}</b> {{ trans('language.out_of') }} <b>{{ $numberUsers }}</b> {{ trans('language.entries') }}</div>
    <ul class="pagination">
        {{ $users->links() }}
    </ul>
</div>
@else
<div class="alert alert-danger">
    <strong>{{ trans('language.user_not_available') }}</strong>
</div>
@endif
@endsection
