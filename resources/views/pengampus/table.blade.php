<div class="table-responsive">
    <table class="table" id="pengampus-table">
        <thead>
        <tr>
            <th>Matakuliahs Id</th>
        <th>Dosens Id</th>
        <th>Tahun Ajaran</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pengampus as $pengampu)
            <tr>
                <td>{{ $pengampu->matakuliah->nama }}</td>
            <td>{{ $pengampu->dosen->nama }}</td>
            <td>{{ $pengampu->tahun_ajaran }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['pengampus.destroy', $pengampu->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('pengampus.show', [$pengampu->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('pengampus.edit', [$pengampu->id]) }}"
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
