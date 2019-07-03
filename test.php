<?php

echo 'Hi!';
if(assert(true == false))
{
    throw new \Exception("IF", 100);
}
else
{
    throw new \Exception("ELSE", 100);
}

// return 0;

?>