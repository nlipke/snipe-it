<?php

use Cartalyst\Sentry\Users\Eloquent\User as SentryUserModel;

class User extends SentryUserModel {

	/**
	 * Indicates if the model should soft delete.
	 *
	 * @var bool
	 */
	protected $softDelete = true;

	/**
	 * Returns the user full name, it simply concatenates
	 * the user first and last name.
	 *
	 * @return string
	 */
	public function fullName()
	{
		return "{$this->first_name} {$this->last_name}";
	}

	/**
	 * Returns the user Gravatar image url.
	 *
	 * @return string
	 */
	public function gravatar()
	{
		// Generate the Gravatar hash
		$gravatar = md5(strtolower(trim($this->gravatar)));

		// Return the Gravatar url
		return "//gravatar.org/avatar/{$gravatar}";
	}

	public function assets()
	{
		return $this->hasMany('Asset', 'assigned_to');
	}


	public function licenses()
	{
		return $this->belongsToMany('License', 'license_seats', 'assigned_to', 'license_id');
	}


	/**
	* Get action logs for this user
	*/
	public function userlog()
	{
		return $this->hasMany('Actionlog','checkedout_to');
	}


	/**
	* Get the asset's location based on the assigned user
	**/
  	public function userloc()
  	{
  		return $this->hasOne('Location','id');
  	}

}
