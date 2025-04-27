<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice Paid</title>
</head>
<body>
    <h2>Invoice Paid</h2>

    <p>Dear {{ $transaction->tenant->user->name }},</p>

    <p>Terima kasih, pembayaran Anda telah kami terima.</p>

    <p><strong>Nomor Invoice:</strong> {{ $transaction->invoice }}</p>
    <p><strong>Tanggal Paid:</strong> {{ $transaction->updated_at->format('d-m-Y') }}</p>

    <h4>Detail Pembayaran:</h4>
    <table border="1" cellpadding="8" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaction->details as $item)
                <tr>
                    <td>{{ $item->category?->title }}</td>
                    <td>Rp {{ number_format($item->amount, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <p>Terima kasih telah melakukan pembayaran.</p> --}}
</body>
</html>
