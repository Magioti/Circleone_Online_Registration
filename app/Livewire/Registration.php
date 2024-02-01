<?php

namespace App\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads as LivewireWithFileUploads;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Registration extends Component
{

    use LivewireWithFileUploads;

    public $date_order = '';
    public $name = '';
    public $onbehalf_name = '';
    public $onbehalf_gender = '';
    public $onbehalf_identity = '';
    public $onbehalf_identity_nmbr = '';
    public $onbehalf_mobile = '';
    public $onbehalf_email = '';
    public $nik_address_compelete = '';
    public $nik_zip = '';
    public $onbehalf_reg = 'pribadi';
    public $partner_id = '';
    public $partner_gender = '';
    public $partner_identity = '';
    // public $partner_identity_nmbr = '';
    public $partner_bdate = '';
    public $partner_npwp = '';
    public $business_type = '';
    public $partner_shipping_id = '';
    public $partner_number = '';
    public $partner_installation_id = '';
    public $mobile = '';
    public $mobile2 = '';
    public $site_status = '';
    public $email = '';
    public $email2 = '';
    public $correspondent = '';
    public $group_order = '';
    public $bandwidth_type = '';
    public $technnician_name = '';
    public $technnician_mobile = '';
    public $order_line = '';
    public $bandwidth_amount = '';
    public $television_service_type = '';
    public $television_service_amount = '';
    public $telephone_service_amount = '';
    public $note = '';
    public $onbehalf_invoice = '';
    public $pic_invoice_name = '';
    public $pic_invoice_phone = '';
    public $partner_invoice_id = '';
    public $zip = '';
    public $pic_invoice_email = '';
    public $pic_invoice_bankname = '';
    public $payment_type = '';
    public $pic_invoice_banknmbr = '';
    public $surat_kuasa_flag = '';
    public $identity_flag = '';
    public $npwp_flag = '';
    public $nib_flag = '';
    public $akta_flag = '';
    public $bak_flag = '';
    public $other_doc_flag = '';
    // public $surat_kuasa_file ='';
    // public $identity_file ='';
    // public $npwp_file ='';
    // public $nib_file ='';
    // public $akta_file ='';
    // public $bak_file ='';
    // public $other_doc_file ='';
    public $terms_and_condition_flag = '';

    #[Validate('max:102400')]
    public $surat_kuasa_file;

    #[Validate('max:102400')]
    public $identity_file;

    #[Validate('max:102400')]
    public $npwp_file;

    #[Validate('max:102400')]
    public $nib_file;

    #[Validate('max:102400')]
    public $akta_file;

    #[Validate('max:102400')]
    public $bak_file;

    #[Validate('max:102400')]
    public $other_doc_file;

    public $textInput1;
    public $textInput2;

