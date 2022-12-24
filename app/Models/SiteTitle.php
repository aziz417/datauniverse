<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static first()
 */
class SiteTitle extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_title',
//            home page
        'h_title_1',
        'h_title_2',
        'h_title_3',
        'h_title_4',
        'h_title_5',
        'h_title_6',
        'h_title_7',
        'h_title_8',
        'location',
        'subscribe',
//            footer section
        'f_home',
        'f_our_services',
        'f_on_emergency',
        'f_address',
//            about us page
        'a_title_1',
//            career page
        'c_title_1',
        'c_title_2',
        'c_title_3',
//            career description page
        'c_d_title_1',
//            blog page
        'b_title_1',
        'b_title_2',
        'b_title_3',
        'b_title_4',
        'b_title_5',
        'b_title_6',
//            blog description page
        'b_d_title_1',
        'b_d_title_2',
        'b_d_title_3',
//            faq page
        'faq_title_1',
        'faq_title_2',
        'faq_title_3',
//            services page
        's_title_1',
        's_title_2',
        's_title_3',
//            under construction page
        'uc_title_1',
//            how we work page
        'hww_title_1',
//            contact us page
        'contact_title_1',
        'updated_by',
    ];

    public function updatedUser()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }
}
