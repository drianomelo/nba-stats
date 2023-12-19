<x-layout title="Criar Time">
    <form action="{{route('teams.store')}}" method="POST">
        @csrf
        <input type="text" name="city" id="city" placeholder="Cidade do Time" value="{{old('city')}}">
        <input type="text" name="name" id="name" placeholder="Nome do Time" value="{{old('name')}}">
        <input type="number" name="player" id="player" placeholder="Quantidade de Jogadores" value="{{old('player')}}">
        <input type="text" name="court" id="court" placeholder="Nome da Quadra" value="{{old('court')}}">
        <button type="submit">Criar</button>
    </form>
</x-layout>
