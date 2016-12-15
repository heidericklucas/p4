<?php

// app/models/Task.php

class Task extends BaseModel
{
protected $fillable = array('name', 'complete', 'completed_at_time');

}