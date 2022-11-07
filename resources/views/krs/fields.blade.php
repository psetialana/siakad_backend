<!-- Mahasiswas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mahasiswas_id', 'Mahasiswas Id:') !!}
    {{ Form::select('mahasiswas_id', App\Models\Mahasiswa::get()->pluck('nama', 'id')->prepend('-- Pilih Mahasiswa --', ''), null, ['class' => 'form-control', 'id' => 'mahasiswas_id']) }}
</div>

<!-- Matakuliahs Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matakuliahs_id', 'Matakuliahs Id:') !!}
    {{ Form::select('matakuliahs_id', App\Models\Matakuliah::get()->pluck('nama', 'id')->prepend('-- Pilih Individu --', ''), null, ['class' => 'form-control', 'id' => 'matakuliahs_id']) }}
</div>

<!-- Tahun Ajaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tahun_ajaran', 'Tahun Ajaran:') !!}
    {!! Form::text('tahun_ajaran', null, ['class' => 'form-control']) !!}
</div>

<!-- Nilai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai', 'Nilai:') !!}
    {!! Form::text('nilai', null, ['class' => 'form-control']) !!}
</div>