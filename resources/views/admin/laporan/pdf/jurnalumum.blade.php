<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
            margin: 0px;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
            padding-bottom: 0px;
        }

        .header h1 {
            font-size: 18px;
            margin: 0;
            color: #333;
        }

        .header .address {
            font-size: 13px;
            margin: 5px 0;
            color: #666;
        }

        .header .separator {
            border-bottom: 2px solid #333;
            margin: 10px 0;
        }

        .header .title {
            font-size: 18px;
            font-weight: bold;
            margin: 0px 0 0px 0;
            color: #333;
        }

        .header .date {
            font-size: 11px;
            color: #666;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .footer {
            margin-top: 50px;
            text-align: right;
            font-size: 11px;
            color: #666;
        }

        .total-row {
            font-weight: bold;
            background-color: #e0e0e0;
        }

        .signature {
            margin-top: 30px;
            text-align: right;
        }

        .signature .date {
            margin-bottom: 0px;
            font-weight: bold;
        }

        .signature .title {
            margin-bottom: 0px;
            font-weight: bold;
        }

        .filter-info {
            font-size: 12px;
            color: #333;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>{{ $company }}</h1>
        <p class="address">Komplek Kota Citra Graha Ruko Nomor 6, Banjarbaru, Kalimantan Selatan</p>
        <div class="separator"></div>
        <p class="title">{{ $title }}</p>
        <p class="date">Tanggal Cetak: {{ $date }}</p>
        <p class="filter-info">Periode: {{ \Carbon\Carbon::createFromDate($filterYear, $filterMonth, 1)->format('F Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center" style="width: 50px;">No</th>
                <th class="text-center" style="width: 90px;">Tanggal</th>
                <th>Deskripsi</th>
                <th class="text-right" style="width: 130px;">Debit</th>
                <th class="text-right" style="width: 130px;">Kredit</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jurnals as $index => $item)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($item['tanggal'])->format('d/m/Y') }}</td>
                <td>{{ $item['deskripsi'] ?? '-' }}</td>
                <td class="text-right">{{ $item['debit'] > 0 ? 'Rp ' . number_format($item['debit'], 0, ',', '.') : '-' }}</td>
                <td class="text-right">{{ $item['kredit'] > 0 ? 'Rp ' . number_format($item['kredit'], 0, ',', '.') : '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
            <tr class="total-row">
                <td colspan="3" class="text-right">TOTAL</td>
                <td class="text-right">Rp {{ number_format($totalDebit ?? 0, 0, ',', '.') }}</td>
                <td class="text-right">Rp {{ number_format($totalKredit ?? 0, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="signature">
        <p class="date">Banjarbaru, {{ date('d F Y') }}</p>
        <p class="title">Direktur</p>
        <br><br><br>
        <p>(________________)</p>
    </div>
</body>

</html>
