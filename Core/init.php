<?php
/* ========================================================================
 * 框架加载文件，用于引导框架启动
 * ======================================================================== */
include CORE.'function/function.php';
include CORE.'ppphp.php';

spl_autoload_register('ppphp::load');
\ppphp::run();

