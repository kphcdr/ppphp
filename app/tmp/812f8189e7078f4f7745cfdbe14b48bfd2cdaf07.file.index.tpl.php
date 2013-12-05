<?php /* Smarty version Smarty-3.1.15, created on 2013-12-05 23:47:29
         compiled from "F:\www\git\ppphp\app\view\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23636529b16130d9449-58751460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '812f8189e7078f4f7745cfdbe14b48bfd2cdaf07' => 
    array (
      0 => 'F:\\www\\git\\ppphp\\app\\view\\index.tpl',
      1 => 1386258445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23636529b16130d9449-58751460',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_529b16132f45c9_06865379',
  'variables' => 
  array (
    'a' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_529b16132f45c9_06865379')) {function content_529b16132f45c9_06865379($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_url')) include 'F:\\www\\git\\ppphp\\Core\\smarty\\plugins\\modifier.url.php';
?><?php echo $_smarty_tpl->tpl_vars['a']->value;?>


<?php echo smarty_modifier_url('home/index');?>
<?php }} ?>
