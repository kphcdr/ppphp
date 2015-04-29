<?php
if ( ! defined('PPPHP')) exit('非法入口');
	function conf($conf)
	{
		$systemfile = CORE . '/conf/' . $conf . '.php';
		$appfile    = APP . '/conf/' . $conf . '.php';
		if (file_exists($appfile))
		{
			$return = include $appfile;
		}
		else
		{
			if (file_exists($systemfile))
			{
				$return = include $systemfile;
			}
			else
			{
				show_error('没有这个配置文件');
				$return = NULL;
			}
		}
		return $return;
	}
	//中断语句，输出错误信息
	function show_error($message)
	{
		exit($message);
	}
	//输出变量
	function s($param)
	{
		var_dump($param);
	}
	/**
	 * 跳转页面
	 * @param $url
	 */
	function jump($url)
	{
		//判断是否需要为$url拼接
		if(strpos($url,'http://'))
		{
			$url = url($url);
		}
		//@FIXME
		header("Location: " . $url);
		exit();
	}
	function url($url)
	{
		//拼接URL
		$url = WEB.$url;
		return $url;
	}	
	function is_post()
	{
		if (isset($_POST) && !empty($_POST))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	/**
	 * 输出信息并跳转
	 * @param str $msg 信息
	 * @param str $gourl -1为回到上一页|0为刷新|否则为跳转的URL
	 */
	function msg($msg = '', $gourl = '-1')
	{
		
		if ($gourl == '-1')
			echo '<script>alert("' . $msg . '");history.go(-1);</script>';
		
		
		
		else if ($gourl == '0')
			echo '<script>alert("' . $msg . '");location.reload();</script>';
		
		
		
		else
			echo '<script>alert("' . $msg . '");location.href="' . $gourl . '";</script>';
		
	}
	/**
	 * 去除代码中的空白和注释
	 * from THINKPHP
	 * @param string $content 代码内容
	 * @return string
	 */
	function strip_whitespace($content) {
	    $stripStr   = '';
	    //分析php源码
	    $tokens     = token_get_all($content);
	    $last_space = false;
	    for ($i = 0, $j = count($tokens); $i < $j; $i++) {
	        if (is_string($tokens[$i])) {
	            $last_space = false;
	            $stripStr  .= $tokens[$i];
	        } else {
	            switch ($tokens[$i][0]) {
	                //过滤各种PHP注释
	                case T_COMMENT:
	                case T_DOC_COMMENT:
	                    break;
	                //过滤空格
	                case T_WHITESPACE:
	                    if (!$last_space) {
	                        $stripStr  .= ' ';
	                        $last_space = true;
	                    }
	                    break;
	                case T_START_HEREDOC:
	                    $stripStr .= "<<<THINK\n";
	                    break;
	                case T_END_HEREDOC:
	                    $stripStr .= "THINK;\n";
	                    for($k = $i+1; $k < $j; $k++) {
	                        if(is_string($tokens[$k]) && $tokens[$k] == ';') {
	                            $i = $k;
	                            break;
	                        } else if($tokens[$k][0] == T_CLOSE_TAG) {
	                            break;
	                        }
	                    }
	                    break;
	                default:
	                    $last_space = false;
	                    $stripStr  .= $tokens[$i][1];
	            }
	        }
	    }
	    return $stripStr;
	}