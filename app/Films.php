<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Films extends Model
{
    protected $flm_films = 'films';
    protected $flm_comment = 'comment';


    public function add_films($data) {
        return DB::table($this->flm_films)->insertGetID($data);
    }
    
    public function films_list() {
        return DB::table($this->flm_films)->select('id','name','slug','description','realease_date','rating','ticket_price','country','genre','photo')->get();
    }
    
    public function filmsdetail($slug) {
        return DB::table($this->flm_films)->whereslug($slug)->get();
    }
    
    public function add_comment($data) {
        return DB::table($this->flm_comment)->insertGetID($data);
    }
    
    public function comment_list($where) {
        return DB::table($this->flm_comment)->select('id','name','comment')->wherefilms_id($where)->orderBy('id', 'DESC')->limit(15)->get();
    }
}
