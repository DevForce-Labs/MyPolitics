<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Supports</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
            crossorigin="anonymous">
        <style>
            .wrapper {
                margin: 1em auto;
                width: 95%;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <h1>Listagem dos Supports</h1>

            <a class="btn btn-primary btn-sm" href="{{ route('supports.create') }}" role="button">Create</a>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <th>Código</th>
                    <th>Assunto</th>
                    <th>Status</th>
                    <th>Comentário</th>
                    <th>
                    </th>
                </thead>
                <tbody>
                    @foreach($supports as $supp)
                    <tr>
                        <td>{{ $loop->index +1 }}</td>
                        <td>{{ $supp->subject }}</td>
                        <td>{{ $supp->status }}</td>
                        <td>{{ $supp->body }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('supports.show', $supp->id) }}" role="button">View</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('supports.edit', $supp->id) }}" role="button">Edit</a>
                        </td>
                        </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
            crossorigin="anonymous">
        </script>
    </body>
</html>
