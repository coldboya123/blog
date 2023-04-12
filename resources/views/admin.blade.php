@include('header')
<div>
    <a class="text-primary" href="{{ url('modify-user') }}">Add new user</a>
    <table>
        <thead>
            <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name  }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->created_at }}</td>
                <td><a class="text-warning" href="{{ route('modify-user', ['id' => $user->id]) }}">update</a>
                    <a class="text-danger ml-3" href="{{ route('delete-user', ['id' => $user->id]) }}">delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('footer')