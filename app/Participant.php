<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    public $primaryKey = 'participant_id';
    protected $fillable = ['participant_id','participant_names','college_id','event_id','active'];
}
