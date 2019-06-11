<?php


namespace ReactorCMS\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Reactor\Documents\Media\Media;
use Reactor\Hierarchy\Node;
use Reactor\Users\User;
use ReactorCMS\Statistics\DashboardStatisticsCompiler;

class DashboardController extends ReactorController
{

    
    /**
     * Shows the dashboard
     * @param DashboardStatisticsCompiler $compiler
     * @return view
     */
    public function index(DashboardStatisticsCompiler $compiler)
    {

        $params = [
            'recentlyCreated' => Node::recentlyCreated(10)->get(),
            'recentlyEdited' => Node::recentlyEdited(10)->get()
        ];

        if (tracker()->saveEnabled()) {
            $params['statistics'] = $compiler->compileStatistics();
            $params['mostVisited'] = Node::mostVisited(10)->get();
            $params['recentlyVisited'] = Node::recentlyVisited(10)->get();
        }

        $params['nodes'] = Node::count();
        $params['media'] = Media::count();
        $params['users'] = User::count();

        /* Database Size*/
        $sql = "SELECT  sum(round(((data_length + index_length) / 1024 / 1024), 2))  as 'db_size'
                FROM information_schema.TABLES
                WHERE table_schema ='" . env('DB_DATABASE') . "'";

        $db = \DB::select($sql);
        $params['db_size'] = $db[0]->db_size;
        
        /*$nodes = User::count();
        dd($nodes);*/

        return $this->compileView('dashboard.index', $params, trans('general.dashboard'));
    }

    /**
     * Shows the activity for the user
     *
     * @return Response
     */
    public function activity()
    {
        $activities = chronicle()->getRecords(30);

        return $this->compileView('dashboard.activity', compact('activities'), trans('general.recent_activity'));
    }

}