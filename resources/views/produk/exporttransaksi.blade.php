<table class="table table-lg table-dark table-hover table-striped">
                    <!-- <table class="table table-bordered table-hover table-striped"> -->
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Anggota</th>
                                <th>Nama Produk</th>
                                <th>Nama Customer</th>
                                <th>KTP Customer</th>
                                <th>Approval</th>
                                <th>Tanggal Approve</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                            @foreach($produk as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->nama_produk }}</td>
                                <td>{{ $p->nama_customer }}</td>
                                <td>{{ $p->ktp_customer }}</td>
                                <td>{{ $p->admin }}</td>
                                <td>{{ $p->date }}</td>
                                <td> 
                                    <a href="reportBatal/{{ $p->id_transaksi_detail}}"  onclick="return confirm('Are you sure?')" class="btn btn-warning">Batal</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>