<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('date_order')->nullable();
            $table->string('name')->nullable();
            $table->string('onbehalf_name')->nullable();
            $table->string('onbehalf_gender')->nullable();
            $table->string('onbehalf_identity')->nullable();
            $table->string('onbehalf_identity_nmbr')->nullable();
            $table->string('onbehalf_mobile')->nullable();
            $table->string('onbehalf_email')->nullable();
            $table->longText('nik_address_compelete')->nullable();
            $table->string('nik_zip')->nullable();
            $table->string('onbehalf_reg')->nullable();
            $table->string('partner_id')->nullable();
            $table->string('partner_gender')->nullable();
            $table->string('partner_identity')->nullable();
            $table->string('partner_identity_nmbr')->nullable();
            $table->string('partner_bdate')->nullable();
            $table->string('partner_npwp')->nullable();
            $table->string('business_type')->nullable();
            $table->string('partner_shipping_id')->nullable();
            $table->string('partner_number')->nullable();
            $table->longText('partner_installation_id')->nullable();
            $table->string('mobile')->nullable();
            $table->string('mobile2')->nullable();
            $table->string('site_status')->nullable();
            $table->string('email')->nullable();
            $table->string('email2')->nullable();
            $table->string('correspondent')->nullable();
            $table->string('group_order')->nullable();
            $table->string('bandwidth_type')->nullable();
            $table->string('technnician_name')->nullable();
            $table->string('technnician_mobile')->nullable();
            $table->string('order_line')->nullable();
            $table->string('bandwidth_amount')->nullable();
            $table->string('television_service_type')->nullable();
            $table->string('television_service_amount')->nullable();
            $table->string('telephone_service_amount')->nullable();
            $table->longText('note')->nullable();
            $table->string('onbehalf_invoice')->nullable();
            $table->string('pic_invoice_name')->nullable();
            $table->string('pic_invoice_phone')->nullable();
            $table->longText('partner_invoice_id')->nullable();
            $table->string('zip')->nullable();
            $table->string('pic_invoice_email')->nullable();
            $table->string('pic_invoice_bankname')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('pic_invoice_banknmbr')->nullable();
            $table->string('surat_kuasa_flag')->nullable();
            $table->string('identity_flag')->nullable();
            $table->string('npwp_flag')->nullable();
            $table->string('nib_flag')->nullable();
            $table->string('akta_flag')->nullable();
            $table->string('bak_flag')->nullable();
            $table->string('other_doc_flag')->nullable();
            $table->string('surat_kuasa_file')->nullable();
            $table->string('identity_file')->nullable();
            $table->string('npwp_file')->nullable();
            $table->string('nib_file')->nullable();
            $table->string('akta_file')->nullable();
            $table->string('bak_file')->nullable();
            $table->string('other_doc_file')->nullable();
            $table->string('terms_and_condition_flag')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
