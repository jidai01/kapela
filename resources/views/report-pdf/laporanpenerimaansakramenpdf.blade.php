<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            font-size: 12px;
            background-color: #ffffff;
            color: #212529;
            padding: 30px;
        }

        h2 {
            text-align: center;
            font-size: 22px;
            font-weight: 700;
            color: #1f2d5a;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            font-size: 12px;
            color: #6c757d;
            margin-bottom: 20px;
        }

        .divider {
            height: 2px;
            background-color: #1f2d5a;
            width: 80px;
            margin: 0 auto 20px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 12px;
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 8px 10px;
            text-align: center;
        }

        th {
            background-color: #e9ecef;
            color: #212529;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .empty-row {
            text-align: center;
            font-style: italic;
            color: #6c757d;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 11px;
            color: #999;
        }

        @media print {
            body {
                margin: 0;
            }

            .footer {
                position: fixed;
                bottom: 10px;
                right: 30px;
            }
        }
    </style>
</head>

<body>
    <h2>{{ $title }}</h2>
    <div class="divider"></div>
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
                    <td colspan="4" class="empty-row">Tidak ada data penerimaan sakramen.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dicetak oleh Kapela St. Agustinus Bello &copy; {{ now()->year }}
    </div>
</body>

</html>
