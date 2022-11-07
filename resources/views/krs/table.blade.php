<div class="table-responsive">
    <table class="table" id="krs-table">
        <thead>
        <tr>
            <th>Mahasiswas Id</th>
        <th>Matakuliahs Id</th>
        <th>Tahun Ajaran</th>
        <th>Nilai</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($krs as $krs)
            <tr>
                <td>{{ $krs->mahasiswa->nama }}</td>
            <td>{{ $krs->matakuliah->nama }}</td>
            <td>{{ $krs->tahun_ajaran }}</td>
            <td>{{ $krs->nilai }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['krs.destroy', $krs->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('krs.show', [$krs->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('krs.edit', [$krs->id]) }}"
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
