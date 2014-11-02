<?php 
require_once 'ArrayLoadSaver.php';

class ArrayAssistant extends ArrayLoadSaver
{	

    protected $options = array(
        'checkRegExp' => true,
        'regExp' => array(
            0 => '/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}:[0-9]+/'
        ),
    );
    //регулярка для проверки
    public function FileToArray($filename=null, $options=null)
    {
        if(isset($filename))
        {
            $this->filename = $filename;
        }
        $ar = parent::FileToArray($this->filename)->getArray();
        if(isset($options['checkRegExp']) ? $options['checkRegExp'] : $this->options['checkRegExp'])
        {
            $this->setArray($this->checkRegExp($ar));
            return $this;
        }
        $this->setArray($ar);
        return $this;
    }

    public function checkRegExp($proxy)
    {
        $proxyRegExp ='/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}:[0-9]+/';
        if(is_array($proxy))
        {
            foreach($proxy as $key=>$value)
            {
                if(!preg_match($proxyRegExp,$value))
                    unset($proxy[$key]);  
            }
            return array_values($proxy);
        }
        else
        {
            return preg_match($proxyRegExp,$proxy) ? $proxy : false;    
        }
    }

    public static function init($className=__CLASS__)
    {
        return parent::init($className);
    }
}

$w= array(
    'checkRegExp' => false,
);


//$b=ArrayLoadSaver::init()->saveArrayToFile(array('dsfsdf','sdfg343'),'\\proxy\\teeee.txt');
//$b=ArrayLoadSaver::init()->setFilename('\proxy\testproxy.txt')->FileToArray()->setFilename('\proxy\teeee.txt')->saveArrayToFile(null,null,true);

$b=ArrayLoadSaver::init()->FileToArray('\proxy\testproxy.txt')->setRewrite(true)->saveArrayToFile('\proxy\teeee.txt',array('dfdf','fdfd'));

/*
ArrayLoadSaver::init()->filename='\proxy\testproxy.txt';
    $b=ArrayLoadSaver::init()->FileToArray()->setArrayParam(array('filename'=>'\proxy\teeee.txt', 'dataArray'=>array('qaz','asd'),'rewrite' =>true))->saveArrayToFile();
    */
//$b=ArrayAssistant::init()->setFilename('\\proxy\\teeee.txt')->setArray(array('qqqq3','wwww3'))->setRewrite(true)->saveArrayToFile(null,null,true);
print_r($b);
//$c = ArrayAssistant::init()->setFilename('\\proxy\\testproxy.txt')->FiletoArray()->getArray();
//print_r($c);
?>