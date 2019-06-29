<style>
    tr td{
        text-align: center;
    }
    table{
        width: 100%;
    }
</style>
<a href="{{ route('post.create') }}">Create</a>
<table>
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('title') }}</th>
        <th>{{ __('description') }}</th>
        <th>{{ __('content') }}</th>
        <th>{{ __('slug') }}</th>
        <th>{{ __('status') }}</th>
        <th>{{ __('') }}</th>
    </tr>

@foreach ($posts as $post)
    <tr>
        <td>{{ $post->getId() }}</td>
        <td>{{ $post->getTitle() }}</td>
        <td>{{ $post->getDescription() }}</td>
        <td>{{ $post->getContent() }}</td>
        <td>{{ $post->getSlug() }}</td>
        <td>{{ $post->getStatus() }}</td>
        <td>
        <a href="{{ route('post.edit',$post->getId()) }}">edit</a>
        <form action="{{ route('post.destroy',$post->getId()) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="delete">
        </form>
        </td>
    </tr>
@endforeach
</table>
