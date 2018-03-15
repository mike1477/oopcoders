<?php

  namespace App\controllers;

  use App\models\User;

  use App\models\Video;
  use App\models\Category;

  class videoController extends Controller
  {

    function index($request, $response, $args){

     $video_id = $args['video_id'];
     $category_videos = Video::where('category_id', $args['category_id'])->get();
     $play_video;
     $slider_videos = [];

     for ($x = 0; $x <= count($category_videos) - 1; $x++) {
       if($category_videos[$x]->id == $video_id){
         $play_video = $category_videos[$x];
       }else{
         array_push($slider_videos, $category_videos[$x]);
       }
      }

      //Add another view to video
      $play_video->views = $play_video->views + 1;
      Video::where('id', $video_id)->update(['views' => $play_video->views]);


      $this->container->view->getEnvironment()->addGlobal('playing', $play_video);
      $this->container->view->getEnvironment()->addGlobal('slider_cat', $slider_videos);
      return $this->container->view->render($response, 'videos.twig');
    }

  }
