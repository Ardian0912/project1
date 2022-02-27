<div class="table-responsive-sm">
    <table class="table table-striped" id="faqs-table">
        <thead>
            <tr>
                <th>Pertanyaan</th>
        <th>Jawaban</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($faqs as $faq)
            <tr>
                <td>{{ $faq->pertanyaan }}</td>
            <td>{{ $faq->jawaban }}</td>
                <td>
                    {!! Form::open(['route' => ['faqs.destroy', $faq->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('faqs.show', [$faq->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('faqs.edit', [$faq->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>