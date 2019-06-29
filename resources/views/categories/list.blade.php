<style>
    tr td{
        text-align: center;
    }
    table{
        width: 100%;
    }
</style>
<a href="{{ route('categories.create') }}">Create</a>
<table>
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('name') }}</th>
        <th>{{ __('description') }}</th>
        <th>{{ __('slug') }}</th>
        <th>{{ __('status') }}</th>
        <th>{{ __('') }}</th>
    </tr>

@foreach ($catagories as $catagory)
    <tr>
        <td>{{ $catagory->getId() }}</td>
        <td>{{ $catagory->getName() }}</td>
        <td>{{ $catagory->getDescription() }}</td>
        <td>{{ $catagory->getSlug() }}</td>
        <td>{{ $catagory->getStatus() }}</td>
        <td>
        <a href="{{ route('categories.edit',$catagory->getId()) }}">edit</a>
        <form action="{{ route('categories.destroy',$catagory->getId()) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="delete">
        </form>
        </td>
    </tr>
@endforeach
</table>

{{ session('messageSuccess') }}
