<?php

namespace Extension\Site\Http;

use App\Entities\Testimonial;
use Illuminate\Http\Request;
use ReactorCMS\Http\Controllers\Traits\UsesNodeForms;
use ReactorCMS\Http\Controllers\Traits\UsesNodeHelpers;
use ReactorCMS\Http\Controllers\Traits\UsesTranslations;
use ReactorCMS\Http\Controllers\Controller;
use Reactor\Hierarchy\Reviewable\HasReviews;
use Prophecy\Exception\Prediction\NoCallsException;
use Reactor\Hierarchy\Node;

class ReviewController extends Controller
{

    use UsesTranslations, UsesNodeHelpers, UsesNodeForms;
    use HasReviews;


    public function reviews($node_id){

        $node = Node::find($node_id);
        $reviews = $node->getReviews()->take(25)->get();
        
        $data=[];

        foreach($reviews as $review){
            $data[] = [
                'title' => $review->title,
                'description' => $review->body,
                'rating'=> $review->rating,
                'posted_by'=> $review->first_name,
                'posted_on'=> time_elapsed_string($review->created_at),
            ];
        }
        

        return $data;
    }

    public function store(Request $request){

       
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'title' => $request->title,
            'body' => $request->description,
            'rating' => $request->rating,
        ];
        
        $node = Node::find($request->node);
        $node->createReview($data, $node);

        $data['message'] = 'Successfully submited, waiting for modaration';
        
        return $data;
        
    }

}
