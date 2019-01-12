<?php 

namespace App\Traits;

trait Reviewable {

    public function reviews() {
        return $this->morphMany('App\Review', 'reviewable');
    }

}
