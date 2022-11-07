<div class="table-responsive">
    <table class="table" id="matakuliahs-table">
        <thead>
        <tr>
            <th>Kode</th>
        <th>Nama</th>
        <th>Sks</th>
        <th>Semester</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($matakuliahs as $matakuliah)
            <tr>
                <td>{{ $matakuliah->kode }}</td>
            <td>{{ $matakuliah->nama }}</td>
            <td>{{ $matakuliah->sks }}</td>
            <td>{{ $matakuliah->semester }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['matakuliahs.destroy', $matakuliah->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('matakuliahs.show', [$matakuliah->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('matakuliahs.edit', [$matakuliah->id]) }}"
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
