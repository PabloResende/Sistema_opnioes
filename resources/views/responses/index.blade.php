@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Responda às Perguntas</h2>

    @foreach($questions as $question)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $question->title }}</h5>
                <p class="card-text">{{ $question->description }}</p>

                <form action="{{ route('responses.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="question_id" value="{{ $question->id }}">

                    @php
                        $responseTypes = json_decode($question->response_types, true);
                    @endphp

                    @foreach($responseTypes as $type)
                        @if($type === 'stars')
                            <div class="star-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" />
                                    <label for="star{{ $i }}" class="star">
                                        <i class="fas fa-star"></i>
                                    </label>
                                @endfor
                            </div>
                        @endif

                        @if($type === 'radio')
                            <div>
                                <input type="radio" name="radio" value="Muito Ruim"> Muito Ruim
                                <input type="radio" name="radio" value="Ruim"> Ruim
                                <input type="radio" name="radio" value="Neutro"> Neutro
                                <input type="radio" name="radio" value="Bom"> Bom
                                <input type="radio" name="radio" value="Muito Bom"> Muito Bom
                            </div>
                        @endif

                    @if($type === 'comment')
                        <textarea name="comment" class="form-control" placeholder="Deixe aqui seu comentário..."></textarea>
                    @endif
                    @endforeach

                    <button type="submit" class="btn btn-primary mt-2">Enviar Resposta</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
