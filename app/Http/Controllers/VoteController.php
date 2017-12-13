<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Vote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VoteController extends Controller
{
    public $winner;

    public function dashboard()
    {
        $monday = $this->isMonday();
        $next_monday = $this->nextMonday();
        $this->winner = false;

        if (!$monday) {
            $this->winner = $this->getThisWeeksWinner();
            $this->updateWinner();
        }

        $restaurants = $this->getRestaurants();

        return view('vote')->with([
            'monday' => $monday,
            'next_monday' => $next_monday,
            'restaurants' => $restaurants,
            'winner' => $this->winner
        ]);
    }

    public function index()
    {
        $votes = Vote::where('date',
            Carbon::parse('next monday')->toDateString())->with('restaurant')->get()->groupBy('restaurant_id');

        foreach ($votes as $vote_group) {
            $return[$vote_group->first()->id]['name'] = $vote_group->first()->restaurant->name;
            $return[$vote_group->first()->id]['count'] = $vote_group->count();
        }

        return $this->response('success', $return);
    }

    public function show(Request $request)
    {

        $votes = Vote::where('employee_id',$request->employee_id)->with('restaurant')->get();


        return $this->response('success', $return);
    }
    
    /**
     * @return bool
     */
    private function isMonday()
    {
        if (Carbon::today()->isMonday()) {
            $monday = true;
        } else {
            $monday = false;
        }
        //2017-12-11 00:00:00
        //2017-12-04 00:00:00
        return $monday;
    }

    /**
     * @return string|static
     */
    private function nextMonday()
    {
        return Carbon::parse('next monday')->format('F d, Y');
    }

    /**
     * @return mixed
     */
    private function getThisWeeksWinner()
    {
        $votes = Vote::where('date',
            Carbon::parse('last monday')->toDateString())->with('restaurant')->get()->groupBy('restaurant_id');

        return $votes->max()->first()->restaurant;
    }

    /**
     *
     */
    private function updateWinner()
    {
        $this->winner->date_last_used = Carbon::now()->toDateString();
        $this->winner->save();
    }

    /**
     * @return mixed
     */
    public function getRestaurants()
    {
        return $restaurants = Restaurant::where('date_last_used', '!=',
            Carbon::parse('last monday')->toDateString())->get()->sortBy('date_last_used')->take(3);
    }

    public function response($status, array $data = null)
    {
        return [
            'status' => $status,
            'data' => $data,
        ];
    }

}
