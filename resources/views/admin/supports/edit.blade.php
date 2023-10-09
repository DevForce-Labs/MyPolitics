<h1>
    Dúvida  {{ $support->id }}</h1>
    <div>
        <form style="align: center" action="{{ route('support.store') }}" method="post">
            @csrf()
            Assunto:
            <input type="text" placeholder="Assunto" name="subject" id="" value="{{ $support->subject }}">
            <br/>
            Comentário:
            <textarea name="body" cols="30" rows="5" placeholder="Descrição" value="{{ $support->body }}"></textarea>
            <br/>
            <button type="submit">Edit</button>
        </form>
    </div>
