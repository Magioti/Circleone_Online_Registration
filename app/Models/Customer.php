<?php

namespace App\Models;

use App\Traits\HasUploadFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory, HasUploadFields;

    protected $fillable = [
        'date_order',
        'name',
        'onbehalf_name',
        'onbehalf_gender',
        'onbehalf_identity',
        'onbehalf_identity_nmbr',
        'onbehalf_mobile',
        'onbehalf_email',
        'nik_address_compelete',
        'nik_zip',
        'onbehalf_reg',
        'partner_id',
        'partner_gender',
        'partner_identity',
        'partner_bdate',
        'partner_npwp',
        'business_type',
        'partner_shipping_id',
        'partner_number',
        'partner_installation_id',
        'mobile',
        'mobile2',
        'site_status',
        'email',
        'email2',
        'correspondent',
        'group_order',
        'bandwidth_type',
        'technnician_name',
        'technnician_mobile',
        'order_line',
        'bandwidth_amount',
        'television_service_type',
        'television_service_amount',
        'telephone_service_amount',
        'note',
        'onbehalf_invoice',
        'pic_invoice_name',
        'pic_invoice_phone',
        'partner_invoice_id',
        'zip',
        'pic_invoice_email',
        'pic_invoice_bankname',
        'payment_type',
        'pic_invoice_banknmbr',
        'surat_kuasa_flag',
        'identity_flag',
        'npwp_flag',
        'nib_flag',
        'akta_flag',
        'bak_flag',
        'other_doc_flag',
        'surat_kuasa_file',
        'identity_file',
        'npwp_file',
        'nib_file',
        'akta_file',
        'bak_file',
        'other_doc_file',
    ];


}
