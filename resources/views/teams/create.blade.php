<x-layout title="Criar Time">
    <form action="{{route('teams.store')}}" method="POST">
        @csrf
        <input type="text" name="city" id="city" placeholder="Cidade do Time" value="{{old('city')}}">
        <input type="text" name="name" id="name" placeholder="Nome do Time" value="{{old('name')}}">
        <button type="submit">Criar</button>
    </form>
</x-layout>
