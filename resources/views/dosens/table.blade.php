<div class="table-responsive">
    <table class="table" id="dosens-table">
        <thead>
        <tr>
            <th>Nip</th>
        <th>Nama</th>
        <th>Alamat</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dosens as $dosen)
            <tr>
                <td>{{ $dosen->nip }}</td>
            <td>{{ $dosen->nama }}</td>
            <td>{{ $dosen->alamat }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['dosens.destroy', $dosen->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('dosens.show', [$dosen->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('dosens.edit', [$dosen->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
