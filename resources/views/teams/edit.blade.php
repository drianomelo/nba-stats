<x-layout title="Editar Time">
    <form action="{{route('teams.update', $team->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="city" id="city" placeholder="Cidade do Time" value="{{$team->city}}">
        <input type="text" name="name" id="name" placeholder="Nome do Time" value="{{$team->name}}">,
        <input type="number" name="player" id="player" placeholder="Quantidade de Jogadores" value="{{$team->player}}">
        <input type="text" name="court" id="court" placeholder="Nome da Quadra" value="{{$team->court}}">
        <button type="submit">Editar</button>
    </form>
</x-layout>
