                                <div class="row">
                                    <input type="hidden" name="id" value="{{$id}}">
                                    
                                    
                                    <div class="col-xl-12 ">
                                        
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-4 text-lg-right col-form-label">Kode Obat <span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-xl-4">
                                                <input type="text" readonly name="kode_obat" value="{{$kode_obat}}" placeholder="Ketik...." class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-4 text-lg-right col-form-label">Nama Obat <span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-xl-8">
                                                <input type="text"  value="{{$nama_obat}}" placeholder="Ketik...." class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-4 text-lg-right col-form-label">Harga Satuan & Stok<span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-xl-3">
                                                <input type="text" name="harga" id="harga_obat" readonly value="{{$harga}}" placeholder="Ketik...." class="form-control typeuang">
                                            </div>
                                            <div class="col-lg-8 col-xl-2">
                                                <input type="text" name="stok" id="stok" readonly value="{{$stok}}" placeholder="Ketik...." class="form-control typeuang">
                                            </div>
                                            <div class="col-lg-8 col-xl-3">
                                                <input type="text"  readonly value="{{$satuan}}" placeholder="Ketik...." class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-4 text-lg-right col-form-label">Qty & Potongan<span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-xl-2">
                                                <input type="text" name="qty" onkeyup="tentukan_nilai(this.value)" id="qty" value="{{$qty}}" placeholder="Ketik...." class="form-control typeuang">
                                            </div>
                                            <div class="col-lg-8 col-xl-3">
                                                <input type="text" name="potongan" id="potongan"  onkeyup="tentukan_potongan(this.value)" id="potongan" value="0" placeholder="Ketik...." class="form-control typeuang">
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-4 text-lg-right col-form-label">Total <span class="text-danger">*</span></label>
                                            <div class="col-lg-8 col-xl-3">
                                                <input type="text" name="total" id="total" readonly value="" placeholder="Ketik...." class="form-control typeuang">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                            </div>
                            <script>
                                $(".typeuang").inputmask({ alias : "currency", prefix: '', 'autoGroup': true, 'digits': 0, 'digitsOptional': false });
                                function tentukan_nilai(qty){
                                    var harga=$('#harga_obat').val();
                                    var potongan=$('#potongan').val();
                                    var nil = harga.replace(/,/g, "");
                                    var pot = potongan.replace(/,/g, "");
                                    var qt = qty.replace(/,/g, "");
                                    if(nil=="" || nil==0){
                                        alert('Masukan harga');
                                        $('#qty').val(0);
                                    }else{
                                        var hasil=(qt*(nil-pot));
                                            $('#total').val(hasil);
                                    }

                                }
                                function tentukan_potongan(potongan){
                                    var harga=$('#harga_obat').val();
                                    var qty=$('#qty').val();
                                    var pot = potongan.replace(/,/g, "");
                                    var nil = harga.replace(/,/g, "");
                                    var qt = qty.replace(/,/g, "");
                                    if(pot>nil){
                                        alert('Maksimal potongan '+harga);
                                        $('#potongan').val(0);
                                        var hasil=(qt*(nil-0));
                                                $('#total').val(hasil);
                                    }else{
                                        if(nil=="" || nil==0){
                                            alert('Masukan harga');
                                            $('#qty').val(0);
                                        }else{
                                            var hasil=(qt*(nil-pot));
                                                $('#total').val(hasil);
                                        }
                                    }

                                }
                            </script>