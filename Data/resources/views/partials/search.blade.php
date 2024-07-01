<div id="search-results">
    @if(isset($results))
        @if($results->isEmpty())
            <p>No results found for your search.</p>
        @else
            <ul>
                @foreach($results as $datasiswa)
                    <li>
                        <div class="bg-white p-4 border border-neutral-500 rounded shadow-md">
                            <p>Nama : {{ $datasiswa->nama }}</p>
                            <p>Ttl : {{ $datasiswa->ttl }}</p>
                            <p>Sekolah : {{ $datasiswa->sekolah }}</p>
                            <p>Keterangan : {{ $datasiswa->keterangan }}</p>
                            <div class="flex space-x-2 py-5 mt-4">
                                <button class="bg-violet-800 text-white font-bold px-3 py-3 rounded" data-modal-target="static-modal{{$datasiswa->id}}" data-modal-toggle="static-modal{{$datasiswa->id}}">Edit</button>
                                <a href="{{ route('datasiswa.destroy', $datasiswa->id) }}" class="bg-neutral-500 text-white px-2 py-2 rounded">Delete</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    @endif
</div>