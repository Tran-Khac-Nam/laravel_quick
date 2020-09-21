@extends('layout.index')
@section('content')
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
                <a href="users/{{ $user->id }}/edit" class="edit" ><i class="material-icons" title="Edit">&#xE254;</i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="clearfix">
    <div class="hint-text">{{ trans('language.showing') }} <b>5</b> {{ trans('language.out_of') }} <b>25</b> {{ trans('language.entries') }}</div>
    <ul class="pagination">
        {{ $users->links() }}
    </ul>
</div>
@endsection
