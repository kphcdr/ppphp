<?php
namespace ppphp;
class upload
{
    private $allowTypes     = array('gif','jpg','png','bmp');
    private $uploadPath     = '';
    private $maxSize        = 1000000;
    private $msgCode        = null;
    private $filename;#上传后的文件路径

    public function __construct($options = array())
    {
        //取类内的所有变量
        $vars = get_class_vars(get_class($this));
        //设置类内变量
        foreach ($options as $key=>$value) {
            if (array_key_exists($key, $vars)) {
                $this->$key = $value;
            }
        }
    }

    public function fileUpload($myfile)
    {
        $name       = $myfile['name'];
        $tmpName    = $myfile['tmp_name'];
        $error      = $myfile['error'];
        $size       = $myfile['size'];

        //检查上传文件的大小 or 类型 and 上传的目录
        if ($error > 0) {
            $this->msgCode = $error;
            return false;
        } elseif (!$this->checkType($name)) {
            return false;
        } elseif (!$this->checkSize($size)) {
            return false;
        } elseif (!$this->checkUploadFolder()) {
            return false;
        } 

        $newFile = $this->uploadPath . '/' . $this->randFileName($name);
		$this->filename = $newFile;
        //复制文件到上传目录
        if (!is_uploaded_file($tmpName)) {
            $this->msgCode = -3;
            return false;
        } elseif(@move_uploaded_file($tmpName, $newFile)) {
            $this->msgCode = 0;
            return true;
        } else {
            $this->msgCode = -3;
            return false;
        }
    }

    /**
    * 检查上传文件的大小有没有超过限制
    *
    * @var int $size
    * @return boolean
    */
    private function checkSize($size)
    {
        if ($size > $this->maxSize) {
            $this->msgCode = -2;
            return false;
        } else {
            return true;
        }
    }

    /**
    * 检查上传文件的类型
    *
    * @var string $fileName
    * @return boolean
    */
    private function checkType($fileName)
    {
        $arr = explode(".", $fileName);
        $type = end($arr);
        if (in_array(strtolower($type), $this->allowTypes)) {
            return true;
        } else {
            $this->msgCode = -1;
            return false;
        }
    }

    /**
    * 检查上传的目录是否存在,如不存在尝试创建
    *
    * @return boolean
    */
    private function checkUploadFolder()
    {
        if (null === $this->uploadPath) {
            $this->msgCode = -5;
            return false;
        }
        
        $this->uploadPath = rtrim($this->uploadPath,'/');
        $this->uploadPath = rtrim($this->uploadPath,'\\');

        if (!file_exists($this->uploadPath)) {
            if (@mkdir($this->uploadPath, 0755)) {
                return true;
            } else {
                $this->msgCode = -4;
                return false;
            }
        } elseif(!is_writable($this->uploadPath)) {
            $this->msgCode = -3;
            return false;
        } else {
            return true;
        }
    }

    /**
    * 生成随机文件名
    * 
    * @var string $fileName
    * @return string
    */
    private function randFileName($fileName)
    {
        

        list($name,$type) = explode(".",$fileName);

        $newFile = time().mt_rand(1000,9999);
        
        return $newFile . '.' . $type;
    }

    /*
    * 取上传的结果和信息
    *
    * @return array
    */
    public function getStatus()
    {
        $messages = array(
            4   => "没有文件被上传",
            3   => "文件只被部分上传",
            2   => "上传文件超过了HTML表单中MAX_FILE_SIZE选项指定的值",
            1   => "上传文件超过了php.ini 中upload_max_filesize选项的值",
            0   => "上传成功",
            -1  => "末充许的类型",
            -2  => "文件过大，上传文件不能超过{$this->maxSize}个字节",
			-3  => "上传失败",
            -4  => "建立存放上传文件目录失败，请重新指定上传目录",
            -5  => "必须指定上传文件的路径"
        );

        return array('error'=>$this->msgCode, 'message'=>$messages[$this->msgCode]);
    }
    public function getfilename()
    {
    	return $this->filename;
    }

}