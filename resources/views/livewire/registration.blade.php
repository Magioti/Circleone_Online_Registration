<div>
    @if(session('success'))
        <span class="w-100 py-3 bg-green-300 rounded">{{ session('success') }}</span>
    @endif

    <form class="p-5" wire:submit.prevent="createNewCustomer" action="">
    <t t-set="o" t-value="o.with_context({'lang':user.partner_id.lang})"/>
                    <t t-if="o and 'company_id' in o">
                        <t t-set="company" t-value="o.company_id"/>
                    </t>
                    <t t-if="not o or not 'company_id' in o">
                        <t t-set="company" t-value="res_company"/>
                    </t>
                        <header>
                            <button name="action_fab_submit_to_mngr" string="Submit to Sales Spv/Manager" type="object" states="draft" class="btn-info" groups="base_artsys.group_c1_sales_staff,base_artsys.group_c1_sales_spv,base_artsys.group_c1_sales_mngr"/>
                            <button name="action_order_submitted" string="Approved by Sales" type="object" states="review" class="btn-success" groups="base_artsys.group_c1_sales_staff,base_artsys.group_c1_sales_spv,base_artsys.group_c1_sales_mngr"/>
                            <button name="action_confirm" id="action_confirm" data-hotkey="v" string="Validated by CR" class="btn-warning" type="object" states="sent" groups="base_artsys.group_c1_sales_admin,base_artsys.group_c1_sales_staff,base_artsys.group_c1_sales_spv,base_artsys.group_c1_sales_mngr"/>
                            <button name="action_draft" states="sent,cancel" type="object" string="Set to Draft" data-hotkey="w" class="btn-warning" groups="base_artsys.group_c1_sales_staff,base_artsys.group_c1_sales_spv,base_artsys.group_c1_sales_mngr"/>
                            <button name="action_cancel" type="object" string="Cancel" class="btn-danger" groups="base_artsys.group_c1_sales_spv,base_artsys.group_c1_sales_mngr" attrs="{'invisible': ['|', ('state', 'not in', ['draft', 'sent','sale']), ('id', '=', False)]}" data-hotkey="z"/>
                            <field name="state" widget="statusbar" statusbar_visible="draft,review,sent,sale"/>
                        </header>
                    <sheet>
                        <div class="oe_button_box" name="button_box">
                            <button name="preview_sale_order" type="object" class="oe_stat_button" icon="fa-globe icon">
                                <div class="o_field_widget o_stat_info">
                                    <!-- <span class="o_stat_text">Customer</span>
                                    <span class="o_stat_text">Preview</span> -->
                                </div>
                            </button>
                            <button name="action_view_invoice" type="object" class="oe_stat_button" icon="fa-pencil-square-o" attrs="{'invisible': [('invoice_count', '=', 0)]}">
                                <field name="invoice_count" widget="statinfo" string="Invoices"/>
                            </button>
                        </div>
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
                                        <!-- <field name="date_order" string="Tanggal FAB" style="width:100%;" attrs="{'readonly':[('state','in', ('approved','lock','cancel'))]}"/> -->
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
                                        <!-- <field name="name" string="No. FAB" required="1" style="width:100%;"/> -->
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
                                    <td class="transparent-border bold bg-black text-center" style="font-size: 14px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                                        <b>DATA CALON PELANGGAN : <field name="group_order" readonly="1" force_save="1"/></b>
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
                                        Yang bertanda tangan di bawah ini* :
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
                                    <td class="transparent-border">Nama Lengkap *</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border bottom-border-dotted">
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="onbehalf_name" type="onbehalf_name" placeholder="Nama Lengkap" style="width:100%">

                                        @error('onbehalf_name') <!-- Jika error akan menampilkan tampilan seperti ini  -->
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror

                                    </td>
                                    <td class="transparent-border">
                                        <!-- <field name="onbehalf_gender" widget="radio" options="{'horizontal': True}" required="1"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="onbehalf_gender" type="onbehalf_gender" placeholder="onbehalf_gender"> -->
                                        
                                        <!-- <input type="radio" class="ms-2" id="pria" wire:model="onbehalf_gender" value="pria">
                                        Pria
                                        <input type="radio" class="ms-2" id="pria" wire:model="onbehalf_gender" value="wanita">
                                        Wanita -->

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

                                        @error('onbehalf_gender') <!-- Jika error akan menampilkan tampilan seperti ini  -->
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
                                    <td class="transparent-border">Identitas Diri *</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <!-- <field name="onbehalf_identity" style="width:100%" widget="radio" options="{'horizontal': True}" required="1"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="onbehalf_identity" type="onbehalf_identity" placeholder="onbehalf_identity"> -->
                                        <input type="radio" class="ms-2" id="pria" wire:model="onbehalf_identity" value="nik">
                                        NIK
                                        <input type="radio" class="ms-2" id="pria" wire:model="onbehalf_identity" value="sim">
                                        SIM
                                        <input type="radio" class="ms-2" id="pria" wire:model="onbehalf_identity" value="passport">
                                        Passport

                                        @error('onbehalf_identity') <!-- Jika error akan menampilkan tampilan seperti ini  -->
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror

                                    </td>
                                    <td class="transparent-border">Nomor Identitas</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <!-- <field name="onbehalf_identity_nmbr" style="width:100%" attrs="{'required':[('onbehalf_identity','!=',False)]}"/> -->
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="onbehalf_identity_nmbr" type="onbehalf_identity_nmbr" placeholder="Nomor Identitas" style="width:100%">
                                        
                                        @error('onbehalf_identity_nmbr') <!-- Jika error akan menampilkan tampilan seperti ini  -->
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
                                    <td class="transparent-border">Nomor Kontak (HP)</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <!-- <field name="onbehalf_mobile" style="width:98%"/> -->
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="onbehalf_mobile" type="onbehalf_mobile" placeholder="Nomor Kontak (HP)" style="width:90%">

                                        @error('onbehalf_mobile') <!-- Jika error akan menampilkan tampilan seperti ini  -->
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror

                                    </td>
                                    <td class="transparent-border">Email Address</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <!-- <field name="onbehalf_email" style="width:100%"/> -->
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="onbehalf_email" type="onbehalf_email" placeholder="Email Address" style="width:100%">

                                        @error('onbehalf_email') <!-- Jika error akan menampilkan tampilan seperti ini  -->
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
                                    <td class="transparent-border" style="vertical-align: top;">Alamat Sesuai NIK</td>
                                    <td class="transparent-border" style="vertical-align: top;">:</td>
                                    <td colspan="2" class="transparent-border bottom-border-dotted">
                                        <!-- <field name="nik_address_complete" style="width:100%" widget="html" class="oe-bordered-editor"/> -->
                                        <textarea class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="nik_address_compelete" type="nik_address_compelete" placeholder="Alamat Sesuai NIK" style="width:100%" rows="4"></textarea>

                                        @error('nik_address_compelete') <!-- Jika error akan menampilkan tampilan seperti ini  -->
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
                                    <td class="transparent-border">Kode Pos</td>
                                    <td class="transparent-border">:</td>
                                    <td colspan="2" class="transparent-border bottom-border-dotted">
                                        <!-- <field name="nik_zip" style="width:100%"/> -->
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="nik_zip" type="nik_zip" placeholder="Kode Pos" style="width:100%">

                                        @error('nik_zip') <!-- Jika error akan menampilkan tampilan seperti ini  -->
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
                                        <b>Lokasi Pemasangan</b>
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
                                    <td class="transparent-border bold">Bertindak Atas Nama *</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <!-- <field name="onbehalf_reg" required="1" widget="radio" options="{'horizontal': True}"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="onbehalf_reg" type="onbehalf_reg" placeholder="onbehalf_reg" value="pribadi"> -->
                                        
                                        <!-- <input type="radio" class="ms-2" wire:model="onbehalf_reg" value="pribadi">
                                        Pribadi
                                        <input type="radio" class="ms-2" wire:model="onbehalf_reg" value="perusahaan">
                                        Perusahaan
                                        <input type="radio" class="ms-2" wire:model="onbehalf_reg" value="kuasa dari">
                                        Kuasa dari -->

                                        <input type="radio" class="ms-2" wire:model="onbehalf_reg" value="pribadi" id="onbehalf_reg_pribadi" name="onbehalf_reg" oninput="checkInputVisibility()">
                                        <span for="onbehalf_reg_pribadi">Pribadi</span>

                                        <input type="radio" class="ms-2" wire:model="onbehalf_reg" value="perusahaan" id="onbehalf_reg_perusahaan" name="onbehalf_reg" oninput="checkInputVisibility()">
                                        <span for="onbehalf_reg_perusahaan">Perusahaan</span>

                                        <input type="radio" class="ms-2" wire:model="onbehalf_reg" value="kuasa dari" id="onbehalf_reg_kuasa" name="onbehalf_reg" oninput="checkInputVisibility()">
                                        <span for="onbehalf_reg_kuasa">Kuasa Dari</span>

                                        @error('onbehalf_reg') <!-- Jika error akan menampilkan tampilan seperti ini  -->
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
                                    <td class="transparent-border" style="vertical-align: middle;"><span class="custom-input" style="display: none" wire:ignore>Nama Pelanggan **</span></td>
                                    <td class="transparent-border" style="vertical-align: middle;"><span class="custom-input" style="display: none" wire:ignore>:</span></td>
                                    <td class="transparent-border bottom-border-dotted">
                                        <!-- <field name="partner_id" style="width:98% !important;" context="{'default_type':'delivery',                                                          'show_address': 0,                                                          'form_view_ref':'sale_artsys.fab_customer_simple_fview',                                                          'default_company_type':'person',                                                          }" domain="[('type','=','delivery'),('contact_group','=', group_order)]" options="{&quot;always_reload&quot;: True}"/> -->
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2 custom-input" wire:model="partner_id" type="partner_id" placeholder="Nama Pelanggan" style="width:100%; display: none" wire:ignore>

                                        @error('partner_id') <!-- Jika error akan menampilkan tampilan seperti ini  -->
                                            <span class="text-red-500 text-xs custom-input">{{ $message }}</span>
                                        @enderror
                                        
                                    </td>
                                    <td class="transparent-border">
                                        <!-- <field name="partner_gender" widget="radio" options="{'horizontal': True}"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="partner_gender" type="partner_gender" placeholder="partner_gender"> -->
                                        
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

                                        <!-- <input type="radio" class="ms-2 custom-input" id="pria" wire:model="partner_gender" value="pria">
                                        <span class="custom-input">Pria</span>
                                        <input type="radio" class="ms-2 custom-input" id="pria" wire:model="partner_gender" value="wanita">
                                        <span class="custom-input">Wanita</span> -->

                                        @error('partner_gender') <!-- Jika error akan menampilkan tampilan seperti ini  -->
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
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>No. NIK/SIM/NIB *</span></td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>:</span></td>
                                    <td class="transparent-border">
                                        <!-- <field name="partner_identity" style="width:97%" required="1" widget="radio" options="{'horizontal': True}"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="partner_identity" type="partner_identity" placeholder="partner_identity"> -->
                                        
                                        <!-- <input type="radio" class="ms-2 custom-input" id="pria" wire:model="partner_identity" value="nik">
                                        <span class="custom-input">NIK</span>
                                        <input type="radio" class="ms-2 custom-input" id="pria" wire:model="partner_identity" value="sim">
                                        <span class="custom-input">SIM</span>
                                        <input type="radio" class="ms-2 custom-input" id="pria" wire:model="partner_identity" value="passport">
                                        <span class="custom-input">Passport</span>
                                        <input type="radio" class="ms-2 custom-input" id="pria" wire:model="partner_identity" value="lainnya">
                                        <span class="custom-input">Lainnya</span> -->

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

                                        @error('partner_identity') <!-- Jika error akan menampilkan tampilan seperti ini  -->
                                            <span class="text-red-500 text-xs custom-input">{{ $message }}</span>
                                        @enderror

                                    </td>
                                    <td class="transparent-border">
                                        <field name="partner_identity_nmbr" style="width:96%" attrs="{'required':[('partner_identity','=',True)]}"/>
                                    </td>

                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>Tanggal Lahir *</span></td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>:</span></td>
                                    <td class="transparent-border">
                                        <!-- <field name="partner_bdate" style="width:100%"/> -->
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2 custom-input" wire:model="partner_bdate" type="datetime-local" placeholder="Tanggal Lahir" style="width:100%; display: none" wire:ignore>

                                        @error('partner_bdate') <!-- Jika error akan menampilkan tampilan seperti ini  -->
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
                                        <!-- <field name="partner_npwp" style="width:98%"/> -->
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2 custom-input" wire:model="partner_npwp" type="partner_npwp" placeholder="No. NPWP" style="width:90%; display: none" wire:ignore>
                                    </td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>Jenis Usaha</span></td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>:</span></td>
                                    <td class="transparent-border">
                                        <!-- <field name="business_type" style="width:100%"/> -->
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2 custom-input" wire:model="business_type" type="business_type" placeholder="Jenis Usaha" style="width:100%; display: none" wire:ignore>

                                        @error('business_type') <!-- Jika error akan menampilkan tampilan seperti ini  -->
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
                                        Alamat Pemasangan
                                    </td>
                                    <td class="transparent-border" style="vertical-align: top;">:</td>
                                    <td class="transparent-border bottom-border-dotted">
                                        <!-- <field name="partner_shipping_id" style="width:98% !important;" context="{'default_type':'delivery',                                                          'show_address': 1,                                                          'form_view_ref':'sale_artsys.fab_customer_simple_fview',                                                          'default_company_type':'person',                                                          }" domain="[('type','=','delivery'),('contact_group','=',group_order)]" options="{&quot;always_reload&quot;: True}"/> -->
                                        <textarea class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="partner_shipping_id" type="partner_shipping_id" placeholder="Alamat Pelanggan" style="width:100%" rows="4"></textarea>

                                        @error('partner_shipping_id') <!-- Jika error akan menampilkan tampilan seperti ini  -->
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
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>No. Kontak (HP)</span></td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>:</span></td>
                                    <td class="transparent-border">
                                        <!-- <field name="mobile" style="width:98%" required="1"/> -->
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2 custom-input" wire:model="mobile" type="mobile" placeholder="No Kontak (HP)" style="width:90%; display: none" wire:ignore>

                                        @error('mobile') <!-- Jika error akan menampilkan tampilan seperti ini  -->
                                            <span class="text-red-500 text-xs custom-input">{{ $message }}</span>
                                        @enderror

                                    </td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>Alternatif No. Kontak</span></td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>:</span></td>
                                    <td class="transparent-border">
                                        <!-- <field name="mobile2" style="width:100%"/> -->
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2 custom-input" wire:model="mobile2" type="mobile2" placeholder="Alternatif No. Kontak" style="width:100%; display: none" wire:ignore>
                                    </td>
                                </tr>

                                <tr height="16">
                                    <td class="transparent-border">Status Pemasangan di Alamat</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <!-- <field name="site_status" style="width:98%" widget="radio" options="{'horizontal': True}" required="1"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="site_status" type="site_status" placeholder="site_status"> -->
                                        <input type="radio" class="ms-2" id="pria" wire:model="site_status" value="pemilik">
                                        Pemilik
                                        <input type="radio" class="ms-2" id="pria" wire:model="site_status" value="penyewa">
                                        Penyewa
                                        <input type="radio" class="ms-2" id="pria" wire:model="site_status" value="lainnya">
                                        Lainnya

                                        @error('site_status') <!-- Jika error akan menampilkan tampilan seperti ini  -->
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror

                                    </td>
                                    <td class="transparent-border" colspan="3">
                                        <!-- <field name="site_note" style="width:100%" attrs="{'invisible':[('site_status','!=', 'other')], 'required':[('site_status','=','other')]}"/> -->
                                        <!-- <input type="text"> -->
                                    </td>
                                </tr>

                                <tr height="16">
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>Email</span></td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>:</span></td>
                                    <td class="transparent-border">
                                        <!-- <field name="email" style="width:98%" required="1"/> -->
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2 custom-input" wire:model="email" type="email" placeholder="Email" style="width:90%; display: none">

                                        @error('email') <!-- Jika error akan menampilkan tampilan seperti ini  -->
                                            <span class="text-red-500 text-xs custom-input">{{ $message }}</span>
                                        @enderror

                                    </td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>Alternatif Email</span></td>
                                    <td class="transparent-border"><span class="custom-input" style="display: none" wire:ignore>:</span></td>
                                    <td class="transparent-border">
                                        <!-- <field name="email2" style="width:100%"/> -->
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2 custom-input" wire:model="email2" type="email2" placeholder="Alternatif Email" style="width:100%; display: none">

                                        @error('email2') <!-- Jika error akan menampilkan tampilan seperti ini  -->
                                            <span class="text-red-500 text-xs custom-input">{{ $message }}</span>
                                        @enderror

                                    </td>
                                </tr>

                                <tr height="16">
                                    <td class="transparent-border">Korespondensi</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <!-- <field name="correspondent" style="width:98%" widget="radio" options="{'horizontal': True}"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="correspondent" type="correspondent" placeholder="correspondent"> -->
                                        <input type="radio" class="ms-2" id="pria" wire:model="correspondent" value="email">
                                        Email
                                        <input type="radio" class="ms-2" id="pria" wire:model="correspondent" value="telpon/whatsapp">
                                        Telpon/Whatsapp
                                        <input type="radio" class="ms-2" id="pria" wire:model="correspondent" value="lainnya">
                                        Lainnya

                                        @error('correspondent') <!-- Jika error akan menampilkan tampilan seperti ini  -->
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror

                                    </td>
                                    <td class="transparent-border" colspan="3">
                                        <!-- <field name="correspondent_note" style="width:100%" attrs="{'invisible':[('correspondent','!=', 'other')], 'required':[('correspondent','=','other')]}"/> -->
                                        <!-- <input type="text"> -->
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
                                    <td class="transparent-border bold bg-black text-center" style="font-size: 14px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
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
                                    <td class="transparent-border">Jenis Pemohon *</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <!-- <field name="group_order" style="width:100%" widget="radio" options="{'horizontal': True}" required="1"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="group_order" type="group_order" placeholder="group_order"> -->
                                        <select wire:model="group_order" class="block rounded border border-gray-100 px-3 py-1 mt-2" style="width:90%">
                                            <option value="">Jenis Pemohon</option>
                                            <option value="retail">Retail</option>
                                            <option value="corporate">Corporate</option>
                                            <option value="others">Others</option>
                                        </select>

                                        @error('group_order') <!-- Jika error akan menampilkan tampilan seperti ini  -->
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror

                                    </td>
                                    <td class="transparent-border" colspan="3">
                                        <!-- <field name="group_order_note" style="width:100%" attrs="{'invisible':[('group_order','!=','other')], 'required':[('group_order','=','other')]}"/> -->
                                        <!-- <input type="text"> -->
                                    </td>
                                </tr>
                                <tr height="16">
                                    <td class="transparent-border">Pilihan Layanan *</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <!-- <field name="bandwidth_type" style="width:100%" widget="radio" options="{'horizontal': True}" required="1"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="bandwidth_type" type="bandwidth_type" placeholder="bandwidth_type"> -->
                                        <input type="radio" class="ms-2" id="pria" wire:model="bandwidth_type" value="broadband">
                                        Broadband
                                        <input type="radio" class="ms-2" id="pria" wire:model="bandwidth_type" value="dedicated">
                                        Dedicated
                                        <input type="radio" class="ms-2" id="pria" wire:model="bandwidth_type" value="others">
                                        Others

                                        @error('bandwidth_type') <!-- Jika error akan menampilkan tampilan seperti ini  -->
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror

                                    </td>
                                    <td class="transparent-border" colspan="3">
                                        <!-- <field name="bandwidth_type_note" style="width:100%" attrs="{'invisible':[('bandwidth_type','!=','others')], 'required':[('bandwidth_type','=','others')]}"/> -->
                                        <!-- <input type="text"> -->
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
                                        <!-- <field name="technnician_name" style="width:98%"/> -->
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="technnician_name" type="technnician_name" placeholder="Kontak Person Teknis" style="width:90%">
                                    </td>
                                    <td class="transparent-border">No. Telp</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <!-- <field name="technnician_mobile" style="width:100%"/> -->
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="technnician_mobile" type="technnician_mobile" placeholder="No. Telp" style="width:90%">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table width="100%" class="transparent-border">
                            <tbody>
                                <tr height="3"/>
                                <tr height="20">
                                    <td style="background-color: #0099ff; color: white; padding-left:5px; font-size: 12px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                                        Informasi Layanan Tambahan :
                                    </td>
                                </tr>
                                <tr height="3"/>
                            </tbody>
                        </table>

                        <!-- Form Sale Order -->
                        <!-- <notebook>
                            <page string="Daftar Layanan" name="order_lines">

                            <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="order_line" type="order_line" placeholder="order_line">

                                <group string="Catatan" name="note_group" col="6" class="mt-2 mt-md-0">
                                    <group colspan="4">
                                        <field name="note" class="oe-bordered-editor" nolabel="1" placeholder="Masukkan Catatan disini jika ada"/>
                                    </group>
                                    <group class="oe_subtotal_footer oe_right" colspan="2" name="sale_total">
                                        <field name="tax_totals_json" widget="account-tax-totals-field" nolabel="1" colspan="2"/>
                                    </group>
                                    <div class="oe_clear"/>
                                </group>
                            </page>
                        </notebook> -->

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
                                    <td class="transparent-border bold">Paket Internet *</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <!-- <field name="bandwidth_amount" required="1" widget="radio" options="{'horizontal': True}"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="bandwidth_amount" type="bandwidth_amount" placeholder="bandwidth_amount"> -->
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

                                        @error('bandwidth_amount') <!-- Jika error akan menampilkan tampilan seperti ini  -->
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
                                        <!-- <field name="television_service_type" required="1" widget="radio" options="{'horizontal': True}"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="television_service_type" type="television_service_type" placeholder="television_service_type"> -->
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
                                        <!-- <field name="television_service_amount" required="1" widget="radio" options="{'horizontal': True}"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="television_service_amount" type="television_service_amount" placeholder="television_service_amount"> -->
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
                                        <!-- <field name="telephone_service_amount" required="1" widget="radio" options="{'horizontal': True}"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="telephone_service_amount" type="telephone_service_amount" placeholder="telephone_service_amount"> -->
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
                                        <!-- <field name="telephone_service_amount" required="1" widget="radio" options="{'horizontal': True}"/> -->
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
                                    <td class="transparent-border bold bg-black text-center" style="font-size: 14px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
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
                                    <td class="transparent-border" style="color:black;">Tagihan Atas Nama *</td>
                                    <td class="transparent-border" style="color:black;">:</td>
                                    <td class="transparent-border">
                                        <!-- <field name="onbehalf_invoice" style="width:100%" widget="radio" options="{'horizontal': True}" required="1"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="onbehalf_invoice" type="onbehalf_invoice" placeholder="onbehalf_invoice"> -->
                                        <input type="radio" class="ms-2 "  wire:model="onbehalf_invoice" value="pribadi">
                                        Pribadi
                                        <input type="radio" class="ms-2 " wire:model="onbehalf_invoice" value="perusahaan">
                                        Perusahaan
                                        <input type="radio" class="ms-2 " wire:model="onbehalf_invoice" value="lainnya">
                                        Lainnya

                                        @error('onbehalf_invoice') <!-- Jika error akan menampilkan tampilan seperti ini  -->
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror

                                    </td>
                                    <!-- <td class="transparent-border" colspan="3"> -->
                                        <!-- <field name="onbehalf_invoice_note" style="width:100%" attrs="{'invisible':[('onbehalf_invoice','!=','other')], 'required':[('onbehalf_invoice','=','other')]}"/> -->
                                        <!-- <input type="text"> -->
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
                                        <!-- <field name="pic_invoice_name" style="width:98%"/> -->
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="pic_invoice_name" type="pic_invoice_name" placeholder="Kontak Person Keuangan" style="width:90%">
                                    </td>
                                    <td class="transparent-border" style="color:black;">No. Telp.</td>
                                    <td class="transparent-border" style="color:black;">:</td>
                                    <td class="transparent-border">
                                        <!-- <field name="pic_invoice_phone" style="width:100%"/> -->
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
                                    <td class="transparent-border" style="vertical-align: top; color:black;">Alamat Penagihan</td>
                                    <td class="transparent-border" style="vertical-align: top; color:black;">:</td>
                                    <td class="transparent-border">
                                        <!-- <field name="partner_invoice_id" required="1" style="width:100%" context="{'default_type':'invoice', 'show_address': 1, 'show_vat': True}" domain="[('type','=','invoice'),('contact_group','=','retail')]" options="{&quot;always_reload&quot;: True}"/> -->
                                        <textarea class="block rounded border border-gray-100 px-3 py-1 mt-2" style="width:100%" wire:model="partner_invoice_id" type="partner_invoice_id" placeholder="Alamat Penagihan" rows="4"></textarea>

                                        @error('partner_invoice_id') <!-- Jika error akan menampilkan tampilan seperti ini  -->
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
                                    <td class="transparent-border" style="color:black;">Kode Pos</td>
                                    <td class="transparent-border" style="color:black;">:</td>
                                    <td colspan="2" class="transparent-border bottom-border-dotted">
                                        <!-- <field name="zip" style="width:100%"/> -->
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="zip" type="zip" placeholder="Kode Pos" style="width:100%">

                                        @error('zip') <!-- Jika error akan menampilkan tampilan seperti ini  -->
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
                                    <td class="transparent-border" style="color:black;">Email Penagihan</td>
                                    <td class="transparent-border" style="color:black;">:</td>
                                    <td class="transparent-border">
                                        <!-- <field name="pic_invoice_email" style="width:98%"/> -->
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="pic_invoice_email" type="pic_invoice_email" placeholder="Email Penagihan" style="width:90%">

                                        @error('pic_invoice_email') <!-- Jika error akan menampilkan tampilan seperti ini  -->
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror

                                    </td>
                                    <td class="transparent-border" style="color:black;">Nama Bank</td>
                                    <td class="transparent-border" style="color:black;">:</td>
                                    <td class="transparent-border">
                                        <!-- <field name="pic_invoice_bankname" style="width:100%"/> -->
                                        <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="pic_invoice_bankname" type="pic_invoice_bankname" placeholder="Nama Bank"style="width:100%">
                                    </td>
                                </tr>
                                <tr height="16">
                                    <td class="transparent-border" style="color:black;">Pembayaran Non Kartu Kredit</td>
                                    <td class="transparent-border">:</td>
                                    <td class="transparent-border">
                                        <!-- <field name="payment_type" style="width:98%" widget="radio" options="{'horizontal': True}"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="payment_type" type="payment_type" placeholder="payment_type"> -->
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
                                        <!-- <field name="pic_invoice_banknmbr" style="width:100%"/> -->
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
                                        <!-- <field name="surat_kuasa_flag"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="surat_kuasa_flag" type="surat_kuasa_flag" placeholder="surat_kuasa_flag"> -->
                                        <input wire:model="surat_kuasa_flag" type="checkbox">
                                    </td>
                                </tr>
                                <tr height="15">
                                    <td class="px-2" style="border: 0.5px solid black; font-size:11px;">- Fotocopy NIK/SIM/Pasport</td>
                                    <td style="border: 0.5px solid black; text-align: center; font-size:11px;">
                                        <!-- <field name="identity_flag"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="identity_flag" type="identity_flag" placeholder="identity_flag"> -->
                                        <input wire:model="identity_flag" type="checkbox">

                                        @error('identity_flag') <!-- Jika error akan menampilkan tampilan seperti ini  -->
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror

                                    </td>
                                </tr>
                                <tr height="15">
                                    <td class="px-2" style="border: 0.5px solid black; font-size:11px;">- Fotocopy NPWP</td>
                                    <td style="border: 0.5px solid black; text-align: center; font-size:11px;">
                                        <!-- <field name="npwp_flag"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="npwp_flag" type="npwp_flag" placeholder="npwp_flag"> -->
                                        <input wire:model="npwp_flag" type="checkbox">
                                    </td>
                                </tr>
                                <tr height="15">
                                    <td class="px-2" style="border: 0.5px solid black; font-size:11px;">- Fotocopy NIB</td>
                                    <td style="border: 0.5px solid black; text-align: center; font-size:11px;">
                                        <!-- <field name="nib_flag"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="nib_flag" type="nib_flag" placeholder="nib_flag"> -->
                                        <input wire:model="nib_flag" type="checkbox">
                                    </td>
                                </tr>
                                <tr height="15">
                                    <td class="px-2" style="border: 0.5px solid black; font-size:11px;">- Fotocopy Akta Perusahaan</td>
                                    <td style="border: 0.5px solid black; text-align: center; font-size:11px;">
                                        <!-- <field name="akta_flag"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="akta_flag" type="akta_flag" placeholder="akta_flag"> -->
                                        <input wire:model="akta_flag" type="checkbox">
                                    </td>
                                </tr>
                                <tr height="15">
                                    <td class="px-2" style="border: 0.5px solid black; font-size:11px;">- Berita Acara Kerjasama (NDA/MOU)</td>
                                    <td style="border: 0.5px solid black; text-align: center; font-size:11px;">
                                        <!-- <field name="bak_flag"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="bak_flag" type="bak_flag" placeholder="bak_flag"> -->
                                        <input wire:model="bak_flag" type="checkbox">
                                    </td>
                                </tr>
                                <tr height="15">
                                    <td class="px-2" style="border: 0.5px solid black; font-size:11px;">- Lainnya</td>
                                    <td style="border: 0.5px solid black; text-align: center; font-size:11px;">
                                        <!-- <field name="other_doc_flag"/> -->
                                        <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="other_doc_flag" type="other_doc_flag" placeholder="other_doc_flag"> -->
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
                                        * lembar putih = Finance
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
                                                FC NIK/SIM/Pasport
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
                                                <!-- <field name="surat_kuasa_file" attachment="1" widget="image" options="{'size': [120,240]}" attrs="{'required':[('surat_kuasa_flag','=',True)]}"/>-->

                                                <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="surat_kuasa_file" type="surat_kuasa_file" placeholder="surat_kuasa_file"> -->
                                                <input wire:model="surat_kuasa_file" type="file">

                                                @if($surat_kuasa_file)
                                                    <img class="rounded w-30 block" src="{{ $surat_kuasa_file->temporaryUrl() }}" alt="">
                                                @endif

                                            </td>
                                            <input type="text">
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px; padding:5px">
                                                <!-- <field name="identity_file" attachment="1" widget="image" options="{'size': [120,240]}" attrs="{'required':[('identity_flag','=',True)]}"/> -->

                                                <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="identity_file" type="identity_file" placeholder="identity_file"> -->
                                                <input wire:model="identity_file" type="file">

                                                @error('identity_file') <!-- Jika error akan menampilkan tampilan seperti ini  -->
                                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                                @enderror

                                                @if($identity_file)
                                                    <img class="rounded w-30 block" src="{{ $identity_file->temporaryUrl() }}" alt="">
                                                @endif

                                            </td>
                                            <input type="text">
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px; padding:5px">
                                                <!-- <field name="npwp_file" attachment="1" widget="image" options="{'size': [120,240]}" attrs="{'required':[('npwp_flag','=',True)]}"/> -->

                                                <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="npwp_file" type="npwp_file" placeholder="npwp_file"> -->
                                                <input wire:model="npwp_file" type="file">

                                                @if($npwp_file)
                                                    <img class="rounded w-30 block" src="{{ $npwp_file->temporaryUrl() }}" alt="">
                                                @endif

                                            </td>
                                            <input type="text">
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px; padding:5px">
                                                <!-- <field name="nib_file" attachment="1" widget="image" options="{'size': [120,240]}" attrs="{'required':[('nib_flag','=',True)]}"/> -->

                                                <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="nib_file" type="nib_file" placeholder="nib_file"> -->
                                                <input wire:model="nib_file" type="file">

                                                @if($nib_file)
                                                    <img class="rounded w-30 block" src="{{ $nib_file->temporaryUrl() }}" alt="">
                                                @endif

                                            </td>
                                            <input type="text">
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px; padding:5px">
                                                <!-- <field name="akta_file" attachment="1" widget="image" options="{'size': [120,240]}" attrs="{'required':[('akta_flag','=',True)]}"/> -->

                                                <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="akta_file" type="akta_file" placeholder="akta_file"> -->
                                                <input wire:model="akta_file" type="file">

                                                @if($akta_file)
                                                    <img class="rounded w-30 block" src="{{ $akta_file->temporaryUrl() }}" alt="">
                                                @endif

                                            </td>
                                            <input type="text">
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px; padding:5px">
                                                <!-- <field name="bak_file" attachment="1" widget="image" options="{'size': [120,240]}" attrs="{'required':[('bak_flag','=',True)]}"/> -->

                                                <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="bak_file" type="bak_file" placeholder="bak_file"> -->
                                                <input wire:model="bak_file" type="file">

                                                @if($bak_file)
                                                    <img class="rounded w-30 block" src="{{ $bak_file->temporaryUrl() }}" alt="">
                                                @endif

                                            </td>
                                            <input type="text">
                                            <td class="transparent-border italic text-center" style="border: 0.5px solid black; font-size:11px; padding:5px">
                                                <!-- <field name="other_doc_file" attachment="1" widget="image" options="{'size': [120,240]}" attrs="{'required':[('other_doc_flag','=',True)]}"/> -->

                                                <!-- <input class="block rounded border border-gray-100 px-3 py-1 mt-2" wire:model="other_doc_file" type="other_doc_file" placeholder="other_doc_file"> -->
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

