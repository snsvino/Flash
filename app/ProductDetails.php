<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ProductDetails extends Model
{
    use Notifiable;

    protected $table = 'product_details';
    protected $primaryKey = 'product_details_id';

    const CREATED_AT = 'create_date_time';
    const UPDATED_AT = 'update_date_time';


    protected $fillable = [
        'product_name', 'isactive','isdelete',
    ];

    protected $hidden = [];

    public function product() {
        return $this->belongsTo('\App\ProductMaster', 'product_id', 'product_id');
    }

    public function seller() {
        return $this->belongsTo('\App\SellerMaster', 'seller_id', 'seller_id');
    }

}
