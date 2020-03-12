<table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nama Jabatan</th>
                                <th>Nama Produk</th>
                                <th>Nama Customer</th>
                                <th>KTP Customer</th>
                                <th>Jumlah</th>
                                <th>Komisi</th>
                                <th>Admin</th>
                                <th>Tanggal Komisi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                            @foreach($komisi as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->nama_jabatan }}</td>
                                <td>{{ $p->nama_produk }}</td>
                                <td>{{ $p->nama_customer }}</td>
                                <td>{{ $p->ktp_customer }}</td>
                                <td>{{ $p->jumlah }}</td>
                                <td>{{ $p->komisi }}</td>
                                <td>{{ $p->admin }}</td>
                                <td>{{ $p->created_at }}</td>
                              
                            </tr>
                            @endforeach
                        </tbody>
                    </table>