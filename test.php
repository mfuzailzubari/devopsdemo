<?php

require_once('utils.php');
assert_options(ASSERT_WARNING, 0);

echo '===========================================================================================' . PHP_EOL;
echo 'Test Runs Started' . PHP_EOL;
echo '===========================================================================================' . PHP_EOL;
if(!assert(Utils::getPageTitle() == "Todo List Application"))
{
    echo "Test run failed";
    throw new \Exception("Page title is not correct", 1);
}
// return 0;

?>