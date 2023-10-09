<h1>Detalhes</h1>

<ul>
    <li> Id: {{ $support->id }}</li>
    <li> Assunto: {{ $support->subject }}</li>
    <li> Status: {{ $support->status }}</li>
    <li> Comentário: {{ $support->body }}</li>
    <li> Data da criação: {{ $support->created_at }}</li>
    <li> Data da última atualização: {{ $support->updated_at }}</li>

    
</ul>
