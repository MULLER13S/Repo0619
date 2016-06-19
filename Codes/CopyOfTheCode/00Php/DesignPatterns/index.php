<?php
define('BASEDIR',__DIR__);
include BASEDIR.'/IMooc/Loader.php';

spl_autoload_register('\\IMooc\\Loader::autoload');



















/*$config=new IMooc\Config(__DIR__.'/configs');
var_dump($config['controller']);
var_dump($config['database']);*/











/*$db=IMooc\Factory::getDatabase('slave');
$info=$db->query("select name from user where id=1 limit 1");

$db1=IMooc\Factory::getDatabase('master');*/

/*$proxy=new IMooc\Proxy();
$proxy->getUserName($id);
$proxy->setUserName($id,$proxy);*/






















/*class Page{
    function index(){
//        $user=new \IMooc\User(1);
        $user=IMooc\Factory::getUser(1);
        $user->name='rango';
        var_dump($user);
        $this->test();

        echo "OK";
    }

    function test(){
//        $user=new \IMooc\User(1);
        $user=IMooc\Factory::getUser(1);
        $user->mobile='18678631888';
        var_dump($user);
        echo "yes";

    }
}*/

/*$users=new IMooc\AllUser();
foreach($users as $user){
    var_dump($user->name);
    $user->mobile=rand(100,999);
}*/



















//$page=new Page();
//$page->index();














/*$canvas1=new IMooc\Canvas();
$canvas1->init();
$canvas1->addDecorator(new IMooc\ColorDrawDecorator('green'));
$canvas1->addDecorator(new IMooc\SizeDrawDecorator('30px'));
$canvas1->rect(3,6,4,12);
$canvas1->draw();*/




/*class Canvas2 extends IMooc\Canvas{
    function draw(){
        echo "<div style='color:red;'>";
        parent::draw();
        echo "</div>";
    }
}

$canvas1=new Canvas2();
$canvas1->init();
$canvas1->rect(3,6,4,12);
$canvas1->draw();*/



















/*$prototype=new IMooc\Canvas();
$prototype->init();
$canvas1=clone $prototype;
$canvas1->rect(3,8,10,12);
$canvas1->draw();
echo "==================";
echo "==================";
//$canvas2=new IMooc\Canvas();
//$canvas2->init();
$canvas2=clone $prototype;
$canvas2->rect(7,8,23,29);
$canvas2->draw();*/



/*class Event extends \IMooc\EventGenerator{
    function trigger(){
        echo "Event<br/>";
        $this->notify();
    }
}

 class Observer1 implements \IMooc\Observer{
    function update($event_info=null){
        echo "logic 11<br/>";
    }
} class Observer2 implements \IMooc\Observer{
    function update($event_info=null){
        echo "logic 22<br/>";
    }
}

$event=new Event();
$event->addObserver(new Observer1());
$event->addObserver(new Observer2());
$event->trigger();*/





















/*$db=new \IMooc\Database\MySQLi();
$db->connect('localhost','root','123456','test');
$db->query('show databases');
$db->close();

$user=new \IMooc\User(1);

//var_dump($user->id,$user->mobile,$user->name,$user->regtime);
//exit;

$user->mobile='18678631256';
$user->name='lily882';
$user->regtime=date('Y-m-d H:i:s');*/




















/*class Page{
    protected $strategy;
    function index(){
       echo "AD:";
        $this->strategy->showAd();
        echo "<br/>";

        echo "category";
        $this->strategy->showCategory();
        echo "<br/>";
    }
    function setStrategy(\IMooc\UserStrategy $strategy){
        $this->strategy=$strategy;
    }
}
$page=new Page();
if(isset($_GET['female'])){
    $strategy=new \IMooc\FemaleUserStrategy();

}else{
    $strategy=new \IMooc\MaleUserStrategy();
}
$page->setStrategy($strategy);
$page->index();*/











/*$db=new IMooc\Database\MySQLi();
$db->connect('localhost','root','123456','test');
$db->query("show databases");
$db->close();*/







//$db=\IMooc\Register::get('db1');







//$db=IMooc\Database::getInstance();//singleton pattern
//$db=IMooc\Database::getInstance();
//$db=IMooc\Database::getInstance();










//$db=IMooc\Factory::createDatabase();//Factory mode;












//$obj=new IMooc\Object();





//$obj->title='hello';
//echo $obj->title;
//echo $obj->test('hello',123);
//echo IMooc\Object::test('word',655);
//echo $obj(5);

//$db=new \IMooc\Database();
//$db->where("id=3")->where("name=lily")->order("id desc")->limit(10);













//$heap=new SplMinHeap();
//$heap->insert("today is six");
//$heap->insert("tomorrow is six");
//echo $heap->extract();
//echo $heap->extract();

//$stack=new SplQueue();
//$stack->enqueue("111111111\n");
//$stack->enqueue("222221\n");
//echo $stack->dequeue();
//echo $stack->dequeue();

//$stack=new SplStack();
//$stack->push("data1\n");
//$stack->push("data2\n");
//echo $stack->pop();
//echo $stack->pop();

//$array=new SplFixedArray(8);
//$array[0]=88;
//$array[5]='sunday';
//$array[1]='day';
//var_dump($array);

