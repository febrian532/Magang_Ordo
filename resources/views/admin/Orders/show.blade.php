<button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
document.getElementById('pay-button').onclick = function () {
    fetch('{{ route('payment.create') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ order_id: {{ $order->id }} })
    })
    .then(response => response.json())
    .then(data => {
        if (data.snap_token) {
            window.snap.pay(data.snap_token, {
                onSuccess: function(result) {
                    alert("Pembayaran berhasil!");
                    console.log(result);
                },
                onPending: function(result) {
                    alert("Menunggu pembayaran...");
                },
                onError: function(result) {
                    alert("Terjadi kesalahan.");
                    console.log(result);
                },
                onClose: function() {
                    alert('Kamu menutup popup tanpa menyelesaikan pembayaran.');
                }
            });
        } else {
            alert('Gagal membuat transaksi: ' + data.error);
        }
    });
};
</script>
