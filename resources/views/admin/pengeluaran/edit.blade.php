@extends('layouts.master')

@section('title', 'Edit Pengeluaran Dana')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center mb-2">
            <a href="{{ route('admin.pengeluaran.index') }}" class="mr-4 text-slate-600 hover:text-slate-800">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-bold text-slate-800">Edit Pengeluaran Dana</h1>
        </div>
        <p class="text-slate-600">Edit data pengeluaran dana: {{ $pengeluaran->nota }}</p>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.pengeluaran.update', $pengeluaran->id) }}" method="POST" id="pengeluaranForm">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- No. Nota -->
                <div>
                    <label for="nota" class="block text-sm font-medium text-slate-700 mb-2">
                        No. Nota <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nota" id="nota"
                        value="{{ old('nota', $pengeluaran->nota) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nota') border-red-500 @enderror"
                        placeholder="Contoh: NOTA-2026-001">
                    @error('nota')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal -->
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-slate-700 mb-2">
                        Tanggal <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="tanggal" id="tanggal"
                        value="{{ old('tanggal', $pengeluaran->tanggal->format('Y-m-d')) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('tanggal') border-red-500 @enderror">
                    @error('tanggal')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Proyek -->
                <div>
                    <label for="proyek_id" class="block text-sm font-medium text-slate-700 mb-2">
                        Proyek <span class="text-red-500">*</span>
                    </label>
                    <select name="proyek_id" id="proyek_id"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('proyek_id') border-red-500 @enderror">
                        <option value="">-- Pilih Proyek --</option>
                        @foreach($proyeks as $proyek)
                        <option value="{{ $proyek->id }}" {{ old('proyek_id', $pengeluaran->proyek_id) == $proyek->id ? 'selected' : '' }}>
                            ID{{ $proyek->kode_proyek }} - {{ $proyek->nama_proyek }}
                        </option>
                        @endforeach
                    </select>
                    @error('proyek_id')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pegawai -->
                <div>
                    <label for="pegawai_id" class="block text-sm font-medium text-slate-700 mb-2">
                        Pegawai <span class="text-red-500">*</span>
                    </label>
                    <select name="pegawai_id" id="pegawai_id"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('pegawai_id') border-red-500 @enderror">
                        <option value="">-- Pilih Pegawai --</option>
                        @foreach($pegawais as $pegawai)
                        <option value="{{ $pegawai->id }}" {{ old('pegawai_id', $pengeluaran->pegawai_id) == $pegawai->id ? 'selected' : '' }}>
                            ID {{ $pegawai->id }} - {{ $pegawai->nama }}
                        </option>
                        @endforeach
                    </select>
                    @error('pegawai_id')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Keterangan -->
                <div class="md:col-span-2">
                    <label for="keterangan" class="block text-sm font-medium text-slate-700 mb-2">
                        Keterangan
                    </label>
                    <textarea name="keterangan" id="keterangan" rows="3"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('keterangan') border-red-500 @enderror"
                        placeholder="Masukkan keterangan tambahan (opsional)">{{ old('keterangan', $pengeluaran->keterangan) }}</textarea>
                    @error('keterangan')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Detail Items -->
            <div class="mt-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-slate-800">Detail Pengeluaran</h3>
                    <button type="button" id="addDetailBtn"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Item
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border border-slate-300 rounded-lg" id="detailsTable">
                        <thead class="bg-slate-100">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-700 uppercase">Biaya</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-700 uppercase">Kode</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-700 uppercase">Nama</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-700 uppercase">Harga</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-700 uppercase">Jumlah</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-slate-700 uppercase">Total</th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-slate-700 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="detailsBody">
                            <!-- Details will be added here dynamically -->
                        </tbody>
                        <tfoot class="bg-slate-50">
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-right font-semibold text-slate-700">Total:</td>
                                <td class="px-4 py-3 font-semibold text-slate-800" id="grandTotal">Rp {{ number_format($pengeluaran->total, 0, ',', '.') }}</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Buttons -->
            <div class="mt-6 flex items-center justify-end space-x-3">
                <a href="{{ route('admin.pengeluaran.index') }}"
                    class="px-6 py-2 border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-save mr-2"></i>
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    let detailIndex = 0;
    const biayas = @json($biayas);
    const existingDetails = @json($pengeluaran->details);

    document.getElementById('addDetailBtn').addEventListener('click', function() {
        addDetailRow();
    });

    function addDetailRow(data = {}) {
        const tbody = document.getElementById('detailsBody');
        const currentIndex = detailIndex;
        const row = document.createElement('tr');
        row.className = 'border-b border-slate-200';
        row.setAttribute('data-index', currentIndex);
        row.innerHTML = `
            <td class="px-4 py-3">
                <select name="details[${detailIndex}][biaya_id]" 
                    class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 biaya-select"
                    onchange="updateBiayaDetails(${detailIndex})">
                    <option value="">-- Pilih Biaya --</option>
                    @foreach($biayas as $biaya)
                    <option value="{{ $biaya->id }}" data-harga="{{ $biaya->harga }}" data-kode="{{ $biaya->kode }}" data-nama="{{ $biaya->nama }}">
                        {{ $biaya->kode }} - {{ $biaya->nama }} (Rp {{ number_format($biaya->harga, 0, ',', '.') }})
                    </option>
                    @endforeach
                </select>
            </td>
            <td class="px-4 py-3">
                <input type="text" name="details[${detailIndex}][kode]" 
                    class="w-full px-3 py-2 border border-slate-300 rounded-lg kode-input"
                    placeholder="Kode" value="${data.kode || ''}">
            </td>
            <td class="px-4 py-3">
                <input type="text" name="details[${detailIndex}][nama]" 
                    class="w-full px-3 py-2 border border-slate-300 rounded-lg nama-input"
                    placeholder="Nama" value="${data.nama || ''}">
            </td>
            <td class="px-4 py-3">
                <input type="number" name="details[${detailIndex}][harga]" 
                    class="w-full px-3 py-2 border border-slate-300 rounded-lg harga-input"
                    placeholder="Harga" value="${data.harga || ''}" onchange="calculateTotal(${detailIndex})">
            </td>
            <td class="px-4 py-3">
                <input type="number" name="details[${detailIndex}][jumlah]" 
                    class="w-full px-3 py-2 border border-slate-300 rounded-lg jumlah-input"
                    placeholder="Jumlah" min="1" value="${data.jumlah || 1}" onchange="calculateTotal(${detailIndex})">
            </td>
            <td class="px-4 py-3 text-slate-800 font-medium total-cell">
                Rp 0
            </td>
            <td class="px-4 py-3 text-center">
                <button type="button" onclick="removeDetailRow(this)" 
                    class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition-colors">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        tbody.appendChild(row);
        
        // Set selected option if biaya_id is provided
        if (data.biaya_id) {
            const select = row.querySelector('.biaya-select');
            const option = select.querySelector(`option[value="${data.biaya_id}"]`);
            if (option) {
                option.selected = true;
                // Also trigger updateBiayaDetails to populate other fields
                setTimeout(() => updateBiayaDetails(currentIndex), 0);
            }
        }
        
        // Calculate total if we have harga and jumlah
        if (data.harga && data.jumlah) {
            setTimeout(() => calculateTotal(currentIndex), 0);
        }
        
        detailIndex++;
    }

    function updateBiayaDetails(index) {
        const select = document.querySelector(`tr[data-index="${index}"] .biaya-select`);
        if (!select) return;
        
        const option = select.options[select.selectedIndex];
        
        if (option.value) {
            const harga = parseInt(option.dataset.harga) || 0;
            const kode = option.dataset.kode || '';
            const nama = option.dataset.nama || '';
            
            const row = select.closest('tr');
            row.querySelector('.kode-input').value = kode;
            row.querySelector('.nama-input').value = nama;
            row.querySelector('.harga-input').value = harga;
            
            calculateTotalForRow(row);
        }
    }

    function calculateTotal(index) {
        const row = document.querySelector(`tr[data-index="${index}"]`);
        if (row) {
            calculateTotalForRow(row);
        }
    }

    function calculateTotalForRow(row) {
        const hargaInput = row.querySelector('.harga-input');
        const jumlahInput = row.querySelector('.jumlah-input');
        
        let harga = 0;
        let jumlah = 1;
        
        if (hargaInput && hargaInput.value) {
            harga = parseFloat(hargaInput.value) || 0;
        }
        
        if (jumlahInput && jumlahInput.value) {
            jumlah = parseFloat(jumlahInput.value) || 1;
        }
        
        const total = harga * jumlah;
        
        const totalCell = row.querySelector('.total-cell');
        if (totalCell) {
            totalCell.textContent = 'Rp ' + total.toLocaleString('id-ID');
            calculateGrandTotal();
        }
    }

    function calculateGrandTotal() {
        let grandTotal = 0;
        document.querySelectorAll('#detailsBody tr').forEach(row => {
            const cell = row.querySelector('.total-cell');
            if (cell) {
                const value = cell.textContent.replace('Rp ', '').replace(/\./g, '');
                grandTotal += Number(value) || 0;
            }
        });
        const grandTotalEl = document.getElementById('grandTotal');
        if (grandTotalEl) {
            grandTotalEl.textContent = 'Rp ' + grandTotal.toLocaleString('id-ID');
        }
    }

    function removeDetailRow(button) {
        const row = button.closest('tr');
        row.remove();
        calculateGrandTotal();
    }

    // Load existing details
    if (existingDetails && existingDetails.length > 0) {
        existingDetails.forEach(detail => {
            addDetailRow({
                biaya_id: detail.biaya_id,
                kode: detail.kode,
                nama: detail.nama,
                harga: detail.harga,
                jumlah: detail.jumlah
            });
        });
    } else {
        addDetailRow();
    }
    
    // Recalculate grand total after all rows are loaded
    setTimeout(calculateGrandTotal, 100);
</script>
@endpush
@endsection
