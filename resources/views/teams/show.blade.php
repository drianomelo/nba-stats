<x-layout title="{{$team->city}} {{$team->name}}">

    <ul class="flex flex-col gap-3 mx-4">

        {{$court->name}}

        @foreach ($players as $player)
            <li class="flex items-center justify-between p-2 bg-gray-200 rounded">
                Jogador {{$player->number}}

                <div class="flex items-center gap-2">

                </div>
            </li>
        @endforeach
    </ul>
</x-layout>
