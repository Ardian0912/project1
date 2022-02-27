<!-- Jenis Field -->
<div class="form-group">
    {!! Form::label('jenis', 'Jenis:') !!}
    <p>{{ $kontak->jenis }}</p>
</div>

<!-- Isian Field -->
<div class="form-group">
    {!! Form::label('isian', 'Isian:') !!}
    <p>{{ $kontak->isian }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $kontak->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $kontak->updated_at }}</p>
</div>

