<ul class="nested">
    @foreach ($akunAnak as $dataAnak)
        <li class="py-2">                            
            @if (count($dataAnak->akunAnak))
            <span class="caret">
            @endif
            <a href="{{ route('akun.show', $dataAnak->id) }}">{{ $dataAnak->nama }}</a>
            @if (count($dataAnak->akunAnak))
            </span>
            @endif 
            <a href="{{ route('akun.create', ['id' => $dataAnak->id]) }}"><x-secondary-button>{{ __('Tambah') }}</x-primary-button></a>
            <a href="{{ route('akun.edit', $dataAnak->id) }}"><x-secondary-button>{{ __('Ubah') }}</x-primary-button></a>
            <form action="{{ route('akun.destroy', $dataAnak->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <x-primary-button>{{ __('Hapus') }}</x-primary-button>
            </form>             
            @if (count($dataAnak->akunAnak))
                @include('akun.anak', ['akunAnak' => $dataAnak->akunAnak])	
            @endif                          
        </li>                        
    @endforeach
</ul>