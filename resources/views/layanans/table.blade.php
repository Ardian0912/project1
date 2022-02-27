<div class="table-responsive-sm">
    <table class="table table-striped" id="layanans-table">
        <thead>
            <tr>
                <th>Nama</th>
        <th>Detail</th>
        <th>Harga</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($layanans as $layanan)
            <tr>
                <td>{{ $layanan->nama }}</td>
            <td>{{ $layanan->detail }}</td>
            <td>{{ $layanan->harga }}</td>
                <td>
                    {!! Form::open(['route' => ['layanans.destroy', $layanan->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('layanans.show', [$layanan->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('layanans.edit', [$layanan->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>