<?php
$dependency=['class'=>'yii\caching\FileDependency',
'fileName'=>'hw.txt'];
$enabled=false;
?>

<?php if($this->beginCache('cache_div',['enabled'=>true])){?>
    <div id="cache_div">
        <div>这里会被缓存465</div>
    </div>
<?php
    $this->endCache();
    }
?>
<div id="no_cache_div">
    <div>这里不会被缓存465</div>
</div>
