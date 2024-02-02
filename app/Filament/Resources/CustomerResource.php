<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Customer;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use function Laravel\Prompts\text;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Radio;
use function Laravel\Prompts\select;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CustomerResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CustomerResource\RelationManagers;
use PhpParser\Node\Stmt\Label;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        DatePicker::make('date_order')->label('Tanggal')->format('d/m/Y')->disabledOn('edit'),
                        TextInput::make('name')->label('No. FAB')->disabledOn('edit'),
                        TextInput::make('onbehalf_name')->label('Nama Lengkap')->required()->disabledOn('edit'),
                        Radio::make('onbehalf_gender')->label('Gender')->options(['pria' => 'Pria','wanita' => 'Wanita',])->inline()->required()->disabledOn('edit'),
                        Radio::make('onbehalf_identity')->label('Identitas Diri')->options(['ktp' => 'KTP','sim' => 'SIM','passport' => 'Passport',])->inline()->required()->disabledOn('edit'),
                        TextInput::make('onbehalf_identity_nmbr')->label('Nomor Identitas')->disabledOn('edit'),
                        TextInput::make('onbehalf_mobile')->label('Nomor Kontak (HP)')->disabledOn('edit'),
                        TextInput::make('onbehalf_email')->label('Email Address')->disabledOn('edit'),
                        TextInput::make('nik_address_compelete')->label('Alamat Sesuai NIK')->disabledOn('edit'),
                        TextInput::make('nik_zip')->label('Kode Pos')->disabledOn('edit'),
                        Radio::make('onbehalf_reg')->label('Bertindak Atas Nama')->options(['pribadi' => 'Pribadi','perusahaan' => 'Perusahaan',])->inline()->required()->disabledOn('edit'),
                        TextInput::make('partner_id')->label('Nama Pelanggan')->required()->disabledOn('edit'),
                        Radio::make('partner_gender')->label('Gender')->options(['pria' => 'Pria','wanita' => 'Wanita',])->inline()->required()->disabledOn('edit'),
                        TextInput::make('partner_identity')->label('NIK/SIM/NIB')->required()->disabledOn('edit'),
                        TextInput::make('partner_identity_nmbr')->label('No. NIK/SIM/NIB')->required()->disabledOn('edit'),
                        DatePicker::make('partner_bdate')->label('Tanggal Lahir')->format('d/m/Y')->required()->disabledOn('edit'),
                        TextInput::make('partner_npwp')->label('No. NPWP')->disabledOn('edit'),
                        TextInput::make('business_type')->label('Jenis Usaha')->disabledOn('edit'),
                        TextInput::make('partner_shipping_id')->label('Alamat Pemasangan')->disabledOn('edit'),
                        TextInput::make('partner_number')->label('ID Pelanggan')->disabledOn('edit'),
                        TextInput::make('partner_installation_id')->label('Alamat Pemasangan')->disabledOn('edit'),
                        TextInput::make('mobile')->label('No. Kontak (HP)')->disabledOn('edit'),
                        TextInput::make('mobile2')->label('Alternatif No. Kontak')->disabledOn('edit'),
                        TextInput::make('site_status')->label('Status Pemasangan di Alamat')->disabledOn('edit'),
                        TextInput::make('email')->label('Email')->required()->disabledOn('edit'),
                        TextInput::make('email2')->label('Alternatif Email')->required()->disabledOn('edit'),
                        TextInput::make('correspondent')->label('Korespondensi')->disabledOn('edit'),
                        Radio::make('group_order')->label('Jenis Pemohon')->options(['pribadi' => 'Pribadi','perusahaan' => 'Perusahaan',])->inline()->required()->disabledOn('edit'),
                        Radio::make('bandwidth_type')->label('Pilihan Layanan')->options(['broadband' => 'Broadband','dedicated' => 'Dedicated',])->inline()->required()->disabledOn('edit'),
                        TextInput::make('technnician_name')->label('Kontak Person Teknis')->disabledOn('edit'),
                        TextInput::make('technnician_mobile')->label('No. Telp')->disabledOn('edit'),
                        TextInput::make('order_line')->label('Daftar Layanan')->disabledOn('edit'),
                        Select::make('bandwidth_amount')->label('Paket Internet')->required()->disabledOn('edit')
                        ->options([
                            '' => 'Paket Internet',
                            '10 Mbps' => '10 Mbps',
                            '20 Mbps' => '20 Mbps',
                            '30 Mbps' => '30 Mbps',
                            '50 Mbps' => '50 Mbps',
                            '75 Mbps' => '75 Mbps',
                            '80 Mbps' => '80 Mbps',
                            '100 Mbps' => '100 Mbps',
                            '300 Mbps' => '300 Mbps',
                            '500 Mbps' => '500 Mbps',
                        ]),
                        Select::make('television_service_type')->label('Jenis Layanan TV')->disabledOn('edit')
                        ->options([
                            '' => 'Jenis Layanan TV',
                            'Dens TV' => 'Dens TV',
                            'Funtime' => 'Funtime',
                            'Metime' => 'Metime',
                            'Family' => 'Family',
                            'Family Max' => 'Family Max',
                        ]),
                        Select::make('television_service_amount')->label('Jumlah Layanan TV')->disabledOn('edit')
                        ->options([
                            '' => 'Jumlah Layanan TV',
                            '1 STB' => '1 STB',
                            '2 STB' => '2 STB',
                            '3 STB' => '3 STB',
                            '4 STB' => '4 STB',
                            '5 STB' => '5 STB',
                        ]),
                        Select::make('telephone_service_amount')->label('Jumlah Layanan Telephone')->disabledOn('edit')
                        ->options([
                            '' => 'Jumlah Layanan Telephone',
                            '1 nomor telephone' => '1 nomor telephone',
                            '2 nomor telephone' => '2 nomor telephone',
                            '3 nomor telephone' => '3 nomor telephone',
                        ]),
                        RichEditor::make('note')->label('Catatan'),
                        TextInput::make('onbehalf_invoice')->label('Tagihan Atas Nama')->required()->disabledOn('edit'),
                        TextInput::make('pic_invoice_name')->label('Kontak Person Keuangan')->disabledOn('edit'),
                        TextInput::make('pic_invoice_phone')->label('No. Telp')->disabledOn('edit'),
                        TextInput::make('partner_invoice_id')->label('Alamat Penagihan')->disabledOn('edit'),
                        TextInput::make('zip')->label('Kode Pos')->disabledOn('edit'),
                        TextInput::make('pic_invoice_email')->label('Email Penagihan')->required()->disabledOn('edit'),
                        TextInput::make('pic_invoice_bankname')->label('Nama Bank')->disabledOn('edit'),
                        TextInput::make('payment_type')->label('Pembayaran Non Kartu Kredit')->disabledOn('edit'),
                        TextInput::make('pic_invoice_banknmbr')->label('No. Rekening')->disabledOn('edit'),
                        Checkbox::make('surat_kuasa_flag')->label('Surat Kuasa')->inline()->disabledOn('edit'),
                        Checkbox::make('identity_flag')->label('Fotocopy NIK/SIM/Passport')->inline()->accepted()->required()->disabledOn('edit'),
                        Checkbox::make('npwp_flag')->label('Fotocopy NPWP')->inline()->disabledOn('edit'),
                        Checkbox::make('nib_flag')->label('Fotocopy NIB')->inline()->disabledOn('edit'),
                        Checkbox::make('akta_flag')->label('Fotocopy Akta Perusahaan')->inline()->disabledOn('edit'),
                        Checkbox::make('bak_flag')->label('Berita Acara Kerjasama (NDA/MOU)')->inline()->disabledOn('edit'),
                        Checkbox::make('other_doc_flag')->label('Lainnya')->inline()->disabledOn('edit'),
                        FileUpload::make('surat_kuasa_file')->label('Surat Kuasa')->disabledOn('edit'),
                        FileUpload::make('identity_file')->label('FC NIK/SIM/Passport')->required()->disabledOn('edit'),
                        FileUpload::make('npwp_file')->label('FC NPWP')->disabledOn('edit'),
                        FileUpload::make('nib_file')->label('FC NIB')->disabledOn('edit'),
                        FileUpload::make('akta_file')->label('FC Akta Perusahaan')->disabledOn('edit'),
                        FileUpload::make('bak_file')->label('Berita Acara Kerjasama')->disabledOn('edit'),
                        FileUpload::make('other_doc_file')->label('Lainnya')->disabledOn('edit'),
                        Checkbox::make('terms_and_condition_flag')->label('Terms & Condition')->required()->disabledOn('edit'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date_order')->sortable()->searchable()->label('Tanggal'),
                TextColumn::make('name')->sortable()->searchable()->label('No. FAB'),
                TextColumn::make('onbehalf_name')->sortable()->searchable()->label('Nama Lengkap'),
                TextColumn::make('onbehalf_gender')->sortable()->searchable()->label('Gender'),
                TextColumn::make('onbehalf_identity')->sortable()->searchable()->label('Identitas Diri'),
                TextColumn::make('onbehalf_identity_nmbr')->sortable()->searchable()->label('Nomor Identitas'),
                TextColumn::make('onbehalf_mobile')->sortable()->searchable()->label('Nomor Kontak (HP)'),
                TextColumn::make('onbehalf_email')->sortable()->searchable()->label('Email Address'),
                TextColumn::make('nik_address_compelete')->sortable()->searchable()->label('Alamat Sesuai NIK'),
                TextColumn::make('nik_zip')->sortable()->searchable()->label('Kode Pos'),
                TextColumn::make('onbehalf_reg')->sortable()->searchable()->label('Bertindak Atas Nama'),
                TextColumn::make('partner_id')->sortable()->searchable()->label('Nama Pelanggan'),
                TextColumn::make('partner_gender')->sortable()->searchable()->label('Gender'),
                TextColumn::make('partner_identity')->sortable()->searchable()->label('NIK/SIM/NIB'),
                TextColumn::make('partner_identity_nmbr')->sortable()->searchable()->label('No. NIK/SIM/NIB'),
                TextColumn::make('partner_bdate')->sortable()->searchable()->label('Tanggal Lahir'),
                TextColumn::make('partner_npwp')->sortable()->searchable()->label('No NPWP'),
                TextColumn::make('business_type')->sortable()->searchable()->label('Jenis Usaha'),
                TextColumn::make('partner_shipping_id')->sortable()->searchable()->label('Alamat Pemasangan'),
                TextColumn::make('partner_number')->sortable()->searchable()->label('ID Pelanggan'),
                TextColumn::make('partner_installation_id')->sortable()->searchable()->label('Alamat Pemasangan'),
                TextColumn::make('mobile')->sortable()->searchable()->label('No. Kontak (HP)'),
                TextColumn::make('mobile2')->sortable()->searchable()->label('Alternatif No. Kontak'),
                TextColumn::make('site_status')->sortable()->searchable()->label('Status Pemasangan di Alamat'),
                TextColumn::make('email')->sortable()->searchable()->label('Email'),
                TextColumn::make('email2')->sortable()->searchable()->label('Alternatif Email'),
                TextColumn::make('correspondent')->sortable()->searchable()->label('Korespondensi'),
                TextColumn::make('group_order')->sortable()->searchable()->label('Jenis Pemohon'),
                TextColumn::make('bandwidth_type')->sortable()->searchable()->label('Pilihan Layanan'),
                TextColumn::make('technnician_name')->sortable()->searchable()->label('Kontak Person Teknis'),
                TextColumn::make('technnician_mobile')->sortable()->searchable()->label('No Telp'),
                TextColumn::make('order_line')->sortable()->searchable()->label('Daftar Layanan'),
                TextColumn::make('bandwidth_amount')->sortable()->searchable()->label('Paket Internet'),
                TextColumn::make('television_service_type')->sortable()->searchable()->label('Jenis Layanan TV'),
                TextColumn::make('television_service_amount')->sortable()->searchable()->label('Jumlah Layanan TV'),
                TextColumn::make('telephone_service_amount')->sortable()->searchable()->label('Jumlah Layanan Telephone'),
                TextColumn::make('note')->sortable()->searchable()->label('Catatan'),
                TextColumn::make('onbehalf_invoice')->sortable()->searchable()->label('Tagihan Atas Nama'),
                TextColumn::make('pic_invoice_name')->sortable()->searchable()->label('Kontak Person Keuangan'),
                TextColumn::make('pic_invoice_phone')->sortable()->searchable()->label('No. Telp'),
                TextColumn::make('partner_invoice_id')->sortable()->searchable()->label('Alamat Penagihan'),
                TextColumn::make('zip')->sortable()->searchable()->label('Kode Pos'),
                TextColumn::make('pic_invoice_email ')->sortable()->searchable()->label('Email Penagihan'),
                TextColumn::make('pic_invoice_bankname')->sortable()->searchable()->label('Nama Bank'),
                TextColumn::make('payment_type')->sortable()->searchable()->label('Pembayaran Non Kartu Kredit'),
                TextColumn::make('pic_invoice_banknmbr')->sortable()->searchable()->label('No. Rekening'),

                // Checklist
                // TextColumn::make('surat_kuasa_flag')->sortable()->searchable()->label('Surat Kuasa'),
                // TextColumn::make('identity_flag')->sortable()->searchable()->label('Fotocopy NIK/SIM/Passport'),
                // TextColumn::make('npwp_flag')->sortable()->searchable()->label('Fotocopy NPWP'),
                // TextColumn::make('nib_flag')->sortable()->searchable()->label('Fotocopy NIB'),
                // TextColumn::make('akta_flag')->sortable()->searchable()->label('Fotocopy Akta Perusahaan'),
                // TextColumn::make('bak_flag')->sortable()->searchable()->label('Berita Acara Kerjasama (NDA/MOU)'),
                // TextColumn::make('other_doc_flag')->sortable()->searchable()->label('Lainnya'),

                // Attachment File
                // TextColumn::make('surat_kuasa_file')->sortable()->searchable()->label('Surat Kuasa'),
                // TextColumn::make('identity_file')->sortable()->searchable()->label('FC NIK/SIM/Passport'),
                // TextColumn::make('npwp_file')->sortable()->searchable()->label('FC NPWP'),
                // TextColumn::make('nib_file')->sortable()->searchable()->label('FC NIB'),
                // TextColumn::make('akta_file')->sortable()->searchable()->label('FC Akta Perusahaan'),
                // TextColumn::make('bak_file')->sortable()->searchable()->label('Berita Acara Kerjasama'),
                // TextColumn::make('other_doc_file')->sortable()->searchable()->label('Lainnya'),

                // Terms & Condition
                TextColumn::make('terms_and_condition_flag')->sortable()->searchable()->label('Terms & Condition'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
