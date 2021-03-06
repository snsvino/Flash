<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TempOrderMaster extends Model
{
    use Notifiable;

    protected $table = 'temp_order_master';
    protected $primaryKey = 'temp_order_id';

    const CREATED_AT = 'order_date_time';
    const UPDATED_AT = 'received_date_time';


    protected $fillable = [
        'order_id', 'customer_id', 'payment_type_method', 'payable_amount', 'no_of_product', 'customer_address_id', 'promocode', 'before_promocode_amount',
        'after_promocode_amount', 'wallet_amount', 'final_payment_amount', 'cancel_amount', 'before_promocode_cancel_amount',
        'promocode_amount', 'promocode_type', 'delivery_charge', 'temp_cod_amount', 'order_delivery_status_id',
        'generate_order_id', 'order_number', 'extra_amount', 'ismembership', 'membership_id', 'payment_id', 'delivery_date',
        'delivery_time_slot', 'o_number', 'os', 'isordercancel', 'pay_data', 'cancel_date_time', 'cancel_reason', 'cancel_question',
        'cancel_by_user_id', 'cancel_by_user_type_id', 'reveiver_name', 'received_amount', 'receiver_sign', 'notification_sign',

    ];

    protected $hidden = [];


    public function order_status() {
        return $this->belongsTo('\App\OrderDeliveryStatus', 'order_delivery_status_id', 'order_delivery_status_id');
    }
    public function customer() {
        return $this->belongsTo('\App\Customer', 'customer_id', 'customer_id');
    }

    public function delivery_orders() {
        return $this->belongsTo('\App\LogisticsOrderManagement', 'order_id', 'order_id');
    }
}
