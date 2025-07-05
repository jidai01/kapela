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

        .page-break {
            page-break-after: always;
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
                <th style="width: 25%;">Nama Kegiatan</th>
                <th style="width: 20%;">Nama Wilayah</th>
                <th style="width: 30%;">Deskripsi</th>
                <th style="width: 20%;">Tanggal Kegiatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kegiatanwilayah as $index => $row)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $row->nama_kegiatan_wilayah }}</td>
                    <td>{{ $row->wilayah->nama_wilayah }}</td>
                    <td>{{ $row->deskripsi }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($row->tanggal_kegiatan)->format('d-m-Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted"><em>Tidak ada data kegiatan wilayah.</em></td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dicetak oleh Kapela St. Agustinus Bello &copy; {{ now()->year }}
    </div>
</body>

</html>
