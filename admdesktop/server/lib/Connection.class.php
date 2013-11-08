<?php

class Connection extends PDO
{
	private $dsn = 'mysql:dbname=cimentonline;host=67.205.67.147';
	private $user = 'cimentonline';
	private $password = 'fsj@1600';

	public static $handle = null;

	function __construct()
	{
		try
		{
			if (self::$handle == null)
			{
				$dbh = parent::__construct($this->dsn, $this->user, $this->password);

				parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$handle = $dbh;

				return self::$handle;
			}
		}
		catch(PDOException $e)
		{
			die('{ success: false, msg: "'.$e->getMessage().'" }');
			return false;
		}
	}

	function __destruct()
	{
		self::$handle = NULL;
	}

}
?>
