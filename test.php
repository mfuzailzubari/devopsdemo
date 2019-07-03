<?php

require_once('utils.php');

echo 'Test Runs Started';
if(!assert(Utils::getPageTitle() == "Todo List Application"))
{
    echo "Test run failed";
    throw new \Exception("Page title is not correct", 1);
}
// return 0;

?>