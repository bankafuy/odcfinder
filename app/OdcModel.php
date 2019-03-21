<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OdcModel extends Model {

    protected $table = "tb_odc";

    protected $fillable = ['nama_odc', 'kapasitas', 'datel', 'witel', 'latitude', 'longitude'];

    protected $dates = [];

    public $timestamps = false;

    public $primaryKey = "id_odc";

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}
