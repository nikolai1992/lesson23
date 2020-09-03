<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $guarded = [];
    public function students()
    {
        return $this->belongsToMany('App\Student', 'student_subject', 'subject_id','student_id')
            ->withPivot(["rating"]);
    }
    protected $lang_fields = [
      'name'
    ];
    public function getAttribute($key)
    {
        $default = parent::getAttribute($key);
        if (isset($this->lang_fields) && is_array($this->lang_fields) && in_array($key, $this->lang_fields)) {
            return $this->{$key.'_'.app()->getLocale()} ?? '';
        }
        return $default;
    }
}
