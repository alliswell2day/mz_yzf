<?php
class CACHE {
	public function __construct(){
		global $pass;
		$this->file_name=ROOT.'includes/cache/'.md5(md5($pass)).'.txt';
	}
	public function get($key) {
		global $_CACHE;
		return $_CACHE[$key];
	}
	public function read() {
		if(CACHE_FILE==1) return str_replace('<?php exit;//','',file_get_contents($this->file_name));
		global $DB;
		$row=$DB->query("SELECT v FROM pay_config WHERE k='cache' limit 1")->fetch();
		return $row['v'];
	}
	public function save($value) {
		if (is_array($value)) $value = serialize($value);
		if(CACHE_FILE==1) return file_put_contents($this->file_name,'<?php exit;//'.$value);
		global $DB;
		$value = addslashes($value);
		return $DB->query("update pay_config set v='$value' where k='cache'")->fetch();
	}
	public function pre_fetch(){
		global $_CACHE;
		$_CACHE=array();
		$cache = $this->read();
		$_CACHE = array_merge(@unserialize($cache),$_COOKIE);
		if(empty($_CACHE['version']) || $_GET['clearcache'])$_CACHE = $this->update();
		return $_CACHE;
	}
	public function update() {
		global $DB;
		$cache = array();
        $query = $DB->query('SELECT * FROM pay_config where 1');
		while($result = $query->fetch()){
			if($result['k']=='cache') continue;
			$cache[ $result['k'] ] = $result['v'];
		}
		$this->save($cache);
		return $cache;
	}
	public function clear() {
		global $DB;
		return $DB->exec("update pay_config set v='' where k='cache'");
	}
}
