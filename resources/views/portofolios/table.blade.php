<div class="table-responsive-sm">
    <table class="table table-striped" id="portofolios-table">
        <thead>
            <tr>
                <th>Nama</th>
        <th>Deskripsi</th>
        <th>Photo</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($portofolios as $portofolio)
            <tr>
                <td>{{ $portofolio->nama }}</td>
            <td>{{ $portofolio->deskripsi }}</td>
            <td>{{ $portofolio->photo }}</td>
                <td>
                    {!! Form::open(['route' => ['portofolios.destroy', $portofolio->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('portofolios.show', [$portofolio->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('portofolios.edit', [$portofolio->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>