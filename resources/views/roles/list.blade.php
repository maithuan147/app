<style>
        tr td{
            text-align: center;
        }
        table{
            width: 100%;
        }
    </style>
    <a href="{{ route('role.create') }}">Create</a>
    <table>
        <tr>
            <th>{{ __('ID') }}</th>
            <th>{{ __('name') }}</th>
            <th>{{ __('') }}</th>
        </tr>
    
    @foreach ($roles as $role)
        <tr>
            <td>{{ $role->getId() }}</td>
            <td>{{ $role->getName() }}</td>
            <td>
            <a href="{{ route('role.edit',$role->getId()) }}">edit</a>
            <form action="{{ route('role.destroy',$role->getId()) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="delete">
            </form>
            </td>
        </tr>
    @endforeach
    </table>
    