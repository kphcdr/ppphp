<?php
/*
*	初始化方法
*	$page[url] = 'http://localhost/page.php?cid=12';	
*	$page[total] = 200 //用数据库读取
*	$public[page_num] = 10	//每页条数
*	$page = new page($page);
*	$page->get_page();
*	该函数用于CI分页 如果需要其他方法获取当前分页 请修改 $this->page_now()
*	作者：kphcdr
*	邮箱: kphcdr@163.com
当前为基于CI
*/
class Page
{
	public $url = 'page.php?cid=1';  //当前页面的基本URL
	public $url_end = '';
	public $total = 250;	//总条数 
	public $page_num = 12; //每页条数
	public $total_num = ''; //总页数
	public $page_now ;//当前页
	public $page_now_class = 'uk-active';
	public $page ;	
	public $url_page = 'page'; //url 参数
	public $first = '第一页';	//为false时 不显示
	public $first_class = 'first';
	public $prev = false;
	public $prev_class = 'first';
	public $next = false;
	public $next_class = 'first';
	public $last = '最末页';
	public $last_class = 'first';
    public function __construct($data = array()) 
	{
        if(count($data) > 0)
		{
			foreach($data as $key=>$d)
			{
				if (isset($this->$key))
				{
					$this->$key = $d;
				}
			}		
		}
	}
	public function set_url($url)
	{
		$this->url = $url;
	}
	public function set_total($total)
	{
		$this->total = $total;
	}
	public function set_page_num($page_num)
	{
		$this->page_num = $page_num;
	}
	public function get_page()
	{
		$this->total_num = ceil($this->total / $this->page_num);
		$this->page_now = $this->page_now();
		$this->first();
		$this->prev();
		$this->pages_num();
		$this->next();
		$this->last();
		return $this->page;
	}
	//获取总页数
	public function get_total_num()
	{
		if(!$this->total_num)
		{
		$this->total_num = ceil($this->total / $this->page_num);
		}
		return $this->total_num;
	}
	private function first()
	{
		if($this->first)
		{
			if($this->first_class)
			{
			$class = 'class= "'.$this->first_class.'" ';
			}
			else
			{
			$class = '';
			}
			$this->page = '<li><a '.$class.' href="'.$this->url.'1'.$this->url_end.'">'.$this->first.'</a></li>';
		}
	}
	private function prev()
	{
		if($this->prev)
		{
			//判断是否还有上一页
			if($this->page_now >= 2)
			{
			$prev = $this->page_now - 1;
			}
			else
			{
			$prev = 1;
			}
			if($this->prev_class)
			{
			$class = 'class= "'.$this->prev_class.'" ';
			}
			else
			{
			$class = '';
			}
			$this->page .= '<li><a '.$class.' href="'.$this->url.$prev.$this->url_end.'">'.$this->prev.'</a></li>';
		}
	}
	private function pages_num()
	{
		if($this->page_now_class)
		{
		$class = 'class="'.$this->page_now_class.'"';
		}
		else
		{
		$class = '';
		}
		//总页数小于5页的时候，直接输出
		if($this->total_num<=5)
		{
			for($index=1;$index <= $this->total_num;$index++)
			{
				if($index == $this->page_now)
				{
					$this->page .= '<li '.$class.'><span>'.$index.'</span></li>';
				}
				else
				{
					$this->page .= '<li><a href="'.$this->url.$index.$this->url_end.'">'.$index.'</a></li>';
				}
			}
		}
		else
		{
		//总页数大于5页，但当前页没超过3，直接输出，并在最后增加最后页地址
			if($this->page_now<=3)
			{
				for($index=1;$index <= 5;$index++)
				{
					if($index == $this->page_now)
					{
						$this->page .= '<li '.$class.'><span>'.$index.'</span></li>';
					}
					else
					{
						$this->page .= '<li><a href="'.$this->url.$index.$this->url_end.'">'.$index.'</a></li>';
					}
				}
				$this->page .='<span>...</span>'.'<li><a href="'.$this->url.$this->total_num.$this->url_end.'">'.$this->total_num.'</a></li>';
			}
		//当总页数大于5页，且当前页为第4页,
			elseif($this->page_now == 4)
			{
				$this->page .='<li><a href="'.$this->url.'=1'.$this->url_end.'">1</a></li>';
				for($index=($this->page_now-2);$index <= 6;$index++)
				{
					if($index == $this->page_now)
					{
						$this->page .= '<li '.$class.'><span>'.$index.'</span></li>';
					}
					else
					{
						$this->page .= '<li><a href="'.$this->url.$index.'">'.$index.'</a></li>';
					}
				}
				$this->page .='<span>...</span>'.'<li><a href="'.$this->url.$index.$this->url_end.'">'.$this->total_num.'</a></li>';
			}
		//当前页为倒数第三页 不输出最后一页
			elseif( ($this->total_num - $this->page_now) ==  3)
			{
				$this->page .='<li><a href="'.$this->url.'=1'.$this->url_end.'">1</a></li>'.'<span>...</span>';
				for($index=($this->total_num - 5);$index <= $this->total_num;$index++)
				{
					if($index == $this->page_now)
					{
						$this->page .= '<li '.$class.'><span>'.$index.'</span></li>';
					}
					else
					{
						$this->page .= '<li><a href="'.$this->url.$index.$this->url_end.'">'.$index.'</a></li>';
					}
				}
				
			}
			elseif( ($this->total_num - $this->page_now) <=  2)
			{
				$this->page .='<li><a href="'.$this->url.'1'.$this->url_end.'">1</a></li>'.'<span>...</span>';
				for($index=($this->total_num - 4);$index <= $this->total_num;$index++)
				{
					if($index == $this->page_now)
					{
						$this->page .= '<li '.$class.'><span>'.$index.'</span></li>';
					}
					else
					{
						$this->page .= '<li><a href="'.$this->url.$index.$this->url_end.'">'.$index.'</a></li>';
					}
				}
			}
			else
			{
				$this->page .='<li><a href="'.$this->url.'1'.$this->url_end.'">1</a></li>'.'<span>...</span>';
				for($index=($this->page_now-2);$index <= ($this->page_now+2);$index++)
				{
					if($index == $this->page_now)
					{
						$this->page .= '<li '.$class.'><span>'.$index.'</span></li>';
					}
					else
					{
						$this->page .= '<li><a href="'.$this->url.$index.$this->url_end.'">'.$index.'</a></li>';
					}
				}
				$this->page .='<span>...</span>'.'<li><a href="'.$this->url.$this->total_num.$this->url_end.'">'.$this->total_num.'</a></li>';
			}
		}
	}
	private function next()
	{
			//判断是否还有下一页
		if($this->next)	
		{
			if($this->total_num - $this->page_now > 0)
			{
				$next = $this->page_now + 1;
			}
			else
			{
				$next = $this->total_num;
			}
			if($this->next_class)
			{
				$class = 'class= "'.$this->next_class.'" ';
			}
			else
			{
				$class = '';
			}
			
			$this->page .= '<li><a '.$class.' href="'.$this->url.$next.$this->url_end.'">'.$this->next.'</a></li>';
		}
	}
	private function last()
	{
		if($this->last)
		{
			if($this->last_class)
			{
			$class = 'class= "'.$this->last_class.'" ';
			}
			else
			{
			$class = '';
			}
			$this->page .= '<li><a '.$class.' href="'.$this->url.$this->total_num.$this->url_end.'">'.$this->last.'</a></li>';
		}
	}
	private function page_now()
	{
		return $this->page_now;
	}
}