<!-- =============================================================================================================== -->
                        <notebook>
                            <page string="Internal Notes">
                                <field name="internal_note"/>
                            </page>
                            <page string="Other Info">
                                <group name="sale_header">
                                    <group>
                                        <field name="type_of_order"/>
                                        <field name="subscription_plan_id"/>
                                        <field name="company_id"/>
                                        <field name="ead" readonly="0"/>
                                        <field name="user_id"/>
                                    </group>
                                    <group name="order_details">
                                        <field name="source_order"/>
                                        <field name="group_order"/>
                                        <field name="validity_date" attrs="{'invisible': [('state', 'in', ['sale', 'done'])]}"/>

<!--                                        <div class="o_td_label" groups="base.group_no_one" attrs="{'invisible': [('state', 'in', ['sale', 'done', 'cancel'])]}">-->
<!--                                            <label for="date_order" string="Quotation Date"/>-->
<!--                                        </div>-->

<!--                                        <field name="date_order" nolabel="1" groups="base.group_no_one" attrs="{'invisible': [('state', 'in', ['sale', 'done', 'cancel'])]}"/>-->
<!--                                        <div class="o_td_label" attrs="{'invisible': [('state', 'in', ['draft', 'sent'])]}">-->
<!--                                            <label for="date_order" string="Order Date"/>-->
<!--                                        </div>-->
<!--                                        <field name="date_order" attrs="{'required': [('state', 'in', ['sale', 'done'])], 'invisible': [('state', 'in', ['draft', 'sent'])]}" nolabel="1"/>-->

                                        <field name="show_update_pricelist" invisible="1"/>
                                        <label for="pricelist_id" groups="product.group_product_pricelist"/>
                                        <div groups="product.group_product_pricelist" class="o_row">
                                            <field name="pricelist_id" options="{'no_open':True,'no_create': True}"/>
                                            <button name="update_prices" type="object" string=" Update Prices" help="Recompute all prices based on this pricelist" class="btn-link mb-1 px-0" icon="fa-refresh" confirm="This will update all unit prices based on the currently set pricelist." attrs="{'invisible': ['|', ('show_update_pricelist', '=', False), ('state', 'in', ['sale', 'done','cancel'])]}"/>
                                        </div>
                                        <field name="currency_id" invisible="1"/>
                                        <field name="tax_country_id" invisible="1"/>
                                        <field name="payment_term_id" options="{'no_open':True,'no_create': True}"/>
                                    </group>
                                </group>
                            </page>
                        </notebook>
                    </sheet>
                <div class="oe_chatter">
                    <!-- <field name="message_follower_ids"/> -->
                    <!-- <field name="activity_ids"/> -->
                    <!-- <field name="message_ids"/> -->
                </div>
                <button class="block rounded px-3 py-1 bg-blue-400 text-white" >Create</button>
    </form>

    <hr>

    <!-- Cara agar Field Hidden ketika field onbehalf_reg di isi dengan value 'perusahaan' -->
    <!-- <label for="textInput1" class="custom-label">Input Text 1:</label>
    <input type="text" class="custom-input" id="textInput1" name="textInput1" oninput="checkInputVisibility()">

    <label for="textInput2" class="custom-label">Input Text 2:</label>
    <input type="radio" class="custom-input" id="textInput2" name="textInput2" value="option1" oninput="checkInputVisibility()">

    <label for="textInput3" class="custom-label">Input Text 3:</label>
    <input type="radio" class="custom-input" id="textInput3" name="textInput3" value="option2" oninput="checkInputVisibility()">

    <label for="textInput4" class="custom-label">Input Text 4:</label>
    <input type="radio" class="custom-input" id="textInput4" name="textInput4" value="option3" oninput="checkInputVisibility()"> -->

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
