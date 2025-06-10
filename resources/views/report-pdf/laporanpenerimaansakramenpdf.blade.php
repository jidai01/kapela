<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
            margin-bottom: 0;
        }

        .subtitle {
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <h2>{{ $title }}</h2>
    <div class="subtitle">
        Dicetak pada: {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Umat</th>
                <th>Nama Sakramen</th>
                <th>Tanggal Penerimaan Sakramen</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($penerimaansakramen as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row->umat->nama_lengkap ?? '-' }}</td>
                    <td>{{ $row->sakramen->nama_sakramen ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($row->tanggal_penerimaan_sakramen)->format('d-m-Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Tidak ada data penerimaan sakramen.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
