<h1>Nova dúvida</h1>

<form action="{{ route('support.store') }}" method="post">
    @csrf()
    <input type="text" placeholder="Assunto" name="subject" id="">
    <textarea name="body" id="" cols="30" rows="5" placeholder="Descrição"></textarea>
    <button type="submit">Create</button>
</form>