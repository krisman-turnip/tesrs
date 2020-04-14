<!DOCTYPE html>
<html>
  @include('layouts.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.sidebar')
  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                           
                        </div>
                    @endif
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content">
            <div class="card mt-3">
                <div class="card-header text-center">
                    <h3>Tambah Supplier</h3> 
                </div>
                <a href="{{url('suplier')}}" class="btn btn-primary">Kembali</a>
                <!-- <a href="../pegawai" class="btn btn-primary">store</a> -->
                <br/>
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <form method="POST" action="{{url('supplier/prosestambah')}}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email" class="col-md-2 col-form-label text-md-right">Supplier Name</label>

                                        <div class="col-md-4">
                                            <input id="email" type="text" class="form-control" name="supplier_name" required autocomplete="email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-2 col-form-label text-md-right">Contact Person</label>

                                        <div class="col-md-4">
                                            <input id="password" type="text" class="form-control " name="contact_person" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-2 col-form-label text-md-right">address</label>

                                        <div class="col-md-4">
                                            <input id="password" type="text" class="form-control" name="address" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="menu" class="col-md-2 col-form-label text-md-right">Telepon</label>

                                        <div class="col-md-4">
                                            <input id="menu" type="text" class="form-control" name="telp" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="menu" class="col-md-2 col-form-label text-md-right">Fax</label>

                                        <div class="col-md-4">
                                            <input id="menu" type="text" class="form-control" name="fax" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="menu" class="col-md-2 col-form-label text-md-right">Email</label>

                                        <div class="col-md-4">
                                            <input id="datepicker1" type="text" class="form-control" name="email" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-2 col-form-label text-md-right">Cabang</label>

                                        <div class="col-md-4">
                                            <input id="email" type="text" class="form-control" name="cabang" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-2 col-form-label text-md-right">Top</label>

                                        <div class="col-md-4">
                                            <input id="password" type="text" class="form-control" name="top" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-2 col-form-label text-md-right">Bank</label>

                                        <div class="col-md-4">
                                            <input id="password" type="text" class="form-control" name="bank" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="menu" class="col-md-2 col-form-label text-md-right">Bank Name</label>

                                        <div class="col-md-4">
                                            <input id="menu" type="text" class="form-control" name="bank_name" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="menu" class="col-md-2 col-form-label text-md-right">Bank No</label>

                                        <div class="col-md-4">
                                            <input id="menu" type="text" class="form-control" name="bank_no" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="menu" class="col-md-2 col-form-label text-md-right">Supplier Tax</label>

                                        <div class="col-md-4">
                                            <input id="menu" type="text" class="form-control" name="supplier_tax" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="menu" class="col-md-2 col-form-label text-md-right">Utang</label>

                                        <div class="col-md-4">
                                            <input id="menu" type="text" class="form-control" name="utang_acc_id" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="menu" class="col-md-2 col-form-label text-md-right">Diskon</label>

                                        <div class="col-md-4">
                                            <input id="menu" type="text" class="form-control" name="diskon_acc_id" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="menu" class="col-md-2 col-form-label text-md-right">DP</label>

                                        <div class="col-md-4">
                                            <input id="menu" type="text" class="form-control" name="dp_acc_id" >

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="hidden" name="_method" value="post">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                            <input type="submit" class="btn btn-primary" value="Simpan">
                                        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
  <!-- /.content-wrapper -->
@include('layouts.footer')
<script>
  $( function() {
    $("#datepicker1").datepicker({ format: 'yyyy-mm-dd' });
  } );
  </script>