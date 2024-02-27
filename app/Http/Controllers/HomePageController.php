<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{

    /**
     * Show the home page
     */
    public function index(){
        $services = Service::latest()->limit(6)->get();
        $projects = Project::latest()->limit(6)->get();
        $teamMembers = TeamMember::latest()->limit(4)->get();
        $posts = Post::latest()->limit(3)->get();

        return view('frontend.home', [
            'services' => $services,
            'projects' => $projects,
            'members' => $teamMembers,
            'posts' => $posts
        ]);
    }

    /**
     * Show the about page
     */
    public function about(){
        $teamMembers = TeamMember::latest()->get();

        return view('frontend.about', ['members' => $teamMembers]);
    }

    /**
     * Show all the projects
     */
    public function project(){
        $projects = Project::latest()->get();
        
        
        return view('frontend.projects', ['projects' => $projects]);
    }

    /**
     * Show all the services
     */
    public function service(){
        $services = Service::latest()->get();
        $projects = Project::latest()->get();

        return view('frontend.services', ['services' => $services, 'projects' => $projects]);
    }

    /**
     * Show the contact page
     */
    public function contact(){
        return view('frontend.contact');
    }

    /**
     * Show all the posts
     */
    public function blog(){
        $posts = Post::latest()->paginate(9);

        return view('frontend.blog', ['posts' => $posts]);
    }

    /**
     * Show the different posts PER category
     */
    public function showPerCategory($category_id){
        $posts = Post::where('category_id', $category_id)->get();

        return view('frontend.perCategory', ['posts' => $posts]);
    }

     /**
     * Show the different project PER status (en cours, en etudes, realiser)
     */
    public function showPerStatus($status){
        $projects = Project::where('status', $status)->get();

        return view('frontend.statusProject', ['projects' => $projects]);
    }

    /**
     * Show a single project
     */
    public function showProject($id){
        $project = Project::findOrFail($id);
        $status = Project::select('status', DB::raw('count(*) as numberCount'))->groupBy('status')->get();
        $projects = Project::latest()->where('id', '<>', $id)->limit(6)->get();
        $posts = Post::latest()->limit(9)->get();

        return view('frontend.showProject', [
            'project' => $project,
            'status' => $status,
            'projects' => $projects,
            'posts' => $posts
        ]);
    }

    /**
     * Show a single service
     */
    public function showService($id){
        $service = Service::findOrFail($id);
        $services = Service::latest()->where('id', '<>', $id)->limit(6)->get();
        $posts = Post::latest()->limit(9)->get();
        $status = Project::select('status', DB::raw('count(*) as numberCount'))->groupBy('status')->get();

        return view('frontend.showService', [
            'service' => $service,
            'services' => $services,
            'posts' => $posts,
            'status' => $status
        ]);
    }

    /**
     * Show a single post
     */
    public function details($id){
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $posts = Post::latest()->where('id', '<>', $id)->limit(9)->get();
        $status = Project::select('status')->groupBy('status')->get();

        return view('frontend.details', ['post' => $post, 'posts' => $posts, 'categories' => $categories, 'status' => $status]);
    }

    /**
     * Show all the team members
     */
    public function team(){
        $teamMembers = TeamMember::latest()->get();

        return view('frontend.team', ['members' => $teamMembers]);
    }

    /**
     * Show a single team member
     */
    public function showMember($id){
        $member = TeamMember::findOrFail($id);
        // if(!$member){
        //     return view('frontend.errors');
        // }

        $members = TeamMember::all()->where('id', '<>', $id);
        $posts = Post::latest()->limit(9)->get();
        $status = Project::select('status', DB::raw('count(*) as numberCount'))->groupBy('status')->get();

        return view('frontend.showMember', [
            'member' => $member,
            'members' => $members,
            'posts' => $posts,
            'status' => $status
        ]);
    }

    /**
     * Show all the testimonial of the clients
     */
    public function testimonial(){
        $projects = Project::latest()->get();

        return view('frontend.testimonials', ['projects' => $projects]);
    }

}
