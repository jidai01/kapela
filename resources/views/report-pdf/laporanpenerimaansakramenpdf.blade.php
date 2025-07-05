<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            font-size: 11px;
            color: #212529;
            margin: 20px;
            padding: 0;
        }

        h2 {
            text-align: center;
            font-size: 20px;
            font-weight: 700;
            color: #1f2d5a;
            margin-bottom: 2px;
        }

        .subtitle {
            text-align: center;
            font-size: 11px;
            color: #6c757d;
            margin-bottom: 15px;
        }

        .divider {
            height: 1.5px;
            background-color: #1f2d5a;
            width: 60px;
            margin: 0 auto 20px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 6px 8px;
            vertical-align: top;
        }

        th {
            background-color: #e9ecef;
            font-weight: 600;
            text-align: center;
        }

        td {
            text-align: left;
        }

        tr:nth-child(even) td {
            background-color: #f8f9fa;
        }

        .text-center {
            text-align: center;
        }

        .text-muted {
            color: #6c757d;
        }

        .footer {
            margin-top: 40px;
            text-align: right;
            font-size: 10px;
            color: #999;
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
                <th style="width: 5%;">No</th>
                <th style="width: 45%;">Nama Umat</th>
                <th style="width: 30%;">Nama Sakramen</th>
                <th style="width: 20%;">Tanggal Penerimaan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($penerimaansakramen as $index => $row)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $row->umat->nama_lengkap ?? '-' }}</td>
                    <td>{{ $row->sakramen->nama_sakramen ?? '-' }}</td>
                    <td class="text-center">
                        {{ \Carbon\Carbon::parse($row->tanggal_penerimaan_sakramen)->format('d-m-Y') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted"><em>Tidak ada data penerimaan sakramen.</em></td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dicetak oleh Kapela St. Agustinus Bello &copy; {{ now()->year }}
    </div>
</body>

</html>
