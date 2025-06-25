<div class="max-w-4xl mx-auto mt-6">
    <h2 class="text-xl font-semibold mb-4">Dashboard Statistik Pemakaian</h2>    

    <div class="bg-white shadow p-4 rounded">
        <canvas id="bookingChart" width="400" height="200"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('bookingChart');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($chartData['labels']),
                    datasets: [{
                        label: 'Jumlah Pemesanan',
                        data: @json($chartData['data']),
                        backgroundColor: '#3b82f6',
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        title: { display: true, text: 'Pemesanan Kendaraan per Bulan' }
                    }
                }
            });
        });
    </script>
</div>