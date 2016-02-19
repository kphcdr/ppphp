速度
PPPHP的速度比所有的框架都要快，因为我们基本没有什么类库需要加载，如果你喜欢PPPHP，你可以在这基础上进行扩展，当然哥更希望你能把结果PUSH回来

架构
PPPHP的架构比所有的框架架构都要好，因为你只需要10分钟，就可以把整个工作流程看明白，然后你可以在这个架构上进行你自己的修改

前景
PPPHP的前景比所有的框架前景都要好，因为她具有最高的扩展性、稳定性、容错性

总结
通过以上三点你已经能够看到，PPPHP真的啥都没有，PPPHP面向的是初学者，但是她做为框架并不比其他框架优秀，她能做的只是让你更好，如果你真的更好了，希望你可以把你的修改PUSH回来，也可以直接和我联系


如何在控制器中加载模型

    
	public function index()
	{
		$m = $this->m('goods');#加载goods.php
		$m->get_goods();#使用对应的方法
	}
	
如何在控制器中使用smarty

	
	public function index()
	{
        $data['some'] = array('some','data');
        $t->display('index.tpl',$data);#会加载控制器名称下的index.tpl
	}
	
如何在模型中连接数据库

	
	//select
	public function lists()
	{
		return $this->select('test','*',array('id'=>'123'));
	}		
	//insert
	public function add($data)
	{
		return $this->insert('tucao_m', $data);
	}
	//del
	public function del()
	{
		return $this->delete('tucao_m', array('name'=>'kph'));
	}
	//update
	public function set()
	{
		return $this->update('tucao_m',array('name'=>'1234'),array('name'=>'123'));
	}
	
如何进行错误调试

	
	public function index()
	{
        debug('include');#查看文件包含情况
		debug('get');#查看get数据
	}
	
    
项目说明：http://ppphp.kphcdr.com