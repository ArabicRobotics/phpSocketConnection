<?php 
/////////php Code///////
		class Socket{
		public $socket;
		public $host ;
		public $port;
			
		   public function __construct($host,$port){
			   $this->host = $host;
			   $this->port = $port;
			   
		   }
		   public function init()
		   {
			   $this->socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
		   }
		public function open_socket()
		{
		$result = socket_connect($this->socket,$this->host,$this->port);
			return $result;
		}    
		public function getStatus()
		{
			try
			{
				$status = socket_get_status($this->socket);
				if ($status['timed_out']) {
				  return FALSE;
				}
				if ($status=="")
				{
					return TRUE;
				}
			}
			catch (Exception $e) {
				echo $e->getMessage();   
			}
		}
		
			
		   public function send_data($content){
			   
			   socket_write($this->socket,$content,strlen($content));
			
		   }
		
		   public function read_data(){
				 while($buf = socket_read($this->socket, 1024))
				if($buf = trim($buf))  
					break;
			return $buf;
		   }
		
		   public function close_socket(){
				  socket_close($this->socket);
		   }
		
		}


?>