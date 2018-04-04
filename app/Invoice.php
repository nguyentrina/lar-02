<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'note',
    ];
    protected $appends = [
        'status_invoice'
    ];
    public function invoiceProducts()
    {
        return $this->hasMany('App\InvoiceProduct');
    }
    public function getStatusInvoiceAttribute()
    {
        switch($this->status){
            case 0: return 'Chưa xử lý';
            case 1: return 'Đang xử lý';
            case 2: return 'Đang gửi';
            case 3: return 'Đã hủy';
            case 4: return 'Hoàn thành';
        }
    }
}
