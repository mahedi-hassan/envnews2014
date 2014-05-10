<?php

/*-----------------------------------------------------------------------------
  UserCounter
  -----------------------------------------
  Counter based on MySQL
  -----------------------------------------
-----------------------------------------------------------------------------*/

class UserCounter extends CComponent
{
	// Transfer parameters for calling the Counters
	public $action;
    public $data;

	private $cfg_tbl_users		= '{{user_counter_data}}';
	private $cfg_tbl_save		= '{{user_counter_save}}';
	private $cfg_online_time	= 10;

	private $user_total			= -1;
	private $user_online		= -1;
	private $user_today			= -1;
	private $user_yesterday		= -1;
	private $user_max_count		= -1;
	private $user_time			= -1;


	/**
	 * Constructor. (optional)
	 **/
	public function __construct()
	{
	}

	/**
	 * This method is needed for bizarre reasons oO
	 **/
	public function init()
	{
	}

	/**
	 * This method updates the counters in the database and passes it to
         * the local variables of all the necessary data.
	 **/
    public function refresh()
    {
		$cfg_tbl_users		= $this->cfg_tbl_users;
		$cfg_tbl_save		= $this->cfg_tbl_save;
		$cfg_online_time	= $this->cfg_online_time;

		// Read data from DB
		$sql = 'SELECT save_name, save_value FROM ' . $cfg_tbl_save;
		$command = Yii::app()->db->createCommand($sql);
		$dataReader = $command->query();
		$data = array();
		while (($row = $dataReader->read()) !== false)
		{
			$data[$row['save_name']] = $row['save_value'];
		}

		// Current day as a Julian date
		$today_jd = GregorianToJD(date('m'), date('j'), date('Y'));

		// Check if we already have a new day
		if ($today_jd != $data['day_time'])
		{
			// Reading Number of visitors today
			$sql = 'SELECT COUNT(user_ip) AS user_count FROM ' . $cfg_tbl_users;
			$command = Yii::app()->db->createCommand($sql);
			$dataReader = $command->query();
			$row = $dataReader->read();
			$today_count = $row['user_count'];

			// Determine the number of days to the last update
			$days_between = $today_jd - $data['day_time'];

			// Counter value from today to yesterday
			$sql = 'UPDATE ' . $cfg_tbl_save . ' SET save_value=' . ($days_between == 1 ? $today_count : 0) . ' WHERE save_name="yesterday"';
			$command = Yii::app()->db->createCommand($sql);
			$command->execute();

			// Check for new record
			if ($today_count >= $data['max_count'])
			{
				// update data
				$data['max_time']  = mktime(12, 0, 0, date('n'), date('j'), date('Y')) - 86400;
				$data['max_count'] = $today_count;

				// Save record of day
				$sql= 'UPDATE ' . $cfg_tbl_save . ' SET save_value=' . $today_count . ' WHERE save_name="max_count"';
				$command = Yii::app()->db->createCommand($sql);
				$command->execute();

				// Save the current day as a new record day
				$sql= 'UPDATE ' . $cfg_tbl_save . ' SET save_value=' . $data['max_time'] . ' WHERE save_name="max_time"';
				$command = Yii::app()->db->createCommand($sql);
				$command->execute();
			}

			// Increase total counter
			$sql = 'UPDATE ' . $cfg_tbl_save . ' SET save_value=save_value+' . $today_count . ' WHERE save_name="counter"';
			$command = Yii::app()->db->createCommand($sql);
			$command->execute();

			// Remove old visitor data from Table
			$sql = 'TRUNCATE TABLE ' . $cfg_tbl_users;
			$command = Yii::app()->db->createCommand($sql);
			$command->execute();

			// Update date
			$sql= 'UPDATE ' . $cfg_tbl_save . ' SET save_value=' . $today_jd . ' WHERE save_name="day_time"';
			$command = Yii::app()->db->createCommand($sql);
			$command->execute();

			// update data
			$data['counter'] += $today_count;
			$data['yesterday'] = ($days_between == 1 ? $today_count : 0);
		}

		// Determine the IP of the visitor
		$user_ip = Yii::app()->db->quoteValue(isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);

		// Save or update visitors
		$sql = 'INSERT INTO ' . $cfg_tbl_users . ' VALUES ("' . $user_ip . '", ' . time() . ') ON DUPLICATE KEY UPDATE user_time=' . time();
		$command = Yii::app()->db->createCommand($sql);
		$command->execute();

		// Initialize return array
		$output = array();

		// Reading Number of visitors today
		$sql = 'SELECT COUNT(user_ip) AS user_count FROM ' . $cfg_tbl_users;
		$command = Yii::app()->db->createCommand($sql);
		$dataReader = $command->query();
		$row = $dataReader->read();
		$output['today'] = $row['user_count'];

		// Return Total number of visitors and visitors from the previous day
		$output['counter']   = $data['counter'] + $output['today'];
		$output['yesterday'] = $data['yesterday'];

		// Recent visitors of the last x minutes to read
		$sql = 'SELECT COUNT(user_ip) AS user_count FROM ' . $cfg_tbl_users . ' WHERE user_time>=' . (time() - $cfg_online_time * 60);
		$command = Yii::app()->db->createCommand($sql);
		$dataReader = $command->query();
		$row = $dataReader->read();
		$output['online'] = $row['user_count'];

		// If the current record number of visitors exceeded today?
		if ($output['today'] >= $data['max_count'])
		{
			// Return this day as a record
			$output['max_count'] = $output['today'];
			$output['max_time']  = time();
		}
		else
		{
			// Return-old record
			$output['max_count'] = $data['max_count'];
			$output['max_time']  = $data['max_time'];
		}

		$this->user_total		= $output['counter'];
		$this->user_online		= $output['online'];
		$this->user_today		= $output['today'];
		$this->user_yesterday	= $output['yesterday'];
		$this->user_max_count	= $output['max_count'];
		$this->user_time		= $output['max_time'];
   	}

	/**
	 * Getter for the number of all visitors.
	 **/
	public function getTotal()
	{
		return $this->user_total;
	}

    /**
	 * Getter for the number of users who are currently online.
	 **/
	public function getOnline()
	{
		return $this->user_online;
	}

    /**
	 * Getter for the number of users who have been online today.
	 **/
	public function getToday()
	{
		return $this->user_today;
	}

    /**
	 * Getter for the number of users who have been online yesterday.
	 **/
	public function getYesterday()
	{
		return $this->user_yesterday;
	}

    /**
	 * Getter for the maximum number of users that was on a day online.
	 **/
	public function getMaximal()
	{
		return $this->user_max_count;
	}

    /**
	 * Getter for the time at which the maximum number of users was online.
	 **/
	public function getMaximalTime()
	{
		return $this->user_time;
	}

}


?>
