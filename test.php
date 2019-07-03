<?php

require_once('utils.php');

echo 'Hi!';
if(!assert(Utils::getPageTitle() == "Todo List Application"))
{
    throw new \Exception("Page title is not correct", 1);
}
// return 0;

?>