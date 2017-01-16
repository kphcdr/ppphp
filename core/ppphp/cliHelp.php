<?php
namespace ppphp;

class cliHelp
{
    public function newCtrl($file)
    {
        return "<?php
namespace ".MODULE."\\ctrl;

class ".$file." extends \\ppphp
{
    public function index()
    {
        //put some
    }
}
";
    }
}