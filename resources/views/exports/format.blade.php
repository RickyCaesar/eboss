<table>
    <thead>
    <tr>
        <th>Satuan Pendidikan</th>
        <th>NPSN</th>
        <th>Bentuk Pendidikan</th>
        <th>Kabupaten/Kota</th>
        <th>Peserta Didik</th>
        <th>Pagu BOSNAS</th>
        <th>Pagu BOSDA</th>
    </tr>
    </thead>
    <tbody>
    @foreach($bos as $data)
        <tr>
            <td>{{ $data->satuan_pendidikan }}</td>
            <td>{{ $data->npsn }}</td>
            <td>{{ $data->bentuk_pendidikan }}</td>
            <td>{{ $data->kab_kota_sp }}</td>
            <td>{{ $data->peserta_didik }}</td>
            <td>{{ $data->pagu_bosnas }}</td>
            <td>{{ $data->pagu_bosda }}</td>
        </tr>
    @endforeach
    </tbody>
</table>