@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Responda às Perguntas</h2>

    <form action="{{ route('responses.store') }}" method="POST">
        @csrf

        @foreach($questions as $question)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $question->title }}</h5>
                    <p class="card-text">{{ $question->description }}</p>

                    @php
                        $responseTypes = json_decode($question->response_types, true);
                    @endphp

                    @foreach($responseTypes as $type)
            @if($type === 'stars')
    <div class="star-rating">
        @for($i = 5; $i >= 1; $i--)  {{-- Inverteu o loop para começar com 5--}}
            <input type="radio" id="star{{ $question->id }}_{{ $i }}" name="responses[{{ $question->id }}][rating]" value="{{ $i }}" />
            <label for="star{{ $question->id }}_{{ $i }}" class="star">
                <i class="fas fa-star"></i>
            </label>
        @endfor
    </div>
@endif  

                        @if($type === 'radio')
                            <div>
                                <input type="radio" name="responses[{{ $question->id }}][radio]" value="Muito Ruim"> Muito Ruim
                                <input type="radio" name="responses[{{ $question->id }}][radio]" value="Ruim"> Ruim
                                <input type="radio" name="responses[{{ $question->id }}][radio]" value="Neutro"> Neutro
                                <input type="radio" name="responses[{{ $question->id }}][radio]" value="Bom"> Bom
                                <input type="radio" name="responses[{{ $question->id }}][radio]" value="Muito Bom"> Muito Bom
                            </div>
                        @endif

                        @if($type === 'comment')
                            <textarea name="responses[{{ $question->id }}][comment]" class="form-control" placeholder="Deixe aqui seu comentário..."></textarea>
                        @endif
                    @endforeach

                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary mt-2">Enviar Todas as Respostas</button>
    </form>
</div>
@endsection
