<x-layout title="Times">
    <a class="bg-green-600 text-white p-2 font-medium rounded m-4 inline-block" href="{{ route('teams.create') }}">Criar
        Time</a>

    @isset($successMessage)
        <div class="bg-green-300 text-white font-bold p-4 m-4 rounded">
            {{ $successMessage }}
        </div>
    @endisset

    <ul class="flex flex-col gap-3 mx-4">
        @foreach ($teams as $team)
            <li class="flex items-center justify-between bg-gray-200 rounded p-2">
                {{ $team->city }} {{ $team->name }}

                <div class="flex items-center gap-2">
                    <a href="{{route('teams.edit', $team->id)}}">Editar</a>
                    <form action="{{ route('teams.destroy', $team->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="bg-red-600 text-white px-2 " type="submit">X</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>
