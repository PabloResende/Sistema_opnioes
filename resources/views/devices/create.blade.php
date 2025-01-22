@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Adicionar Novo Dispositivo</h1>
        <form method="POST" action="{{ route('devices.store') }}">
            @csrf
            <div class="mb-3">
                <label for="device_name" class="form-label">Nome do Dispositivo</label>
                <input type="text" class="form-control" id="device_name" name="device_name" required>
            </div>
            <div class="mb-3">
                <label for="device_type" class="form-label">Tipo do Dispositivo</label>
                <input type="text" class="form-control" id="device_type" name="device_type" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
