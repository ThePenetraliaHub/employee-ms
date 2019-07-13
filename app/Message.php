<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $guarded = [];
	protected $with = ['sender'];

    public function sender()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function recepients()
    {
        return $this->hasMany('App\Recepient');
    }

    //True if it has been read and 0 otherwise
    public function is_read(){
        $user_id = auth()->user()->id;

        $recepient = \App\Recepient::where(['user_id' => $user_id, 'message_id' => $this->id])->get()->first();

        if($recepient){
            return $recepient->is_read === 1;
        }

        return true;
    }

    public function mark_read(){
        $user_id = auth()->user()->id;

        $recepient = \App\Recepient::where(['user_id' => $user_id, 'message_id' => $this->id])->get()->first();

        if($recepient){
            $recepient->update([
                'is_read' => 1,
            ]);
        }

        return true;
    }
}
