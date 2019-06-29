<style>
    tr td{
        text-align: center;
    }
    table{
        width: 100%;
    }
</style>
<a href="{{ route('tag.create') }}">Create</a>
<table>
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('name') }}</th>
        <th>{{ __('') }}</th>
    </tr>

@foreach ($taggs as $tag)
    <tr>
        <td>{{ $tag->getId() }}</td>
        <td>{{ $tag->getName() }}</td>
        <td>
        <a href="{{ route('tag.edit',$tag->getId()) }}">edit</a>
        <form action="{{ route('tag.destroy',$tag->getId()) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="delete">
        </form>
        </td>
    </tr>
@endforeach
</table>
