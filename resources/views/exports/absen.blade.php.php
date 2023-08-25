<table>
    <thead>
    <tr>
        <th>NIM</th>
        <th>Absen</th>
    </tr>
    </thead>
    <tbody>
    @foreach($absen as $item)
        <tr>
            <td>{{ $item->id_pd }}</td>
            <td>{{ $item->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
