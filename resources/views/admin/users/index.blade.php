<x-admin-layout>
    <div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th><th>名前</th><th>メール</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td><a href="{{ route('admin.users.show', $user) }}">{{ $user->id }}</a></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $users->appends(Request::all())->links() }}
    </div>
</x-admin-layout>
