<?php 
//Registry::set('cache', new Cache(new DbCache));
Registry::set('cache', new Cache(new MemcacheSupport));
?>