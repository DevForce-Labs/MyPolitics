<h1>Dúvida - Nº {{ $support->id }}</h1>
    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        @endif

        <form action="{{ route('supports.update', $support->id) }}" method="POST">
            @csrf()
            @method('PUT')
            <input type="text" placeholder="Assunto" name="subject" id="" value="{{ $support->subject }}">
            <textarea name="body" cols="30" rows="5" placeholder="Descrição" >{{ $support->body }}</textarea>
            <button type="submit">Edit</button>
        </form>
    </div>
