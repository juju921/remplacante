<?php

namespace App\Repository;

use App\User;
use App\Message;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

Class ConversationRepository {


	/**
	 * @var User
	 */
	private $user;
	/**
	 * @var Message
	 */
	private $message;


	public function __construct( User $user, Message $message ) {
		$this->user    = $user;
		$this->message = $message;
	}


	public function getConversations( int $userId ) {
		return $this->user->newQuery()
		                  ->select( 'nom', 'id' )
		                  ->where( 'id', '!=', $userId )
		                  ->get();

	}

	public function getMessagesFor( int $from, int $to ): Builder {
		return $this->message->newQuery()
		                     ->whereRaw( "((from_id = $from AND to_id = $to) OR (from_id = $to AND to_id = $from))" )
		                     ->orderBy( 'created_at', 'DESC' )
		                     ->with( [
			                     'from' => function ( $query ) {
				                     return $query->select( 'nom', 'id' );
			                     }
		                     ] );
	}


	public function createMessage( string $title, string $content, int $from, int $to ) {

		return $this->message->newQuery()->create( [
			'start_date'      => $title,
			'end_data'    => $content,
			'from_id'    => $from,
			'to_id'      => $to,
		] );


	}

	/**
	 * Récupère le nombre de messages non lus pour chaque conversation
	 * @param int $userId
	 * @return Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
	 */
	public function unreadCount (int $userId) {
		return $this->message->newQuery()
		                     ->where('to_id', $userId)
		                     ->groupBy('from_id')
		                     ->selectRaw('from_id, COUNT(id) as count')
		                     ->whereRaw('read_at IS NULL')
		                     ->get()
		                     ->pluck('count', 'from_id');

	}

	/**
	 * Marque tous les   de cet utilisateur comme lu
	 * @param $id
	 */
	public function readAllFrom(int $from, int $to)
	{
		$this->message->where('from_id', $from)->where('to_id', $to)->update(['read_at' => Carbon::now()]);
	}


}