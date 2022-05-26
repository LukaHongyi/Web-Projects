# CSE330
Hongyi Xu - 499173 - LukaHongyi



#### Discuss of phpinfo.php

When try to run the phpinfo.php file, Google Chrome automatically downloads this php file instead of displaying it like Apache does.  I guess the reason is the Node.JS does not run PHP interpreter while Apache does run PHP interpreter first when it is requested by a PHP file. So the php file request doesn't work in Node.JS.
