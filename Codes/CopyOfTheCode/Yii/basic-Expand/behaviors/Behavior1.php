<?php
namespace app\behaviors;
use \yii\base\Behavior;
class Behavior1 extends Behavior{
    public $height;
    public function eat(){
        echo "dog eat";
    }

    public function events(){
        return [
          'wang'=>'shout'
        ];
    }

    public function shout($event){
        echo "dog wang wang wang <br/>";
    }


}