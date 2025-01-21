@extends('layouts.app')

@section('content')
    <h1>Análise de Respostas</h1>

    <table>
        <thead>
            <tr>
                <th>Pergunta</th>
                <th>Resposta</th>
                <th>Usuário</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($answers as $answer)
                <tr>
                    <td>{{ $answer->question->title }}</td>
                    <td>{{ $answer->content }}</td>
                    <td>{{ $answer->user->name }}</td>
                    <td>{{ $answer->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('analytics.export') }}">Exportar para Excel</a>
    <form method="POST" action="{{ route('analytics.sendEmail') }}">
        @csrf
        <input type="email" name="email" placeholder="Digite o email">
        <button type="submit">Enviar por Email</button>
    </form>
@endsection
