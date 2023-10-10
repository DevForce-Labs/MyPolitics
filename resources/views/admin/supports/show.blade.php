<h1>Detalhes</h1>

<ul>
    <li> Id: {{ $supports->id }}</li>
    <li> Assunto: {{ $supports->subject }}</li>
    <li> Status: {{ $supports->status }}</li>
    <li> Comentário: {{ $supports->body }}</li>
    <li> Data da criação: {{ $supports->created_at }}</li>
    <li> Data da última atualização: {{ $supports->updated_at }}</li>

    <a class="btn btn-primary btn-sm" href="{{ route('supports.edit', $supports->id) }}" role="button">Edit</a>
    {{-- <a class="btn btn-primary btn-sm" href="{{ route('supports.destroy', $supports->id) }}" role="button">Delete</a> --}}

    <form action="{{ route('supports.destroy', $supports->id) }}" method="post">
        @csrf()
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    
</ul>
