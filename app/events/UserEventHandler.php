<?php
class UserEventHandler {

    /**
     * Handle user login events.
     */
    public function onUserLogin($event)
    {
        Session::set('user', Auth::user());
        Log::info(['logueado con subscribers']);
    }

    /**
     * Handle user logout events.
     */
    public function onUserLogout($event)
    {
        Session::flush();
        Log::info(['exit con subscribers']);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen('auth.login', 'UserEventHandler@onUserLogin');

        $events->listen('auth.logout', 'UserEventHandler@onUserLogout');
    }

}