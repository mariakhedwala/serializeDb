{{-- {{ print_r($all_users) }} --}}
<ul>
    <?php $counter = 0; ?>
    @foreach ($all_users as $user_single)
        <li>
            {{-- {{ print_r($user_single) }} --}}
            <p>{{ $user_single['first_name'] }}</p>
            <p>{{ $user_single['last_name'] }}</p>
            <form action="/users/{{ $users[$counter]->id }}/edit" method="POST">
                @method('PATCH')
                @csrf
                <div>
                    <button type="submit">edit user</button>
                </div>
            </form>
            <form action="/users/{{ $users[$counter]->id }}" method="POST">
                @method('DELETE')
                @csrf
                <div>
                    <button type="submit">delete user</button>
                </div>
            </form>
        </li>
        <?php $counter++; ?>
    @endforeach
    <a href="/feed">Create User</a>
</ul>