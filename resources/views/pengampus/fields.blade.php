<!-- Matakuliah Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matakuliahs_id', 'Matakuliah:') !!}
    {{ Form::select('matakuliahs_id', App\Models\Matakuliah::get()->pluck('nama', 'id')->prepend('-- Pilih Matakuliah --', ''), null, ['class' => 'form-control', 'id' => 'matakuliahs_id']) }}
</div>

<!-- Matakuliahs Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dosens_id', 'Dosen:') !!}
    {{ Form::select('dosens_id', App\Models\Dosen::get()->pluck('nama', 'id')->prepend('-- Pilih Dosen --', ''), null, ['class' => 'form-control', 'id' => 'dosens_id']) }}
</div>
<!-- Tahun Ajaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tahun_ajaran', 'Tahun Ajaran:') !!}
    {!! Form::text('tahun_ajaran', null, ['class' => 'form-control']) !!}
</div>