
    @foreach ($tags as $tag)

        <span class="badge badge-success">
            <a style="color: white; font-weight: bold;" href=" {{ route('posts.tag.list', ['id' => $tag->id]) }}">{{ $tag->name }}</a>
        </span>

    @endforeach
