<div>
    @if(session('success'))
        <span class="w-100 py-3 bg-green-300 rounded">{{ session('success') }}</span>
    @endif

    <form class="p-5" wire:submit.prevent="createNewCustomer" action="">             
                    <sheet>
                        
                    <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="70%"/>
                                <col width="9%"/>
                                <col width="1%"/>
                                <col width="20%"/>
                            </colgroup>
                            <tbody>
                                <tr height="10"/>
                                <tr height="20">
                                    <td class="transparent-border bold text-center" style="color:black; font-size: 18px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif ">
                                        FORMULIR APLIKASI KONTRAK BERLANGGANAN (FAB)
                                    </td>
                                    <td style="color:black;  font-size: 14px;">Tanggal</td>
                                    <td style="font-size: 14px;">:</td>
                                    <td style="color:black;  font-size: 14px;">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="date_order" type="datetime-local" placeholder="Tanggal" style="width:100%">
                                    </td>
                                </tr>
                                <tr height="20">
                                    <td class="transparent-border bold text-center" style="color:black;  font-size: 18px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                                        LAYANAN TELEKOMUNIKASI CIRCLEONE
                                    </td>
                                    <td style="color:black; font-size: 14px;">No. FAB</td>
                                    <td style="color:black; font-size: 14px;">:</td>
                                    <td style="font-size: 14px;">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="name" type="name" placeholder="No. FAB" style="width:100%">
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- DATA CALON PELANGGAN -->

                        <table width="100%" class="transparent-border">
                            <tbody>
                                <tr height="10"/>
                                <tr height="30">
                                    <td class="transparent-border bold bg-black text-center text-white" style="font-size: 14px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                                        <b>DATA CALON PELANGGAN<field name="group_order" readonly="1" force_save="1"/></b>
                                    </td>
                                </tr>
                                <tr height="3"/>
                            </tbody>
                        </table>
                        
                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="75%"/>
                                <col width="25%"/>
                            </colgroup>
                            <tbody>
                                <tr height="20">
                                    <td class="transparent-border bold" style="background-color: #0099ff; color: white; padding-left:5px">
                                        Yang bertanda tangan di bawah ini * :
                                    </td>
                                    <td class="transparent-border italic" style="background-color: #ff3333; color:white; padding-left:10px">
                                        * wajib di isi (mandatory)
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Nama Lengkap -->

                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="16%"/>
                                <col width="1%"/>
                                <col width="71%"/>
                                <col width="12%"/>
                            </colgroup>
                            <tbody>
                                <tr height="7"/>
                                <tr height="16">
                                    <td class="transparent-border">Nama Lengkap <a href="" style="color: #ff3333;">*</a></td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border bottom-border-dotted">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="onbehalf_name" type="onbehalf_name" placeholder="Nama Lengkap" style="width:100%">
                                        @error('onbehalf_name')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td class="transparent-border">
                                        <table width="100%" class="transparent-border">
                                        <colgroup>
                                            <col width="10%"/>
                                            <col width="40%"/>
                                            <col width="10%"/>
                                            <col width="40%"/>
                                        </colgroup>
                                            <tbody>
                                                <tr height="16">
                                                <td class="transparent-border" style="vertical-align: middle;"><input type="radio" class="ms-2" id="pria" wire:model="onbehalf_gender" value="pria"></td>
                                                <td class="transparent-border" style="vertical-align: middle;"><span>Pria</span></td>
                                                <td class="transparent-border" style="vertical-align: middle;"><input type="radio" class="ms-2" id="pria" wire:model="onbehalf_gender" value="wanita"></td>
                                                <td class="transparent-border" style="vertical-align: middle;"><span>Wanita</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @error('onbehalf_gender')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="16%"/>
                                <col width="1%"/>
                                <col width="42%"/>
                                <col width="12%"/>
                                <col width="1%"/>
                                <col width="28%"/>
                            </colgroup>
                            <tbody>
                                <tr height="16">
                                    <td class="transparent-border">Identitas Diri <a href="" style="color: #ff3333;">*</a></td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <input type="radio" class="ms-2" id="pria" wire:model="onbehalf_identity" value="nik">
                                        NIK
                                        <input type="radio" class="ms-2" id="pria" wire:model="onbehalf_identity" value="sim">
                                        SIM
                                        <input type="radio" class="ms-2" id="pria" wire:model="onbehalf_identity" value="passport">
                                        Passport
                                        @error('onbehalf_identity')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td class="transparent-border">Nomor Identitas <a href="" style="color: #ff3333;">*</a></td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="onbehalf_identity_nmbr" type="onbehalf_identity_nmbr" placeholder="Nomor Identitas" style="width:100%">
                                        @error('onbehalf_identity_nmbr')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="16%"/>
                                <col width="1%"/>
                                <col width="42%"/>
                                <col width="12%"/>
                                <col width="1%"/>
                                <col width="28%"/>
                            </colgroup>
                            <tbody>
                                <tr height="16">
                                    <td class="transparent-border">Nomor Kontak (HP) <a href="" style="color: #ff3333;">*</a></td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="onbehalf_mobile" type="onbehalf_mobile" placeholder="Nomor Kontak (HP)" style="width:90%">
                                        @error('onbehalf_mobile')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td class="transparent-border">Email Address <a href="" style="color: #ff3333;">*</a></td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="onbehalf_email" type="onbehalf_email" placeholder="Email Address" style="width:100%">
                                        @error('onbehalf_email')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="16%"/>
                                <col width="1%"/>
                                <col width="83%"/>
                            </colgroup>
                            <tbody>
                                <tr height="16">
                                    <td class="transparent-border" style="vertical-align: top;">Alamat Sesuai NIK <a href="" style="color: #ff3333;">*</a></td>
                                    <td class="transparent-border" style="vertical-align: top;">:</td>
                                    <td colspan="2" class="transparent-border bottom-border-dotted">
                                        <textarea class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="nik_address_compelete" type="nik_address_compelete" placeholder="Alamat Sesuai NIK" style="width:100%" rows="4"></textarea>
                                        @error('nik_address_compelete')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="75%"/>
                                <col width="6%"/>
                                <col width="1%"/>
                                <col width="18%"/>
                            </colgroup>
                            <tbody>
                                <tr height="16">
                                    <td> </td>
                                    <td class="transparent-border">Kode Pos <a href="" style="color: #ff3333;">*</a></td>
                                    <td class="transparent-border">:</td>
                                    <td colspan="2" class="transparent-border bottom-border-dotted">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="nik_zip" type="nik_zip" placeholder="Kode Pos" style="width:100%">
                                        @error('nik_zip')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- ======================================================================================= -->
                        <!-- LOKASI PEMASANGAN -->
                        <!-- ======================================================================================= -->

                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="100%"/>
                            </colgroup>
                            <tbody>
                                <tr height="20">
                                    <td class="transparent-border bold" style="background-color: #0099ff; color: white; padding-left:5px">
                                        Lokasi Pemasangan :
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="16%"/>
                                <col width="1%"/>
                                <col width="83%"/>
                            </colgroup>
                            <tbody>
                                <tr height="5"/>
                                <tr height="16">
                                    <td class="transparent-border bold">Bertindak Atas Nama <a href="" style="color: #ff3333;">*</a></td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <input type="radio" class="ms-2" wire:model="onbehalf_reg" value="pribadi" id="onbehalf_reg_pribadi" name="onbehalf_reg" oninput="checkInputVisibility()">
                                        <span for="onbehalf_reg_pribadi">Pribadi</span>
                                        <input type="radio" class="ms-2" wire:model="onbehalf_reg" value="perusahaan" id="onbehalf_reg_perusahaan" name="onbehalf_reg" oninput="checkInputVisibility()">
                                        <span for="onbehalf_reg_perusahaan">Perusahaan</span>
                                        <input type="radio" class="ms-2" wire:model="onbehalf_reg" value="kuasa dari" id="onbehalf_reg_kuasa" name="onbehalf_reg" oninput="checkInputVisibility()">
                                        <span for="onbehalf_reg_kuasa">Kuasa Dari</span>
                                        @error('onbehalf_reg')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="16%"/>
                                <col width="1%"/>
                                <col width="71%"/>
                                <col width="12%"/>
                            </colgroup>
                            <tbody>
                                <tr height="16">
                                    <td class="transparent-border" style="vertical-align: middle;"><span class="custom-input" style="display: none" wire:ignore>Nama Pelanggan <a href="" style="color: #ff3333;">*</a><a href="" style="color: #ff3333;">*</a></span></td>
                                    <td class="transparent-border" style="vertical-align: middle;"><span class="custom-input" style="display: none" wire:ignore>:</span></td>
                                    <td class="transparent-border bottom-border-dotted">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2 custom-input" wire:model="partner_id" type="partner_id" placeholder="Nama Pelanggan" style="width:100%; display: none" wire:ignore>
                                        @error('partner_id')
                                            <span class="text-red-500 text-xs custom-input">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td class="transparent-border">
                                        
                                    <table width="100%" class="transparent-border">
                                            <colgroup>
                                                <col width="10%"/>
                                                <col width="40%"/>
                                                <col width="10%"/>
                                                <col width="40%"/>
                                            </colgroup>
                                                <tbody>
                                                    <tr height="16">
                                                    <td class="transparent-border" style="vertical-align: middle;"><input type="radio" class="ms-2 custom-input" id="pria" wire:model="partner_gender" value="pria" style="display: none" wire:ignore></td>
                                                    <td class="transparent-border" style="vertical-align: middle;"><span class="custom-input" style="display: none" wire:ignore>Pria</span></td>
                                                    <td class="transparent-border" style="vertical-align: middle;"><input type="radio" class="ms-2 custom-input" id="pria" wire:model="partner_gender" value="wanita" style="display: none" wire:ignore></td>
                                                    <td class="transparent-border" style="vertical-align: middle;"><span class="custom-input" style="display: none" wire:ignore>Wanita</span></td>
                                                    </tr>
                                                </tbody>
                                    </table>
                                    @error('partner_gender')
                                        <span class="text-red-500 text-xs custom-input">{{ $message }}</span>
                                    @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="16%"/>
                                <col width="1%"/>
                                <col width="22%"/>
                                <col width="20%"/>
                                <col width="12%"/>
                                <col width="1%"/>
                                <col width="28%"/>
                            </colgroup>
                            <tbody>
                                <tr height="16">
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>No. NIK/SIM/NIB <a href="" style="color: #ff3333;">*</a></span></td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>:</span></td>
                                    <td class="transparent-border">
                                    <table width="100%" class="transparent-border">
                                        <colgroup>
                                            <col width="5%"/>
                                            <col width="20%"/>
                                            <col width="5%"/>
                                            <col width="20%"/>
                                            <col width="5%"/>
                                            <col width="20%"/>
                                            <col width="5%"/>
                                            <col width="20%"/>
                                        </colgroup>
                                            <tbody>
                                                <tr height="16">
                                                <td class="transparent-border" style="vertical-align: middle;"><input type="radio" class="ms-2 custom-input" id="pria" wire:model="partner_identity" value="nik" style="display: none" wire:ignore></td>
                                                <td class="transparent-border" style="vertical-align: middle;"><span class="custom-input" style="display: none" wire:ignore>NIK</span></td>
                                                <td class="transparent-border" style="vertical-align: middle;"><input type="radio" class="ms-2 custom-input" id="pria" wire:model="partner_identity" value="sim" style="display: none" wire:ignore></td>
                                                <td class="transparent-border" style="vertical-align: middle;"><span class="custom-input" style="display: none" wire:ignore>SIM</span></td>
                                                <td class="transparent-border" style="vertical-align: middle;"><input type="radio" class="ms-2 custom-input" id="pria" wire:model="partner_identity" value="passport" style="display: none" wire:ignore></td>
                                                <td class="transparent-border" style="vertical-align: middle;"><span class="custom-input" style="display: none" wire:ignore>Passport</span></td>
                                                <td class="transparent-border" style="vertical-align: middle;"><input type="radio" class="ms-2 custom-input" id="pria" wire:model="partner_identity" value="lainnya" style="display: none" wire:ignore></td>
                                                <td class="transparent-border" style="vertical-align: middle;"><span class="custom-input" style="display: none" wire:ignore>Lainnya</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @error('partner_identity')
                                            <span class="text-red-500 text-xs custom-input">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td class="transparent-border">
                                        <field name="partner_identity_nmbr" style="width:96%" attrs="{'required':[('partner_identity','=',True)]}"/>
                                    </td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>Tanggal Lahir <a href="" style="color: #ff3333;">*</a></span></td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>:</span></td>
                                    <td class="transparent-border">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2 custom-input" wire:model="partner_bdate" type="datetime-local" placeholder="Tanggal Lahir" style="width:100%; display: none" wire:ignore>
                                        @error('partner_bdate')
                                            <span class="text-red-500 text-xs custom-input">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="16%"/>
                                <col width="1%"/>
                                <col width="42%"/>
                                <col width="12%"/>
                                <col width="1%"/>
                                <col width="28%"/>
                            </colgroup>
                            <tbody>
                                <tr height="16">
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>No. NPWP</span></td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>:</span></td>
                                    <td class="transparent-border">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2 custom-input" wire:model="partner_npwp" type="partner_npwp" placeholder="No. NPWP" style="width:90%; display: none" wire:ignore>
                                    </td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>Jenis Usaha <a href="" style="color: #ff3333;">*</a></span></td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>:</span></td>
                                    <td class="transparent-border">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2 custom-input" wire:model="business_type" type="business_type" placeholder="Jenis Usaha" style="width:100%; display: none" wire:ignore>
                                        @error('business_type')
                                            <span class="text-red-500 text-xs custom-input">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="16%"/>
                                <col width="1%"/>
                                <col width="83%"/>
                            </colgroup>
                            <tbody>
                                <tr height="16">
                                    <td class="transparent-border" style="background-color: #0099ff; color: white; padding-left:5px; vertical-align: top;">
                                        Alamat Pemasangan *
                                    </td>
                                    <td class="transparent-border" style="vertical-align: top;">:</td>
                                    <td class="transparent-border bottom-border-dotted">
                                        <textarea class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="partner_shipping_id" type="partner_shipping_id" placeholder="Alamat Pelanggan" style="width:100%" rows="4"></textarea>
                                        @error('partner_shipping_id')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Nomor Kontak (HP) -->

                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="16%"/>
                                <col width="1%"/>
                                <col width="42%"/>
                                <col width="12%"/>
                                <col width="1%"/>
                                <col width="28%"/>
                            </colgroup>
                            <tbody>
                                <tr height="16">
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>No. Kontak (HP) <a href="" style="color: #ff3333;">*</a></span></td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>:</span></td>
                                    <td class="transparent-border">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2 custom-input" wire:model="mobile" type="mobile" placeholder="No Kontak (HP)" style="width:90%; display: none" wire:ignore>
                                        @error('mobile')
                                            <span class="text-red-500 text-xs custom-input">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>Alternatif No. Kontak</span></td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>:</span></td>
                                    <td class="transparent-border">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2 custom-input" wire:model="mobile2" type="mobile2" placeholder="Alternatif No. Kontak" style="width:100%; display: none" wire:ignore>
                                    </td>
                                </tr>
                                <tr height="16">
                                    <td class="transparent-border">Status Pemasangan di Alamat <a href="" style="color: #ff3333;">*</a></td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <input type="radio" class="ms-2" id="pria" wire:model="site_status" value="pemilik">
                                        Pemilik
                                        <input type="radio" class="ms-2" id="pria" wire:model="site_status" value="penyewa">
                                        Penyewa
                                        <input type="radio" class="ms-2" id="pria" wire:model="site_status" value="lainnya">
                                        Lainnya
                                        @error('site_status')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td class="transparent-border" colspan="3">
                                    </td>
                                </tr>
                                <tr height="16">
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>Email</span></td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>:</span></td>
                                    <td class="transparent-border">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2 custom-input" wire:model="email" type="email" placeholder="Email" style="width:90%; display: none">
                                        @error('email')
                                            <span class="text-red-500 text-xs custom-input">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>Alternatif Email</span></td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>:</span></td>
                                    <td class="transparent-border">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2 custom-input" wire:model="email2" type="email2" placeholder="Alternatif Email" style="width:100%; display: none">
                                        @error('email2')
                                            <span class="text-red-500 text-xs custom-input">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr height="16">
                                    <td class="transparent-border">Korespondensi <a href="" style="color: #ff3333;">*</a></td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <input type="radio" class="ms-2" id="pria" wire:model="correspondent" value="email">
                                        Email
                                        <input type="radio" class="ms-2" id="pria" wire:model="correspondent" value="telpon/whatsapp">
                                        Telpon/Whatsapp
                                        <input type="radio" class="ms-2" id="pria" wire:model="correspondent" value="lainnya">
                                        Lainnya
                                        @error('correspondent')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td class="transparent-border" colspan="3">
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- ======================================================================================= -->
                        <!-- LAYANAN PELANGGAN -->
                        <!-- ======================================================================================= -->

                        <table width="100%" class="transparent-border">
                            <tbody>
                                <tr height="3"/>
                                <tr height="30">
                                    <td class="transparent-border bold bg-black text-center text-white" style="font-size: 14px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                                        <b>LAYANAN PELANGGAN</b>
                                    </td>
                                </tr>
                                <tr height="3"/>
                            </tbody>
                        </table>

                        <!-- Jenis Pemohon -->

                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="16%"/>
                                <col width="1%"/>
                                <col width="42%"/>
                                <col width="12%"/>
                                <col width="1%"/>
                                <col width="28%"/>
                            </colgroup>
                            <tbody>
                                <tr height="16">
                                    <td class="transparent-border">Jenis Pemohon <a href="" style="color: #ff3333;">*</a></td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <select wire:model="group_order" class="block rounded border border-gray-100 px-3 py-1 mt-2" style="width:90%">
                                            <option value="">Jenis Pemohon</option>
                                            <option value="retail">Retail</option>
                                            <option value="corporate">Corporate</option>
                                            <option value="others">Others</option>
                                        </select>
                                        @error('group_order')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td class="transparent-border" colspan="3">
                                    </td>
                                </tr>
                                <tr height="16">
                                    <td class="transparent-border">Pilihan Layanan <a href="" style="color: #ff3333;">*</a></td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <input type="radio" class="ms-2" id="pria" wire:model="bandwidth_type" value="broadband">
                                        Broadband
                                        <input type="radio" class="ms-2" id="pria" wire:model="bandwidth_type" value="dedicated">
                                        Dedicated
                                        <input type="radio" class="ms-2" id="pria" wire:model="bandwidth_type" value="others">
                                        Others
                                        @error('bandwidth_type')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td class="transparent-border" colspan="3">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="16%"/>
                                <col width="1%"/>
                                <col width="42%"/>
                                <col width="12%"/>
                                <col width="1%"/>
                                <col width="28%"/>
                            </colgroup>
                            <tbody>
                                <tr height="16">
                                    <td class="transparent-border">Kontak Person Teknis</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="technnician_name" type="technnician_name" placeholder="Kontak Person Teknis" style="width:90%">
                                    </td>
                                    <td class="transparent-border">No. Telp</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="technnician_mobile" type="technnician_mobile" placeholder="No. Telp" style="width:90%">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" class="transparent-border">
                            <tbody>
                                <tr height="3"/>
                                <tr height="20">
                                    <td style="background-color: #0099ff; color: white; padding-left:5px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                                        Informasi Layanan Tambahan :
                                    </td>
                                </tr>
                                <tr height="3"/>
                            </tbody>
                        </table>

                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="16%"/>
                                <col width="1%"/>
                                <col width="83%"/>
                            </colgroup>
                            <tbody>
                                <tr height="5"/>
                                <tr height="16">
                                    <td class="transparent-border bold"></td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr height="5"/>
                                <tr height="16">
                                    <td class="transparent-border bold"><b>Layanan Internet</b></td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr height="5"/>
                                <tr height="16">
                                    <td class="transparent-border bold">Paket Internet <a href="" style="color: #ff3333;">*</a></td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <select wire:model="bandwidth_amount" class="block rounded border border-gray-100 px-3 py-1 mt-2" style="width:90%">
                                            <option value="">Paket Internet</option>
                                            <option value="10 Mbps">10 Mbps</option>
                                            <option value="20 Mbps">20 Mbps</option>
                                            <option value="30 Mbps">30 Mbps</option>
                                            <option value="50 Mbps">50 Mbps</option>
                                            <option value="75 Mbps">75 Mbps</option>
                                            <option value="80 Mbps">80 Mbps</option>
                                            <option value="100 Mbps">100 Mbps</option>
                                            <option value="300 Mbps">300 Mbps</option>
                                            <option value="500 Mbps">500 Mbps</option>
                                        </select>
                                        @error('bandwidth_amount')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr height="5"/>
                                <tr height="16">
                                    <td class="transparent-border bold"></td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr height="5"/>
                                <tr height="16">
                                    <td class="transparent-border bold"><b>Layanan TV</b></td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr height="5"/>
                                <tr height="16">
                                    <td class="transparent-border bold">Jenis Layanan TV</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <select wire:model="television_service_type" class="block rounded border border-gray-100 px-3 py-1 mt-2" style="width:90%">
                                            <option value="">Jenis Layanan TV</option>
                                            <option value="Dens TV">Dens TV</option>
                                            <option value="Funtime">Funtime</option>
                                            <option value="Metime">Metime</option>
                                            <option value="Family">Family</option>
                                            <option value="Family Max">Family Max</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr height="5"/>
                                <tr height="16">
                                    <td class="transparent-border bold">Jumlah Layanan TV</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <select wire:model="television_service_amount" class="block rounded border border-gray-100 px-3 py-1 mt-2" style="width:90%">
                                            <option value="">Jumlah Layanan TV</option>
                                            <option value="1 STB">1 STB</option>
                                            <option value="2 STB">2 STB</option>
                                            <option value="3 STB">3 STB</option>
                                            <option value="4 STB">4 STB</option>
                                            <option value="5 STB">5 STB</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr height="5"/>
                                <tr height="16">
                                    <td class="transparent-border bold"></td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr height="5"/>
                                <tr height="16">
                                    <td class="transparent-border bold"><b>Layanan Telephone</b></td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr height="5"/>
                                <tr height="16">
                                    <td class="transparent-border bold">Jumlah Layanan Telephone</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <select wire:model="telephone_service_amount" class="block rounded border border-gray-100 px-3 py-1 mt-2" style="width:90%">\
                                            <option value="">Jumlah Layanan Telephone</option>
                                            <option value="1 nomor telephone">1 nomor telephone</option>
                                            <option value="2 nomor telephone">2 nomor telephone</option>
                                            <option value="3 nomor telephone">3 nomor telephone</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr height="5"/>
                                <tr height="16">
                                    <td class="transparent-border bold"></td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr height="5"/>
                                <tr height="16">
                                    <td class="transparent-border bold">Catatan</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <textarea class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="note" type="note" placeholder="Catatan" style="width:90%" rows="4"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr height="5"/>
                                <tr height="16">
                                    <td class="transparent-border bold"></td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- PEMBAYARAN -->

                        <table width="100%" class="transparent-border">
                            <tbody>
                                <tr height="3"/>
                                <tr height="30">
                                    <td class="transparent-border bold bg-black text-center text-white" style="font-size: 14px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                                        <b>PEMBAYARAN</b>
                                    </td>
                                </tr>
                                <tr height="3"/>
                            </tbody>
                        </table>
                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="16%"/>
                                <col width="1%"/>
                                <col width="42%"/>
                                <col width="12%"/>
                                <col width="1%"/>
                                <col width="28%"/>
                            </colgroup>
                            <tbody>
                                <tr height="7"/>
                                <tr height="16">
                                    <td class="transparent-border" style="color:black;">Tagihan Atas Nama <a href="" style="color: #ff3333;">*</a></td>
                                    <td class="transparent-border" style="color:black;">:</td>
                                    <td class="transparent-border">
                                        <input type="radio" class="ms-2 "  wire:model="onbehalf_invoice" value="pribadi">
                                        Pribadi
                                        <input type="radio" class="ms-2 " wire:model="onbehalf_invoice" value="perusahaan">
                                        Perusahaan
                                        <input type="radio" class="ms-2 " wire:model="onbehalf_invoice" value="lainnya">
                                        Lainnya
                                        @error('onbehalf_invoice')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="16%"/>
                                <col width="1%"/>
                                <col width="42%"/>

                                <col width="12%"/>
                                <col width="1%"/>
                                <col width="28%"/>
                            </colgroup>
                            <tbody>
                                <tr height="16">
                                    <td class="transparent-border" style="color:black;">Kontak Person Keuangan</td>
                                    <td class="transparent-border" style="color:black;">:</td>
                                    <td class="transparent-border">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="pic_invoice_name" type="pic_invoice_name" placeholder="Kontak Person Keuangan" style="width:90%">
                                    </td>
                                    <td class="transparent-border" style="color:black;">No. Telp.</td>
                                    <td class="transparent-border" style="color:black;">:</td>
                                    <td class="transparent-border">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="pic_invoice_phone" type="pic_invoice_phone" placeholder="No. Telp." style="width:100%">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="16%"/>
                                <col width="1%"/>
                                <col width="83%"/>
                            </colgroup>
                            <tbody>
                                <tr height="16">
                                    <td class="transparent-border" style="vertical-align: top; color:black;">Alamat Penagihan <a href="" style="color: #ff3333;">*</a></td>
                                    <td class="transparent-border" style="vertical-align: top; color:black;">:</td>
                                    <td class="transparent-border">
                                        <textarea class="block rounded border border-gray-100 px-3 py-1 mt-2" style="width:100%" wire:model="partner_invoice_id" type="partner_invoice_id" placeholder="Alamat Penagihan" rows="4"></textarea>
                                        @error('partner_invoice_id')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Kode Pos Alamat Penagihan -->

                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="75%"/>
                                <col width="6%"/>
                                <col width="1%"/>
                                <col width="18%"/>
                            </colgroup>
                            <tbody>
                                <tr height="16">
                                    <td> </td>
                                    <td class="transparent-border" style="color:black;">Kode Pos <a href="" style="color: #ff3333;">*</a></td>
                                    <td class="transparent-border" style="color:black;">:</td>
                                    <td colspan="2" class="transparent-border bottom-border-dotted">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="zip" type="zip" placeholder="Kode Pos" style="width:100%">
                                        @error('zip')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="16%"/>
                                <col width="1%"/>
                                <col width="42%"/>
                                <col width="12%"/>
                                <col width="1%"/>
                                <col width="28%"/>
                            </colgroup>
                            <tbody>
                                <tr height="16">
                                    <td class="transparent-border" style="color:black;">Email Penagihan <a href="" style="color: #ff3333;">*</a></td>
                                    <td class="transparent-border" style="color:black;">:</td>
                                    <td class="transparent-border">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="pic_invoice_email" type="pic_invoice_email" placeholder="Email Penagihan" style="width:90%">
                                        @error('pic_invoice_email')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td class="transparent-border" style="color:black;">Nama Bank</td>
                                    <td class="transparent-border" style="color:black;">:</td>
                                    <td class="transparent-border">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="pic_invoice_bankname" type="pic_invoice_bankname" placeholder="Nama Bank"style="width:100%">
                                    </td>
                                </tr>
                                <tr height="16">
                                    <td class="transparent-border" style="color:black;">Pembayaran Non Kartu Kredit</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <input type="radio" class="ms-2 "  wire:model="payment_type" value="transfer">
                                        Transfer
                                        <input type="radio" class="ms-2 " wire:model="payment_type" value="auto debet">
                                        Auto Debet
                                        <input type="radio" class="ms-2 " wire:model="payment_type" value="merchant">
                                        Merchant
                                    </td>
                                    <td class="transparent-border" style="color:black;">No. Rekening</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="pic_invoice_banknmbr" type="pic_invoice_banknmbr" placeholder="No. Rekening" style="width:100%">
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- CATATAN/NOTE -->

                        <table width="100%">
                                <tr height="5"/>
                                <tr>
                                    <td style="border: 1px solid black; padding : 10px;">
                                        <strong>CATATAN/NOTE :</strong> Dengan menandatangani halaman formulir ini, maka Pelanggan
                                        menyatakan bahwa semua informasi yang di isi adalah benar, serta menyetujui, menerima dan
                                        bersedia untuk terikat pada seluruh SYARAT DAN KETENTUAN BERLANGGANAN yang telah ditetapkan
                                        Circle one berikut dengan lampiran-lampirannya yang merupakan satu kesatuan yang tak terpisahkan
                                        dari formulir berlangganan ini. Pelanggan menyatakan bersedia untuk taat mengikuti ketentuan
                                        minimum berlangganan layanan telekomunikasi Circle one. Apabila Pelanggan melanggar ketentuan
                                        tersebut, maka Pelanggan menyatakan bersedia membayar biaya penalti sesuai ketentuan Circle one.
                                    </td>
                                </tr>
                        </table>

                        <table width="100%">
                            <colgroup>
                                <col width="20"/>
                                <col width="6%"/>
                                <col width="37%"/>
                                <col width="37%"/>
                            </colgroup>
                            <tbody>
                                <tr height="15">
                                    <td class="transparent-border bold bg-black text-center px-2" style="border: 0.5px solid black; font-size:11px; color:white;">
                                        <b>Checklist diisi oleh pihak Circle One</b>
                                    </td>
                                    <td class="transparent-border bold bg-black text-center" style="border: 0.5px solid black; text-align: center; font-size:11px;  color:white;">
                                        <b>Cek</b>
                                    </td>
                                    <td rowspan="8" style="border: 0.5px solid black; text-align:center; vertical-align:bottom;">Nama dan tanda tangan petugas Circleone</td>
                                    <td rowspan="8" style="border: 0.5px solid black; text-align:center; vertical-align:bottom;">Nama dan tanda tangan atau kuasa Pelanggan</td>
                                </tr>
                                <tr height="15">
                                    <td class="px-2" style="border: 0.5px solid black; font-size:11px;">- Surat Kuasa</td>
                                    <td style="border: 0.5px solid black; text-align: center; font-size:11px;">
                                        <input wire:model="surat_kuasa_flag" type="checkbox">
                                    </td>
                                </tr>
                                <tr height="15">
                                    <td class="px-2" style="border: 0.5px solid black; font-size:11px;">- Fotocopy NIK/SIM/Pasport <a href="" style="color: #ff3333;">*</a></td>
                                    <td style="border: 0.5px solid black; text-align: center; font-size:11px;">
                                        <input wire:model="identity_flag" type="checkbox">
                                        @error('identity_flag')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr height="15">
                                    <td class="px-2" style="border: 0.5px solid black; font-size:11px;">- Fotocopy NPWP</td>
                                    <td style="border: 0.5px solid black; text-align: center; font-size:11px;">
                                        <input wire:model="npwp_flag" type="checkbox">
                                    </td>
                                </tr>
                                <tr height="15">
                                    <td class="px-2" style="border: 0.5px solid black; font-size:11px;">- Fotocopy NIB</td>
                                    <td style="border: 0.5px solid black; text-align: center; font-size:11px;">
                                        <input wire:model="nib_flag" type="checkbox">
                                    </td>
                                </tr>
                                <tr height="15">
                                    <td class="px-2" style="border: 0.5px solid black; font-size:11px;">- Fotocopy Akta Perusahaan</td>
                                    <td style="border: 0.5px solid black; text-align: center; font-size:11px;">
                                        <input wire:model="akta_flag" type="checkbox">
                                    </td>
                                </tr>
                                <tr height="15">
                                    <td class="px-2" style="border: 0.5px solid black; font-size:11px;">- Berita Acara Kerjasama (NDA/MOU)</td>
                                    <td style="border: 0.5px solid black; text-align: center; font-size:11px;">
                                        <input wire:model="bak_flag" type="checkbox">
                                    </td>
                                </tr>
                                <tr height="15">
                                    <td class="px-2" style="border: 0.5px solid black; font-size:11px;">- Lainnya</td>
                                    <td style="border: 0.5px solid black; text-align: center; font-size:11px;">
                                        <input wire:model="other_doc_flag" type="checkbox">
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table width="100%" class="transparent-border">
                            <colgroup>
                                <col width="15%"/>
                                <col width="15%"/>
                                <col width="15%"/>
                                <col width="15%"/>
                                <col width="10%"/>
                                <col width="15%"/>
                            </colgroup>
                            <tbody>
                                <tr height="10">
                                    <td class="transparent-border italic text-center" style="font-size: 8px;">
                                        <a href="" style="color: #ff3333;">*</a> lembar putih = Finance
                                    </td>
                                    <td class="transparent-border italic text-center" style="font-size: 8px;">
                                        lembar merah = Cust.Relation
                                    </td>
                                    <td class="transparent-border italic text-center" style="font-size: 8px;">
                                        lembar merah = Dispatcher
                                    </td>
                                    <td class="transparent-border italic text-center" style="font-size: 8px;">
                                        lembar merah = Pelanggan
                                    </td>
                                    <td class="transparent-border italic text-center" style="font-size: 8px;"/>
                                    <td class="transparent-border italic text-center" style="font-size: 8px;">
                                        FAB01.C1/X/2023
                                    </td>
                                </tr>
                                <tr height="5"/>
                            </tbody>
                        </table>

                        <group string="Attachement Files" col="4">
                                <table width="100%" class="transparent-border">
                                    <colgroup>
                                        <col width="14%"/>
                                        <col width="14%"/>
                                        <col width="14%"/>
                                        <col width="14%"/>
                                        <col width="14%"/>
                                        <col width="15%"/>
                                        <col width="15%"/>
                                    </colgroup>
                                    <tbody>
                                        <tr height="15">
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px;">
                                                Surat Kuasa
                                            </td>
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px;">
                                                FC NIK/SIM/Pasport <a href="" style="color: #ff3333;">*</a>
                                            </td>
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px;">
                                                FC NPWP
                                            </td>
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px;">
                                                FC NIB
                                            </td>
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px;">
                                                FC Akta Perusahaan
                                            </td>
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px;">
                                                Berita Acara Kerjasama
                                            </td>
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px;">
                                                Lainnya
                                            </td>
                                        </tr>
                                        <tr height="10">
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px; padding:5px">
                                                <input wire:model="surat_kuasa_file" type="file">
                                                @if($surat_kuasa_file)
                                                    <img class="rounded w-30 block" src="{{ $surat_kuasa_file->temporaryUrl() }}" alt="">
                                                @endif
                                            </td>
                                            <input type="text">
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px; padding:5px">
                                                <input wire:model="identity_file" type="file">
                                                @error('identity_file')
                                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                                @enderror
                                                @if($identity_file)
                                                    <img class="rounded w-30 block" src="{{ $identity_file->temporaryUrl() }}" alt="">
                                                @endif
                                            </td>
                                            <input type="text">
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px; padding:5px">
                                                <input wire:model="npwp_file" type="file">
                                                @if($npwp_file)
                                                    <img class="rounded w-30 block" src="{{ $npwp_file->temporaryUrl() }}" alt="">
                                                @endif
                                            </td>
                                            <input type="text">
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px; padding:5px">
                                                <input wire:model="nib_file" type="file">
                                                @if($nib_file)
                                                    <img class="rounded w-30 block" src="{{ $nib_file->temporaryUrl() }}" alt="">
                                                @endif
                                            </td>
                                            <input type="text">
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px; padding:5px">
                                                <input wire:model="akta_file" type="file">
                                                @if($akta_file)
                                                    <img class="rounded w-30 block" src="{{ $akta_file->temporaryUrl() }}" alt="">
                                                @endif
                                            </td>
                                            <input type="text">
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px; padding:5px">
                                                <input wire:model="bak_file" type="file">
                                                @if($bak_file)
                                                    <img class="rounded w-30 block" src="{{ $bak_file->temporaryUrl() }}" alt="">
                                                @endif
                                            </td>
                                            <input type="text">
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px; padding:5px">
                                                <input wire:model="other_doc_file" type="file">
                                                @if($other_doc_file)
                                                    <img class="rounded w-30 block" src="{{ $other_doc_file->temporaryUrl() }}" alt="">
                                                @endif
                                            </td>
                                            <input type="text">
                                        </tr>
                                        <tr height="5"/>
                                    </tbody>
                                </table>
                        </group>
                    </sheet>        

                <table width="100%" class="transparent-border mt-5 mb-5">
                         <colgroup>
                            <col width="2%"/>
                            <col width="98%"/>
                        </colgroup>
                        <tbody>
                            <tr height="16">
                                <td class="transparent-border"><input wire:model="terms_and_condition_flag" type="checkbox"></td>
                                <td class="transparent-border">
                                    <p><a href="" style="color: #ff3333;">*</a>  I agree to be bound by <a href="https://github.com/Magioti/Circleone_Online_Registration" style="color: #0099ff;">the Circleone terms of use and privacy policy</a>.</p>
                                    @error('terms_and_condition_flag')
                                        <span class="text-red-500 text-xs">{{ $message }}</span>
                                    @enderror
                                </td>
                             </tr>
                        </tbody>
                </table>
                
                <button class="block rounded px-3 py-1 mt-2 bg-blue-400 text-white">Create</button>
    </form>

    <!-- JavaScript -->
    <script>
        function checkInputVisibility() {
            // Mengambil nilai dari onbehalf_reg
            var valueOnbehalfReg = document.querySelector('input[name="onbehalf_reg"]:checked').value;

            // Menentukan elemen yang ingin diatur visibilitasnya
            var elementsToHide = document.querySelectorAll('.custom-label, .custom-input');

            // Mengatur visibilitas elemen berdasarkan kondisi nilai onbehalf_reg
            elementsToHide.forEach(function (element) {
                // Menampilkan atau menyembunyikan elemen berdasarkan kondisi nilai onbehalf_reg
                element.style.display = (valueOnbehalfReg === 'pribadi' ? 'none' : 'block');
            });
        }
    </script>
    
</div>
