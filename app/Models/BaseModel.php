<?php

class BaseModel extends Eloquent {

    	public function getCreatedAtAttribute($attr) {        
        return Carbon::parse($attr)->format('d/m/Y - h:ia'); 
    }

        public function getCompletedAtTimeAttribute($completedtime) {        
        return Carbon::parse($completedtime)->format('d/m/Y - h:ia');  
    }
}