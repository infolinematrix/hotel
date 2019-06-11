<?php


namespace ReactorCMS\Http\Controllers;


use Illuminate\Http\Request;
use ReactorCMS\Http\Controllers\Traits\BasicResource;
use ReactorCMS\Http\Controllers\Traits\ModifiesMailingLists;
use ReactorCMS\Http\Controllers\Traits\UsesSubscriberForms;
use Reactor\Hierarchy\Mailings\Subscriber;

class SubscribersController extends ReactorController
{

    use BasicResource, UsesSubscriberForms, ModifiesMailingLists;

    /**
     * Names for the BasicResource trait
     *
     * @var string
     */
    protected $modelPath = Subscriber::class;
    protected $resourceMultiple = 'subscribers';
    protected $resourceSingular = 'subscriber';
    protected $permissionKey = 'SUBSCRIBERS';

    /**
     * Remove an list from the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function dissociateList(Request $request, $id)
    {
        $this->authorize('EDIT_MAILINGLISTS');

        $subscriber = Subscriber::findOrFail($id);

        $subscriber->dissociateList($request->input('list'));

        $this->notify('mailing_lists.dissociated', 'dissociated_list_from_subscriber', $subscriber);

        return redirect()->route('reactor.subscribers.lists', $id);
    }

}