    public function createNewCustomer()
    {
        // #if value onbehalf_reg != 'pribadi'
        $rules_2 = [
            'onbehalf_name' => 'required',
            'onbehalf_gender' => 'required',
            'onbehalf_identity' => 'required',
            'onbehalf_identity_nmbr' => 'required',
            'onbehalf_mobile' => 'required',
            'onbehalf_email' => 'required',
            'nik_address_compelete' => 'required',
            'nik_zip' => 'required',
            'onbehalf_reg' => 'required',
            'partner_id' => 'required',
            'partner_gender' => 'required',
            'partner_identity' => 'required',
            // 'partner_identity_nmbr' => 'required',
            'partner_bdate' => 'required',
            'business_type' => 'required',
            'partner_shipping_id' => 'required',
            'mobile' => 'required',
            'site_status' => 'required',
            'email' => 'required|email',
            'email2' => 'email',
            'correspondent' => 'required',
            'group_order' => 'required',
            'bandwidth_type' => 'required',
            'bandwidth_amount' => 'required',
            'onbehalf_invoice' => 'required',
            'partner_invoice_id' => 'required',
            'zip' => 'required',
            'pic_invoice_email' => 'required|email',
            'identity_flag' => 'required',
            'identity_file' => 'required',
            'terms_and_condition_flag' => 'required',
        ];


        // #if value onbehalf_reg = 'pribadi'
        $rules = [
            'onbehalf_name' => 'required',
            'onbehalf_gender' => 'required',
            'onbehalf_identity' => 'required',
            'onbehalf_identity_nmbr' => 'required',
            'onbehalf_mobile' => 'required',
            'onbehalf_email' => 'required',
            'nik_address_compelete' => 'required',
            'nik_zip' => 'required',
            'onbehalf_reg' => 'required',
            'partner_shipping_id' => 'required',
            'site_status' => 'required',
            'correspondent' => 'required',
            'group_order' => 'required',
            'bandwidth_type' => 'required',
            'bandwidth_amount' => 'required',
            'onbehalf_invoice' => 'required',
            'partner_invoice_id' => 'required',
            'zip' => 'required',
            'pic_invoice_email' => 'required|email',
            'identity_flag' => 'required',
            'identity_file' => 'required',
            'terms_and_condition_flag' => 'required',
        ];
    
        // Additional condition for extra validation
        if ($this->onbehalf_reg == 'pribadi') {
            $this->validate($rules);
        } else {
            $this->validate($rules_2);
        }

        # file names
        $surat_kuasa = null;
        $identity_file = null;
        $npwp_file = null;
        $nib_file = null;
        $akta_file = null;
        $bak_file = null;
        $other_doc_file = null;
        $date_order = null;

        // #if file exits upload it and get the name
        if ($this->surat_kuasa_file) {
            $surat_kuasa = $this->surat_kuasa_file->store('public');
            $surat_kuasa = basename($surat_kuasa);
        }

        // #if file exits upload it and get the name
        if ($this->identity_file) {
            $identity_file = $this->identity_file->store('public');
            $identity_file = basename($identity_file);
        }

        // #if file exits upload it and get the name
        if ($this->npwp_file) {
            $npwp_file = $this->npwp_file->store('public');
            $npwp_file = basename($npwp_file);
        }

        // #if file exits upload it and get the name
        if ($this->nib_file) {
            $nib_file = $this->nib_file->store('public');
            $nib_file = basename($nib_file);
        }

        // #if file exits upload it and get the name
        if ($this->akta_file) {
            $akta_file = $this->akta_file->store('public');
            $akta_file = basename($akta_file);
        }

        // #if file exits upload it and get the name
        if ($this->bak_file) {
            $bak_file = $this->bak_file->store('public');
            $bak_file = basename($bak_file);
        }

        // #if file exits upload it and get the name
        if ($this->other_doc_file) {
            $other_doc_file = $this->other_doc_file->store('public');
            $other_doc_file = basename($other_doc_file);
        }

        // additional condition for date_order created
        if ($this->date_order != null) {
            $date_order = $this->date_order;
        } else {
            $date_order = Carbon::now();
        }

        Customer::create([
            'date_order' => $date_order,
            'name' => $this->name,
            'onbehalf_name' => $this->onbehalf_name,
            'onbehalf_gender' => $this->onbehalf_gender,
            'onbehalf_identity' => $this->onbehalf_identity,
            'onbehalf_identity_nmbr' => $this->onbehalf_identity_nmbr,
            'onbehalf_mobile' => $this->onbehalf_mobile,
            'onbehalf_email' => $this->onbehalf_email,
            'nik_address_compelete' => $this->nik_address_compelete,
            'nik_zip' => $this->nik_zip,
            'onbehalf_reg' => $this->onbehalf_reg,
            'partner_id' => $this->partner_id,
            'partner_gender' => $this->partner_gender,
            'partner_identity' => $this->partner_identity,
            'partner_bdate' => $this->partner_bdate,
            'partner_npwp' => $this->partner_npwp,
            'business_type' => $this->business_type,
            'partner_shipping_id' => $this->partner_shipping_id,
            'partner_number' => $this->partner_number,
            'partner_installation_id' => $this->partner_installation_id,
            'mobile' => $this->mobile,
            'mobile2' => $this->mobile2,
            'site_status' => $this->site_status,
            'email' => $this->email,
            'email2' => $this->email2,
            'correspondent' => $this->correspondent,
            'group_order' => $this->group_order,
            'bandwidth_type' => $this->bandwidth_type,
            'technnician_name' => $this->technnician_name,
            'technnician_mobile' => $this->technnician_mobile,
            'order_line' => $this->order_line,
            'bandwidth_amount' => $this->bandwidth_amount,
            'television_service_type' => $this->television_service_type,
            'television_service_amount' => $this->television_service_amount,
            'telephone_service_amount' => $this->telephone_service_amount,
            'note' => $this->note,
            'onbehalf_invoice' => $this->onbehalf_invoice,
            'pic_invoice_name' => $this->pic_invoice_name,
            'pic_invoice_phone' => $this->pic_invoice_phone,
            'partner_invoice_id' => $this->partner_invoice_id,
            'zip' => $this->zip,
            'pic_invoice_email ' => $this->pic_invoice_email,
            'pic_invoice_bankname' => $this->pic_invoice_bankname,
            'payment_type' => $this->payment_type,
            'pic_invoice_banknmbr' => $this->pic_invoice_banknmbr,
            'surat_kuasa_flag' => $this->surat_kuasa_flag,
            'identity_flag' => $this->identity_flag,
            'npwp_flag' => $this->npwp_flag,
            'nib_flag' => $this->nib_flag,
            'akta_flag' => $this->akta_flag,
            'bak_flag' => $this->bak_flag,
            'other_doc_flag' => $this->other_doc_flag,
            'surat_kuasa_file' => $surat_kuasa,
            'identity_file' => $identity_file,
            'npwp_file' => $npwp_file,
            'nib_file' => $nib_file,
            'akta_file' => $akta_file,
            'bak_file' => $bak_file,
            'other_doc_file' => $other_doc_file,
            'terms_and_condition_flag' => $this->terms_and_condition_flag,
        ]);


        $this->reset([
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
            'terms_and_condition_flag',
        ]);

        request()->session()->flash('success', 'User Create Successfully!');
    }

    public function render()
    {
        $customers = Customer::all();

        return view('livewire.registration', [
            'customers' => $customers
        ]);
    }
}
