<!-- Kode Field -->
<div class="col-sm-12">
    {!! Form::label('kode', 'Kode:') !!}
    <p>{{ $matakuliah->kode }}</p>
</div>

<!-- Nama Field -->
<div class="col-sm-12">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $matakuliah->nama }}</p>
</div>

<!-- Sks Field -->
<div class="col-sm-12">
    {!! Form::label('sks', 'Sks:') !!}
    <p>{{ $matakuliah->sks }}</p>
</div>

<!-- Semester Field -->
<div class="col-sm-12">
    {!! Form::label('semester', 'Semester:') !!}
    <p>{{ $matakuliah->semester }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $matakuliah->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $matakuliah->updated_at }}</p>
</div>

