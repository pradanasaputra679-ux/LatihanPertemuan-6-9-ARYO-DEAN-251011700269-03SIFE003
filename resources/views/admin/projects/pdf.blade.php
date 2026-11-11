<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Project MyProfile</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #222;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header h2 {
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .header p {
            margin: 3px;
            color: #555;
        }

        .info {
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #999;
            padding: 9px;
            text-align: left;
        }

        th {
            background-color: #222;
            color: white;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 25px;
            text-align: right;
            font-size: 10px;
            color: #555;
        }

        .center {
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Laporan Data Project</h2>
        <h3>MyProfile Portfolio</h3>
        <p>Daftar seluruh project yang tersimpan dalam sistem</p>
    </div>

    <div class="info">
        <strong>Tanggal Cetak:</strong>
        {{ date('d-m-Y H:i') }}
        <br>
        <strong>Total Project:</strong>
        {{ $projects->count() }} Project
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Nama Project</th>
                <th width="35%">Deskripsi</th>
                <th width="20%">Teknologi</th>
                <th width="15%">Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <td class="center">{{ $loop->iteration }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->technologies ?? '-' }}</td>
                    <td class="center">{{ $project->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="center">
                        Belum ada data project.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Dicetak melalui sistem MyProfile Portfolio
    </div>

</body>
</html>
