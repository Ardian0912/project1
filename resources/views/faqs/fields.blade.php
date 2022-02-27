<!-- Pertanyaan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pertanyaan', 'Pertanyaan:') !!}
    {!! Form::text('pertanyaan', null, ['class' => 'form-control']) !!}
</div>

<!-- Jawaban Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('jawaban', 'Jawaban:') !!}
    {!! Form::textarea('jawaban', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('faqs.index') }}" class="btn btn-secondary">Cancel</a>
</div>
