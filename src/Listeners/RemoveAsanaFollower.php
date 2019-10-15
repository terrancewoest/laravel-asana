<?php

namespace Christhompsontldr\LaravelAsana\Listeners;

use Christhompsontldr\LaravelAsana\Events\AsanaResponse;
use Asana;
use Illuminate\Support\Str;

/**
 * Remove the follower by default.
 *
 * All tickets are created by the Asana user that created the ASANA_TOKEN,
 * but they shouldn't be a follower of the ticket
 */
class RemoveAsanaFollower
{

	public function handle(AsanaResponse $event)
	{
        if (!Str::endsWith($event->method, 'removeFollowers')
            && !empty($event->response->data->id)
            && config('asana.remove_default_follower') !== false) {
            Asana::removeFollowersFromTask($event->response->data->id, ['me']); // accepts email, GID, or "me"
        }
	}
}
