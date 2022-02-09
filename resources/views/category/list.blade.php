<table class="table table-hover table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Owner</th>
        <th>Controls</th>
        <th>Created At:</th>
    </tr>
    </thead>
    <tbody>
    @forelse(\App\Models\Category::with('user')->get() as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->user->name }}</td>
            <td>
                <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary btn-sm">
                    <i class="feather-edit"></i>
                </a>
                <form action="{{ route('category.destroy',$category->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm" onclick="confirm('Are you sure to delete {{ $category->title }} category?')">
                        <i class="feather-trash-2"></i>
                    </button>
                </form>
            </td>
            <td>
                <small>
                    <i class="feather-calendar"></i>
                    {{ $category->created_at->format("d-M-y") }}
                    <br>
                    <i class="feather-clock"></i>
                    {{ $category->created_at->format("h:i A") }}
                </small>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center">There is no category</td>
        </tr>
    @endforelse
    </tbody>
</table>
