<x-layout title="Times">
    <a class="inline-block p-2 m-4 font-medium text-white bg-green-600 rounded" href="{{ route('teams.create') }}">Criar
        Time</a>

    @isset($successMessage)
        <div class="p-4 m-4 font-bold text-white bg-green-300 rounded">
            {{ $successMessage }}
        </div>
    @endisset

    <ul class="flex flex-col gap-3 mx-4">
        @foreach ($teams as $team)
            <li class="flex items-center justify-between p-2 bg-gray-200 rounded">
                <a href="{{route('teams.show', $team->id)}}">
                    {{ $team->city }} {{ $team->name }}
                </a>


                <div class="flex items-center gap-2">
                    <a href="{{route('teams.edit', $team->id)}}">Editar</a>
                    <form action="{{ route('teams.destroy', $team->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="px-2 text-white bg-red-600 " type="submit">X</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>
