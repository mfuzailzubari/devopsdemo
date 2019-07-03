<?php

require_once('utils.php');

echo 'Hi!';
if(!assert(Utils::getPageTitle() == "Todo List Application"))
{
    throw new \Exception("IF", 100);
}
// return 0;

?>