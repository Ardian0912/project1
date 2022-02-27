<!-- Pertanyaan Field -->
<div class="form-group">
    {!! Form::label('pertanyaan', 'Pertanyaan:') !!}
    <p>{{ $faq->pertanyaan }}</p>
</div>

<!-- Jawaban Field -->
<div class="form-group">
    {!! Form::label('jawaban', 'Jawaban:') !!}
    <p>{{ $faq->jawaban }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $faq->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $faq->updated_at }}</p>
</div>

