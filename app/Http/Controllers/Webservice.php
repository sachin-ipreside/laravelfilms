<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Films;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class Webservice extends Controller
{
    public function __construct() {
        $this->films_model = new Films();
    }
    
    public function addFilms(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
            'realease_date' => 'required',
            'rating' => 'required',
            'ticket_price' => 'required',
            'country' => 'required',
            'genre' => 'required',
            'photo' => 'required',
        ]);
        
        if($validator->fails()){
            $response['code'] = 0;
            $response['status'] = 'failed';
            $response['message'] = 'required parameter';
        }else{
            $data['name'] = $request->input('name');
            $data['slug'] = strtolower(str_replace(' ','-',$request->input('name')));
            $data['description'] = $request->input('description');
            $data['realease_date'] = $request->input('realease_date');
            $data['rating'] = $request->input('rating');
            $data['ticket_price'] = $request->input('ticket_price');
            $data['country'] = $request->input('country');
            $data['genre'] = $request->input('genre');
            $data['photo'] = '/storage/app/' . Storage::putFile('films', $request->file('photo'));
            
            $films_id = $this->films_model->add_films($data);
            if($films_id){
                $response['code'] = 1;
                $response['status'] = 'success';
                $response['message'] = 'films added successfull!'; 
            }else{
                $response['code'] = 0;
                $response['status'] = 'failed';
                $response['message'] = 'please try agian';
            }
        }
        echo json_encode($response);
    }
    
    public function filmsList() {
        $list = $this->films_model->films_list();
        if(count($list) > 0){
            $response['code'] = 1;
            $response['status'] = 'success';
            $response['message'] = 'films list';  
            $response['data'] = $list;  
        }else{
            $response['code'] = 0;
            $response['status'] = 'failed';
            $response['message'] = 'no films found';
        }
        echo json_encode($response);
    }
    
    public function filmsDetail($slug) {
        $films = $this->films_model->filmsdetail($slug);
        if(count($films) > 0){
            $response['code'] = 1;
            $response['status'] = 'success';
            $response['message'] = 'films list';  
            $response['data'] = $films;  
        }else{
            $response['code'] = 0;
            $response['status'] = 'failed';
            $response['message'] = 'no films found';
        }
        echo json_encode($response);
    }
    
    public function addfilmsComment(Request $request) {
        $validator = Validator::make($request->all(),[
            'films_id' => 'required',
            'name' => 'required',
            'comment' => 'required',
        ]);
        
        if($validator->fails()){
            $response['code'] = 0;
            $response['status'] = 'failed';
            $response['message'] = 'required parameter';
        }else{
            $data['films_id'] = $request->input('films_id');
            $data['name'] = $request->input('name');
            $data['comment'] = $request->input('comment');
            
            $comment_id = $this->films_model->add_comment($data);
            if($comment_id){
                $response['code'] = 1;
                $response['status'] = 'success';
                $response['message'] = 'comment added successfull!'; 
            }else{
                $response['code'] = 0;
                $response['status'] = 'failed';
                $response['message'] = 'please try agian';
            }
        }
        echo json_encode($response);
    }
    
    public function filmsComment($films_id) {
        $comment = $this->films_model->getFilmsComment($films_id);
        if(count($comment) > 0){
            $response['code'] = 1;
            $response['status'] = 'success';
            $response['message'] = 'Comment list';  
            $response['data'] = $comment;  
        }else{
            $response['code'] = 0;
            $response['status'] = 'failed';
            $response['message'] = 'Not Comment Yet!';
        }
        echo json_encode($response);
    }
}
