<?php

namespace App\Repository;


use App\User;
use App\Message;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

Class MissionRepository {

	/**
	 * @var User
	 */
	private $user;



	public function createMessage( string $title, string $content, int $from, int $to ) {

		return $this->message->newQuery()->create( [
			'title'      => $title,
			'content'    => $content,
			'from_id'    => $from,
			'to_id'      => $to,
			'created_at' => Carbon::now()
		] );


	}




}